describe("the class keyword", function(){

	it("can create a class", function(){

		class Employee {
			doWork() {
				return "complete!";
			}
		}

		var e = new Employee();
		expect(e.doWork()).toBe("complete!");


		var Employee = function() {

		};

		Employee.prototype = {
			doWork: function(){
				return "complete!";
			}
		};
 
		var e = new Employee();
		expect(e.doWork()).toBe("complete");

	});

});