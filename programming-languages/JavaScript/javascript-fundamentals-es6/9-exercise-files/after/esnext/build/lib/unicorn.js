var unicorn = function() {
    "use strict";

    function unicorn(name) {
		this.name = name;
		this.horn = true;
	}

    return unicorn;
}();

var u = new unicorn('bob');
console.log(u.name);