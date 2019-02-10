let people = [
    {
        name: "Oliver Mensah",
        age: 23
    },
     {
        name: "Oliver Mensah",
        age: 23
    },
     {
        name: "Olive Mensah",
        age: 23
    },
     {
        name: "Oliva Mensah",
        age: 23
    },
     {
        name: "Oliv Mensah",
        age: 23
    },
]

function findPersonByName(name){
    return people.find(function(item){
        return item.name===name;
    })
}
console.log(findPersonByName("Oliver Mensah"))