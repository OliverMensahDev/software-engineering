package com.oliver


import com.fasterxml.jackson.module.kotlin.jacksonObjectMapper
import io.ktor.config.MapApplicationConfig
import io.ktor.http.*
import io.ktor.server.testing.*
import org.amshove.kluent.`should be`
import org.amshove.kluent.shouldEqual
import org.amshove.kluent.shouldNotBe
import org.eclipse.jetty.http.HttpStatus
import org.spekframework.spek2.Spek
import org.spekframework.spek2.style.specification.describe

object GetTodosSpec : Spek({

    describe("Get the Todos"){
        val engine = TestApplicationEngine(createTestEnvironment())
        engine.start(wait = false)
        with(engine){
            (environment.config as MapApplicationConfig).apply {
                put("ktor.environment", "test")
            }
        }
        engine.application.module(true)


        with(engine){
            it("should be ok to ge the list of todos"){
                handleRequest(HttpMethod.Get, "/api/todos").apply {
                    response.status()!!.`should be`(HttpStatusCode.OK)
                }
            }

            it("should get a todo"){
                with(handleRequest(HttpMethod.Get, "/api/todos")) {
                    response.content!!
//                        .shouldNotBe()
//                        .shouldContain
                }
            }
            it("should create a todo"){
                with(handleRequest (HttpMethod.Post , "/api/todos"){
                    addHeader(HttpHeaders.ContentType, ContentType.Application.Json.toString())
                    setBody(jacksonObjectMapper().writeValueAsString(todoItem1))
                }){
                    response.status()!!.`should be`(HttpStatusCode.Created)
                }
            }

            it("should update a todo"){
                with(handleRequest (HttpMethod.Put , "/api/todos/1"){
                    addHeader(HttpHeaders.ContentType, ContentType.Application.Json.toString())
                    setBody(jacksonObjectMapper().writeValueAsString(todoItem1))
                }){
                    response.status()!!.`should be`(HttpStatusCode.NoContent)
                }
            }

            it("should delete a todo"){
                with(handleRequest (HttpMethod.Delete , "/api/todos/1"){
                    addHeader(HttpHeaders.ContentType, ContentType.Application.Json.toString())
                    setBody(jacksonObjectMapper().writeValueAsString(todoItem1))
                }){
                    response.status()!!.`should be`(HttpStatusCode.NoContent)
                }
            }

            it("should get a todo"){
                with(handleRequest (HttpMethod.Get , "/api/todos/1")){
                    response.content!!
//                        .shouldNotBe()
//                        .shouldContain
                }
            }

            it("should return an error if id is invalid"){
                with(handleRequest (HttpMethod.Get , "/api/todos/23")){
                    response.status()!!.shouldEqual(HttpStatusCode.NotFound)
                }
            }
        }

    }
})

