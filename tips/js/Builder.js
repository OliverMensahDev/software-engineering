class User{
    constructor(builder){
        this.firstName = builder.firstName
        this.lastName = builder.lastName
    }
}


class UserBuilder{
    firstName(firstName){
        this.firstName = firstName
        return this
    }

    lastName(lastName){
        this.lastName = lastName
        return this;
    }

    build(){
        return new User(this)
    }
}


let user = new UserBuilder().firstName("Olvier").lastName("Mensah").build()
console.log(user);
