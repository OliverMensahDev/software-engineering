class Company{
    constructor(){
        this.employees = [];
    }
    addEmployees(...names){
        this.employees = this.employees.concat(names);
    }
    //build iterable collection
    *[Symbol.iterator](){
        for( let employee of this.employees){
            //console.log(employee);
            yield employee;
        }
    }
}

let filter = function*(items, predicate) {
    for(let item of items){
        //console.log("filter", item);
        if(predicate(item)){
            yield item;
        }
    }
}
let take = function*(items, number){
    let count = 0;
    if(number < 1)  return;
    for (item of items) {
        yield item;
        count++;
        if( count >= number ) return;
    }
}
let count =  0;
let company = new Company();
company.addEmployees("Tim", "Sue", "Joy");
for( let employee of filter( company, e => e[0] =='T' )){
     console.log(employee);
}
for( let employee of take( company, 1)){
     console.log(employee);
}
