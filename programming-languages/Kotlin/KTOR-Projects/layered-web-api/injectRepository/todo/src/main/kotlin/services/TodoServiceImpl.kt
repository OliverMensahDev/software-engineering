package com.oliver.services

import com.oliver.Importance
import com.oliver.TodoItem
import com.oliver.repositories.TodoListRepository
import io.ktor.application.call
import io.ktor.http.HttpStatusCode
import io.ktor.request.receive
import io.ktor.response.respond
import java.time.LocalDate


val todoItem1 = TodoItem(
    1,
    "Add REST API Data Access",
    "Add Data Support",
    "Me",
    LocalDate.of(2018 , 12, 18),
    Importance.HIGH
)

val todoItem2 = TodoItem(
    2,
    "Add REST API Service",
    "Add Data Support",
    "Me",
    LocalDate.of(2018 , 12, 18),
    Importance.LOW
)
val todoItem3 = TodoItem(
    3,
    "Add REST API Repository",
    "Add Data Support",
    "Me",
    LocalDate.of(2018 , 12, 18),
    Importance.MEDIUM
)
var todos = listOf(todoItem1, todoItem2, todoItem3)


class TodoServiceImpl: TodoService{
    override fun getAll(): List<TodoItem> {
        return todos
    }

    override fun getTodo(id: Int): TodoItem {
        return todos[id]
    }

    override fun delete(id: Int): Boolean {
        if(id == null){
            return false
        }
        todos.getOrNull(id) ?: return false
        todos = todos.filter { it.id  != id }
        return true
    }

    override fun create(todo: TodoItem): Boolean {
        val newTodo = TodoItem(
            todos.size+ 1,
            todo.title,
            todo.details,
            todo.assignedTo,
            todo.dueDate,
            todo.importance
        )
        todos = todos + newTodo
        return true
    }

    override fun update(id: Int, todo: TodoItem): Boolean {
        if(id == null){
            return false
        }
        todos.getOrNull(id) ?: return false
        todos = todos.filter { it.id  != todo.id }
        todos = todos + todo
        return true
    }

}