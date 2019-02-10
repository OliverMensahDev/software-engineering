describe("comprehensions", function() {

	it("can create arrays or generators", function(){

		let range = function*(start, end) {
			let current = start;
			while(current <= end) {
				yield current;
				current += 1;			
			}
		}

		let numbers = [];
		for(let n of [1,2,3]) {
			numbers.push(n * n);
		}
		expect(numbers).toEqual([1, 4, 9]);

		let numbers = [for (n of [1,2,3]) if(n > 1) n * n];
		expect(numbers).toEqual([4,9]);

		let numbers2 = (for (n of [1,2,3]) n * n);
		expect(Array.from(numbers2)).toEqual([1,4,9]);

	});

	it("can be used with yield*", function(){

		class Company {	
			constructor() {
				this.employees = [];
			}
			
			addEmployees(...names) {
				this.employees = this.employees.concat(names);
			}	
			*[Symbol.iterator]() {
				for(let e of this.employees) {
					console.log("yield", e);
					yield e;
				}
			}
		}

		let filter = function*(items, predicate) {			
			yield* (for (item of items) if(predicate(item)) item);
			// for(let item of items) {
			// 	if(predicate(item)) {
			// 		yield item;
			// 	}
			// }			
		}

		let take = function*(items, number) {
			let count = 0;
			if(number < 1) return;
			for(let item of items) {				
				yield item;
				count += 1;
				if(count >= number) {
					return;
				}
			}
		}

		let count = 0;
		let company = new Company();
		let found = undefined;
		company.addEmployees("Tim", "Sue", "Joy", "Tom");

		for(let employee of take(filter(company, e => e[0] == 'S'),1)) {			
			count += 1;
			found = employee;
			console.log("got", employee);
		}

		expect(count).toBe(1);
		expect(found).toBe("Sue");
	});

});