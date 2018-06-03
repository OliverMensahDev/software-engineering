for (let index = 1; index < 101; index++) {
    if (index % 5 == 0 && index % 3 == 0) {
        console.log("FizzBuss")
    }
    else if (index % 5 == 0) {
        console.log("Fizz")
    }
    else if (index % 3 == 0) {
        console.log("Buzz")
    }
    else {
        console.log(index)
    }
}

for (let index = 1; index < 101; index++) {
    const isFizz = index % 5 == 0;
    const isBuzz = index % 3 == 0
    let result =
        isFizz && isBuzz ? "FizzBuss" : isFizz
            ? "Fizz" : isBuzz
                ? "Buzz" : index
    console.log(result)
}