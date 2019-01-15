const Laptop = {
    make: "microsft",
    name: "Surface Pro 2",
    configurations: [
        {memory: 16, storage: 2},
        {memory: 16, storage: 1},
        {memory: 32, storage: 1}
    ],
    availability: {
        usa : {available: true},
        uk: {available: false},
        india: {available: true}
    }
}


const {
    make,
    availability,
    availability: {
        usa
    },
    availability: {
        usa: {
            available
        }
    },
    configurations,
    configurations:[conf1, conf2, conf3],
    configurations:[c1, , c3],

}  = Laptop


console.log(conf1);



