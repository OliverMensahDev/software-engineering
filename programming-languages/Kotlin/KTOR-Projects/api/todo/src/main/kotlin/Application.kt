package com.oliver

import com.fasterxml.jackson.databind.SerializationFeature
import io.ktor.application.*
import io.ktor.features.ContentNegotiation
import io.ktor.response.*
import io.ktor.routing.*
import io.ktor.http.*
import io.ktor.features.StatusPages
import io.ktor.jackson.jackson

fun main(args: Array<String>): Unit = io.ktor.server.cio.EngineMain.main(args)


@Suppress("unused") // Referenced in application.conf
@kotlin.jvm.JvmOverloads
fun Application.module(testing: Boolean = false) {

    // For Api Routing
    install(Routing){
        if(!testing) trace { application.log.trace(it.buildText()) }
        todoAPi()
    }

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




    //Can't do this when you have the routing
//    routing {
//        get("/") {
//            call.respondText("HELLO WORLD! OLIVER", contentType = ContentType.Text.Plain)
//        }


//        // Static feature. Try to access `/static/ktor_logo.svg` NOT NEEDED FOR REST API
//        static("/static") {
//            resources("static")
//        }
//    }
}

