package com.oliver.viewmodels

import com.oliver.TodoItem

data class  TodoVM (private  val todos: List<TodoItem>){
    val todoItems  = todos
    val userName = "Oliver Mensah"
}