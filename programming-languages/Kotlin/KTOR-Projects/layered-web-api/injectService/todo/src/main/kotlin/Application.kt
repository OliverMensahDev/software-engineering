package com.oliver

import com.fasterxml.jackson.databind.SerializationFeature
import com.oliver.repositories.TodoListRepository
import com.oliver.repositories.TodoListRepositorySQL
import com.oliver.services.TodoService
import com.oliver.services.TodoServiceImpl
import io.ktor.application.*
import io.ktor.features.ContentNegotiation
import io.ktor.response.*
import io.ktor.routing.*
import io.ktor.http.*
import io.ktor.features.StatusPages
import io.ktor.jackson.jackson

fun main(args: Array<String>): Unit = io.ktor.server.netty.EngineMain.main(args)


@Suppress("unused") // Referenced in application.conf
@kotlin.jvm.JvmOverloads
fun Application.module(testing: Boolean = false) {
    val todoService = TodoServiceImpl(TodoListRepositorySQL())
    moduleWithDependencies(todoService)

}

fun Application.moduleWithDependencies(todoService: TodoService){
    install(Routing){
        todoAPi(todoService)
    }

    install(ContentNegotiation) {
        jackson {
            enable(SerializationFeature.INDENT_OUTPUT)
        }
    }


    install(StatusPages) {
        this.exception<Throwable> {  e ->
            call.respondText(e.localizedMessage, ContentType.Text.Plain)
            throw e
        }
    }
}
