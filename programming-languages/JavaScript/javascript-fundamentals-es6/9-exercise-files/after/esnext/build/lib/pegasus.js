var pegasus = function() {
    "use strict";

    function pegasus(name) {
		this.name = name;
		this.wings = true;
	}

    return pegasus;
}();

var p = new pegasus('Alex');
console.log(p.name);