describe('Sets', function() {

	it("should contain zero items when constructed", function () {
		var set = new Set();
		expect(set.size).toBe(0);
	});

	it("should contain 1 item when one item is added", function () {
		var set = new Set();
		set.add("somevalue");
		expect(set.size).toBe(1);
	});

	it('should allow objects as a key', function() {
		var set = new Set();
		var key = {};
		set.add(key);
		expect(set.has(key)).toBe(true);
	});

	it("should contain items when given an array in the constructor", function () {
		var set = new Set([1,2,3]);
		expect(set.has(1)).toBe(true);
	});

	it("should not allow duplicate values", function () {
		var set = new Set();
		var key = {};
		set.add(key);
		set.add(key);
		expect(set.size).toBe(1);
	});

	it("should have no items after clear is called", function () {
		var set = new Set();
		set.add(1);
		set.add(2);
		set.add(3);
		set.clear();
		expect(set.size).toBe(0);
	});

	it("should remove an item when delete is called", function () {
		var set = new Set();
		set.add(1);
		set.add(2);
		set.delete(1);
		expect(set.size).toBe(1);
	});

	it("should call a callback function once for each item when foreach is invoked", function() {
    var set = new Set();
   	set.add('Tom');
   	set.add('Dick');
   	set.add('Harry');

   	var iterationCount = 0;
   	set.forEach(item => iterationCount++);
   	expect(iterationCount).toBe(3);
  });

  it('should support for of iteration', function() {
  	var set = new Set([1,2,3]);

  	var iterationCount = 0;
  	for(var item of set) {
  		iterationCount++;
  	}
  	expect(iterationCount).toBe(3);
  });

  it("should return an iterator of arrays when entries is called", function () {
    var set = new Set();
    set.add("1");

    var entries = set.entries();
    var firstEntry = entries.next().value;
    expect(firstEntry[0]).toBe("1");
    expect(firstEntry[1]).toBe("1");
  });

  it("should return an iterator of values when values is called", function () {
    var set = new Set();
    set.add("1");

    var values = set.values();
    var firstValue = values.next().value;
    expect(firstValue).toBe("1");
  });

  it("should be able to be constructed with an iterator", function () {
  	var set = new Set();
  	set.add("1");
  	set.add("2");
  	set.add("3");

  	var set2 = new Set(set.values());
  	expect(set2.size).toBe(3);
  });

});