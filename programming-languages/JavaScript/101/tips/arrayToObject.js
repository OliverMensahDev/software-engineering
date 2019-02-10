const employee = [
    {
        name: "Oliver Mensah",
        email: "olivermensah96@gmail.com"
    },
    {
       name: "Issay",
       email: "as#=@gnail.com"
    }
]
 
const obje = employee.reduce((objectTable, emp) => {
  objectTable[emp.email] = emp.name
  return objectTable;
}, {})
console.log(obje)