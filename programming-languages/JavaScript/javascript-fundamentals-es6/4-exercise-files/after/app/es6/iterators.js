describe("iterables", function(){

	it("can work with iterators at a low level", function(){

		let sum = 0;
		let numbers = [1,2,3,4];

		// for loop
		sum = 0;
		for(let i =0; i < numbers.length; i++){
			sum += numbers[i];
		}
		expect(sum).toBe(10);

		// for in
		sum = 0;
		for(let i in numbers) {
			sum += numbers[i];
		}
		expect(sum).toBe(10);

		// iterator
		sum = 0;

		let iterator = numbers[Symbol.iterator]();
		let next = iterator.next();
		while(!next.done){
			sum += next.value;
			next = iterator.next();
		}
		expect(sum).toBe(10);
	});

});

describe("for of", function() {

	it("can work with iteratables at a high level", function(){

		let sum = 0;
		let numbers = [1,2,3,4];

		for(let n of numbers){
			sum += n;
		}
				
		expect(sum).toBe(10);			
	});

});

describe("iterable", function(){

	it("can be built by implementing Symbol.iterator", function(){

		class Company {	
			constructor() {
				this.employees = [];
			}
			
			addEmployees(...names) {
				this.employees = this.employees.concat(names);
			}	
			[Symbol.iterator]() {
				return new ArrayIterator(this.employees);
			}
		}

		class ArrayIterator {
			constructor(array) {
				this.array = array;
				this.index = 0;
			}
			next() {
				var result = { value: undefined, done: true };
				if(this.index < this.array.length) {
					result.value = this.array[this.index];
					result.done = false;
					this.index += 1;	
				}
				return result;
				
			}
		}

		let count = 0;
		let company = new Company();
		company.addEmployees("Tim", "Sue", "Joy", "Tom");

		for(let employee of company) {
			count += 1;
		}

		expect(count).toBe(4);
	});
});