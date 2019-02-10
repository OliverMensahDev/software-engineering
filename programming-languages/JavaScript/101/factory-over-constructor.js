// preventing newing up obect with factory
const playerFactory = ({name = 'Default name', health = 100}) => ({
    name, health,
    reportStatus() {
        return console.log(`${this.name} is at ${this.health}%.`);
    }
})

const playerTwo = playerFactory({name: 'Mike Tyson'});

console.log(playerTwo.reportStatus())

/** 
class Player {
    constructor({name = 'Default name', health = 100}) {
        this.name = name;
        this.health = health;
    }
    reportStatus() {
        return console.log(`${this.name} is at ${this.health}%.`)
    }
}

const playerOne = new Player({name: 'John smith'});

console.log(playerOne.reportStatus());
*/