
let s_name = Symbol();

export class Employee {
	constructor(name) {
		this[s_name] = name;
	}
	
	get name() {
		return this[s_name];
	}

	doWork() {
		return `${this.name} is working`;
	}
}



export let log = function(employee) {
	console.log(employee.name);
}

export let defaultRaise = 0.03;

export let modelEmployee = new Employee("Allen");