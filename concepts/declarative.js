function filter(items, func){
    let result = []
   for(item of items){
        if(func(item)){
            result.push(item)
        }
    }
    return result
}

function map(items, func){
    let result = []
    for(item of items){
        result.push(func(item))
    }
    return result
}
   

function each(items, func){
    for(item of items){
        return func(item)
    }
}

function reject(items, func){
    return filter(items, function (item){
        return ! func(item);
    })
}


function reduce(items, callback, initial){
    let accumulator = initial;
    for(item of items){
        accumulator = callback(accumulator, item);
    }
    return accumulator;
}


let users = [
    {name: "Oliver Mensah", age: 26, email: "olivermensah96@gmail.com"},
    {name: "Nana Adu", age: 26},
    {name: "Priscila Buer", age: 23, email: "priscilabuer@gmail.com"}
]

let resUser = reje(users, (user) => user.email)
let resUserEmail = map(resUser, (user) => user.email)
console.log(resUserEmail);

