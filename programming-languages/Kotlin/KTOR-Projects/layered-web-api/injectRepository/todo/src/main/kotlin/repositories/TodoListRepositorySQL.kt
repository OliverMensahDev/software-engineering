package com.oliver.repositories

import com.oliver.TodoItem
import com.oliver.services.TodoServiceImpl

class TodoListRepositorySQL(private val todoServiceImpl: TodoServiceImpl) : TodoListRepository{
    override fun getAll(): List<TodoItem> {
        return todoServiceImpl.getAll()
    }

    override fun getTodo(id: Int): TodoItem {
        return todoServiceImpl.getTodo(id)
    }

    override fun delete(id: Int): Boolean {
        return todoServiceImpl.delete(id)
    }

    override fun create(todo: TodoItem): Boolean {
        return todoServiceImpl.create(todo);
    }

    override fun update(id: Int, todo: TodoItem): Boolean {
        return todoServiceImpl.update(id, todo)
    }

}