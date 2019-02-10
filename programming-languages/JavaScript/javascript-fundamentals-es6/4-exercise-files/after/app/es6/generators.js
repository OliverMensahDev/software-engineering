describe("generators", function(){

	it("can build an iterable", function(){

		let numbers = function*(start, end) {
			for(let i = start; i <= end; i++) {

				yield i;
			}
		};

		let sum = 0;		
		for(let n of numbers(1,5)){
			sum += n;
		}
		
		expect(sum).toBe(15);
	});

	it("can be built by implementing Symbol.iterator", function(){

		class Company {	
			constructor() {
				this.employees = [];
			}
			
			addEmployees(...names) {
				this.employees = this.employees.concat(names);
			}	
			*[Symbol.iterator]() {
				for(let e of this.employees) {
					//console.log(e);
					yield e;
				}
			}
		}

		let filter = function*(items, predicate) {
			for(let item of items) {
				//console.log("filter", item);
				if(predicate(item)) {
					yield item;
				}
			}			
		}

		let take = function*(items, number) {
			let count = 0;
			if(number < 1) return;
			for(let item of items) {
				//console.log("take", item);
				yield item;
				count += 1;
				if(count >= number) {
					return;
				}
			}
		}

		let count = 0;
		let company = new Company();
		company.addEmployees("Tim", "Sue", "Joy", "Tom");

		for(let employee of take(filter(company, e => e[0] == 'T'),1)) {
			count += 1;
		}

		expect(count).toBe(1);
	});

	it("can take a parameter from next(param)", function() {

		let range = function*(start, end) {
			let current = start;
			while(current <= end) {
				let delta = yield current;
				current += delta || 1;			
			}
		}

		let range2 = function(start, end) {
			let current = start;
			let first = true;
			return {
				next(delta = 1) {
					let result = { value: undefined, done: true };
					if(!first) {
						current += delta;
					}
					if(current <= end) {
						result.value = current;
						result.done = false;						
					}
					first = false;
					return result;
				}
			}
		}

		let result = [];
		let iterator = range2(1,10);
		let next = iterator.next();
		while(!next.done) {
			result.push(next.value);
			next = iterator.next(2);
		}

		expect(result).toEqual([1, 3, 5, 7, 9]);
	});

});