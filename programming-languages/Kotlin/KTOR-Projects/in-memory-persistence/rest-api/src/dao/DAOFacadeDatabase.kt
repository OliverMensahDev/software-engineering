package com.olims.dao


import org.jetbrains.exposed.sql.*
import org.jetbrains.exposed.sql.transactions.transaction
import java.io.Closeable
import com.olims.models.Employee

interface DAOFacade: Closeable{
    fun init()
    fun createEmployee(name:String, email:String, city:String)
    fun updateEmployee(id:Int, name:String, email:String, city:String)
    fun deleteEmployee(id:Int)
    fun getEmployee(id:Int): Employee?
    fun getAllEmployees(): List<Employee>
}

class DAOFacadeDatabase(val db: Database): DAOFacade{

    override fun init() = transaction(db) {
        SchemaUtils.create(Employees)
    }
    override fun createEmployee(name: String, email: String, city: String): Unit = transaction(db) {
        Employees.insert {it[Employees.name] = name;
            it[Employees.email] = email; it[Employees.city] = city;
        }
    }
    override fun updateEmployee(id: Int, name: String, email: String, city: String): Unit = transaction(db) {
        Employees.update({Employees.id eq id}){
            it[Employees.name] = name
            it[Employees.email] = email
            it[Employees.city] = city
        }
    }
    override fun deleteEmployee(id: Int): Unit = transaction(db) {
        Employees.deleteWhere { Employees.id eq id }
    }
    override fun getEmployee(id: Int) = transaction(db) {
        Employees.select { Employees.id eq id }.map {
            Employee(it[Employees.id], it[Employees.name], it[Employees.email], it[Employees.city]
            )
        }.singleOrNull()
    }
    override fun getAllEmployees() = transaction(db) {
        Employees.selectAll().map {
            Employee(it[Employees.id], it[Employees.name], it[Employees.email], it[Employees.city]
            )
        }
    }
    override fun close() { }
}