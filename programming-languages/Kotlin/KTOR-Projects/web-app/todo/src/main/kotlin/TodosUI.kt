package com.oliver

import com.oliver.viewmodels.TodoVM
import io.ktor.application.call
import io.ktor.mustache.MustacheContent
import io.ktor.response.respond
import io.ktor.routing.Routing
import io.ktor.routing.get



fun Routing.todos() {
    get ("/todos"){
        val vm = TodoVM(todos)
        call.respond(
            MustacheContent("todos.hbs", mapOf("todos" to vm))
        )
    }
}