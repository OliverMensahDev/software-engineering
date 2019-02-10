const invoice = "USE-ME-CODE"; 
const [product, course, coupon] = invoice.split("-");
console.log( product, course, coupon);

const {name, age}  = {name:"Oliver", age:32}
const [students, grades ] = [["Oliver Mensah", "Nana Addo"], [45,6]]
console.log(name, age, students, grades)

function colorsAndAge(){
    return [
        ["Red", "Yellow", "Gree"],
        [34,5,6,6]
    ]
}
const [colors, ages] = colorsAndAge();
console.log(colors, ages);