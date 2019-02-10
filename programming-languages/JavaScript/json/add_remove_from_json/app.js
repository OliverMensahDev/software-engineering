var data ={
    "name": "Oliver Mensah",
    "age": 32
}
data.sex ="male";
console.log(`${data.name}  ${data.age}  ${data.sex}`);

var dataArray = [
    {
        "name": "Oliver Mensah"
    }
]
let addNew = {
    "name":"Seyram Gold"
}
dataArray[dataArray.length] = addNew;

let addNew1 = {
    "name": "Seyram Gold 4"
}

dataArray.forEach(item=>{
    if( item.name != addNew1.name){
        dataArray[dataArray.length] = addNew1;
    }
})

delete dataArray[dataArray.length].name
console.log(dataArray);
