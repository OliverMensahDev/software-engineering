package com.olims

import com.fasterxml.jackson.databind.SerializationFeature
import com.olims.dao.DAOFacadeDatabase
import com.olims.models.Employee
import io.ktor.application.*
import io.ktor.features.ContentNegotiation
import io.ktor.features.StatusPages
import io.ktor.response.*
import io.ktor.request.*
import io.ktor.routing.*
import io.ktor.http.*
import org.jetbrains.exposed.sql.Database
import io.ktor.jackson.jackson


fun main(args: Array<String>): Unit = io.ktor.server.netty.EngineMain.main(args)

val dao = DAOFacadeDatabase(Database.connect("jdbc:h2:mem:test;DB_CLOSE_DELAY=-1", driver = "org.h2.Driver"))


@Suppress("unused") // Referenced in application.conf
@kotlin.jvm.JvmOverloads
fun Application.module(testing: Boolean = false) {
    dao.init()
    // content Negotiation
    install(ContentNegotiation) {
        jackson {
            enable(SerializationFeature.INDENT_OUTPUT)
        }
    }

    // handling Error

    install(StatusPages) {
        this.exception<Throwable> {  e ->
            call.respondText(e.localizedMessage, ContentType.Text.Plain)
            throw e
        }
    }
    routing {
        route("/employees"){
            get {
                call.respond(dao.getAllEmployees())
            }
            post {
                val emp = call.receive<Employee>()
                dao.createEmployee(emp.name, emp.email, emp.city)
            }
            put {
                val emp = call.receive<Employee>()
                dao.updateEmployee(emp.id, emp.name, emp.email, emp.city)
            }
            delete("/{id}") {
                val id = call.parameters["id"]
                if(id != null)
                    dao.deleteEmployee(id.toInt())
            }
        }
    }
}

