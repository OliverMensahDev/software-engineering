package com.oliver

import com.oliver.services.TodoService
import io.ktor.application.call
import io.ktor.http.HttpStatusCode
import io.ktor.request.receive
import io.ktor.response.respond
import io.ktor.routing.*
import java.lang.IllegalArgumentException

fun Routing.todoAPi(todoService: TodoService) {
    route("/api") {
        get("/todos"){
            val todos = todoService.getAll()
            call.respond(todos)
        }
        get("/todos/{id}"){
            val id = call.parameters["id"]!!
            try{
                val todo = todoService.getTodo(id.toInt())
                call.respond(todo)
            }catch (e: Throwable){
                call.respond(HttpStatusCode.NotFound)
            }
        }
        post("/todos"){
            val todo = call.receive<TodoItem>()
            todoService.create(todo)
            call.respond(HttpStatusCode.Created, todo)
        }
        put("/todos/{id}"){
            val id = call.parameters["id"] ?: throw IllegalArgumentException("Missing id")
            val todo = call.receive<TodoItem>()
            todoService.update(id.toInt(), todo)
            call.respond(HttpStatusCode.NoContent)
        }
        delete("/todos/{id}"){
            val id = call.parameters["id"] ?: throw IllegalArgumentException("Missing id")
            todoService.delete(id.toInt())
            call.respond(HttpStatusCode.NoContent)
        }
    }
}