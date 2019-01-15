class Driver{
    constructor(sleepy){
        this.sleepy =sleepy
    }
    drive(){
        console.log("sleep")
    }
    park(){
        console.log("Park")
    }
}



let driver = new Driver(true);

// if (driver.sleepy) {
//     driver.park()
//   } else {
//     driver.drive()
//   }

driver[driver.sleepy ? 'park' : 'drive']()
