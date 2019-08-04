package com.oliver

import com.oliver.repositories.TodoListRepository
import io.ktor.application.call
import io.ktor.http.HttpStatusCode
import io.ktor.request.receive
import io.ktor.response.respond
import io.ktor.routing.*
import java.lang.IllegalArgumentException

fun Routing.todoAPi(repository: TodoListRepository) {
    route("/api") {
        get("/todos"){
            val todos = repository.getAll()
            call.respond(todos)
        }
        get("/todos/{id}"){
            val id = call.parameters["id"]!!
            try{
                val todo = repository.getTodo(id.toInt())
                call.respond(todo)
            }catch (e: Throwable){
                call.respond(HttpStatusCode.NotFound)
            }
        }
        post("/todos"){
            val todo = call.receive<TodoItem>()
            repository.create(todo)
            call.respond(HttpStatusCode.Created, todo)
        }
        put("/todos/{id}"){
            val id = call.parameters["id"] ?: throw IllegalArgumentException("Missing id")
            val todo = call.receive<TodoItem>()
            repository.update(id.toInt(), todo)
            call.respond(HttpStatusCode.NoContent)
        }
        delete("/todos/{id}"){
            val id = call.parameters["id"] ?: throw IllegalArgumentException("Missing id")
            repository.delete(id.toInt())
            call.respond(HttpStatusCode.NoContent)
        }
    }
}