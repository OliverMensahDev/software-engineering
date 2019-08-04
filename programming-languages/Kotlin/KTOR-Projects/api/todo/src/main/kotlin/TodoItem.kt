package com.oliver

import com.fasterxml.jackson.databind.annotation.JsonDeserialize
import com.fasterxml.jackson.databind.annotation.JsonSerialize
import com.fasterxml.jackson.databind.ser.std.ToStringSerializer
import java.time.LocalDate
import com.fasterxml.jackson.datatype.jsr310.deser.LocalDateDeserializer

data class TodoItem(
    val id: Int,
    val title: String,
    val details: String,
    val assignedTo: String,
    @JsonSerialize(using = ToStringSerializer::class)
    @JsonDeserialize(using = LocalDateDeserializer::class)
    val dueDate : LocalDate,
    val importance: Importance
)

// Service should have returned this data
enum class  Importance {
    LOW,MEDIUM, HIGH
}

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


