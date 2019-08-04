package com.oliver

import com.github.mustachejava.DefaultMustacheFactory
import io.ktor.application.*
import io.ktor.features.StatusPages
import io.ktor.http.ContentType
import io.ktor.http.HttpStatusCode
import io.ktor.mustache.Mustache
import io.ktor.response.respondText
import io.ktor.routing.Routing
import io.ktor.server.engine.commandLineEnvironment
import io.ktor.server.engine.embeddedServer
import io.ktor.server.netty.Netty

fun main(args: Array<String>){
    embeddedServer(Netty, commandLineEnvironment(args)).start()
}

@Suppress("unused") // Referenced in application.conf
fun Application.module() {
    install(StatusPages) {
        when {
            isDev -> {
                this.exception<Throwable>{ e->
                    call.respondText(e.localizedMessage, ContentType.Text.Plain, HttpStatusCode.InternalServerError)
                    throw e
                }
            }

            isTest -> {
                this.exception<Throwable>{ e->
                    call.response.status(HttpStatusCode.InternalServerError)
                    throw e
                }
            }
            isProd -> {
                this.exception<Throwable>{ e->
                    call.respondText(e.localizedMessage, ContentType.Text.Plain, HttpStatusCode.InternalServerError)
                    throw e
                }
            }
        }
    }

    install(Routing){
        if(isDev) trace{
            application.log.trace(it.buildText())
        }

        todos()
        staticResource()

    }

    install(Mustache){
        mustacheFactory = DefaultMustacheFactory("templates")
    }
}

val Application.envkind get() =  environment.config.property("ktor.environment").getString()
val Application.isDev get() =  envkind == "dev"
val Application.isTest get() = envkind == "test"
val Application.isProd get() = envkind  !="dev" && envkind != "test"