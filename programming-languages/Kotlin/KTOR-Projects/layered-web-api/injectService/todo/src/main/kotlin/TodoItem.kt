package com.oliver

import com.fasterxml.jackson.databind.annotation.JsonDeserialize
import com.fasterxml.jackson.databind.annotation.JsonSerialize
import com.fasterxml.jackson.databind.ser.std.ToStringSerializer
import java.time.LocalDate
import com.fasterxml.jackson.datatype.jsr310.deser.LocalDateDeserializer


enum class  Importance {
    LOW,MEDIUM, HIGH
}

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
