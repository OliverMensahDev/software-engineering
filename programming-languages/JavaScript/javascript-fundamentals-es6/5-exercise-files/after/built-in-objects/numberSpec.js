describe("Numbers", function() {

	it('should easily mistake numbers with leading zeroes', function() {
		var octal = 071;
		expect(parseInt(octal)).toBe(57);
	});

	it("should support octal literals", function () {
		var octal = 0o71;
		expect(octal).toBe(57);
	});

	it("should support binary literals", function () {
		var bin = 0b1101;
		expect(bin).toBe(13);
	});

	it("should parse octal values with Number function", function () {
		var octNum = Number("0o71");
		expect(octNum).toBe(57);
	});

	it("should parse binary values with Number function", function () {
		var binNum = Number("0b101");
		expect(binNum).toBe(5);
	});

	it("should expose parseInt and parseFloat", function () {
		expect(Number.parseInt("3")).toBe(3);
		expect(Number.parseFloat("3.5")).toBe(3.5);
	});

	it('should not convert strings when calling Number.isFinite vs global', function() {
		expect(isFinite("1")).toBe(true);
		expect(Number.isFinite("1")).toBe(false);
	});

	it('should not convert strings when calling Number.isNaN vs global', function() {
		expect(isNaN("NaN")).toBe(true);
		expect(Number.isNaN("NaN")).toBe(false);
	});

	it('should correctly detect integers with isInteger', function() {
		expect(Number.isInteger(1)).toBe(true);
		expect(Number.isInteger(1.0)).toBe(true);
		expect(Number.isInteger(1.5)).toBe(false);
	});

	it('should expose max and min safe integer constants', function() {
		expect(Math.pow(2,53)).toBe(Math.pow(2,53)+1);
		expect(Math.pow(2,53)+3).toBe(Math.pow(2,53)+5);

		expect(Number.MAX_SAFE_INTEGER).toBe(Math.pow(2,53)-1);
		expect(Number.MIN_SAFE_INTEGER).toBe(Math.pow(2,53)*-1+1);
	});

	it('should indicate safe integers with isSafeInteger', function() {
		expect(Number.isSafeInteger(9007199254740991)).toBe(true);
		expect(Number.isSafeInteger(9007199254740992)).toBe(false);
	});

});