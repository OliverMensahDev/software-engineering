describe("arrow functions", function(){

	it("provide a compact syntax to define a function", function(){

		let add = (x,y) => {
			let temp = x + y;
			return temp;
		};
		let square = x => x * x;
		let three = () => 3;

		expect(square(add(2,three()))).toBe(25);

	});

	it("can be used with array methods", function(){

		var numbers = [1,2,3,4];

		var sum = 0;
		numbers.forEach(n => sum += n);
		expect(sum).toBe(10);

		var doubled = numbers.map(n => n * 2);
		expect(doubled).toEqual([2,4,6,8]);
	});

	it("lexically binds to 'this'", function(done) {

		this.name = "Scott";
	
		setTimeout(() => {
			expect(this.name).toBe("Scott");
			done();
		},15);
		
	});

});