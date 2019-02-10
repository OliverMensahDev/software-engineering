describe('Proxies', function() {
  
	it('should let you intercept gets', function() {
		var unicorn = {
			legs: 4,
			color: 'brown',
			horn: true
		}
		var proxyUnicorn = new Proxy(unicorn, {
			get: function(target, property) {
				if(property === 'color') {
					return 'awesome ' + target[property];
				} else {
					return target[property];
				}
			}
		});

		expect(proxyUnicorn.legs).toBe(4);
		expect(proxyUnicorn.color).toBe('awesome brown');
	});

	it('should let you intercept sets', function() {
		var unicorn = {
			legs: 4,
			color: 'brown',
			horn: true
		}
		var proxyUnicorn = new Proxy(unicorn, {
			set: function(target, property, value) {
				if(property === 'horn' && value === false) {
					console.log('unicorn cannot ever lose its horn!');
				} else {
					target[property] = value;
				}
			}
		});

		proxyUnicorn.color = 'white';
		proxyUnicorn.horn = false;
		expect(proxyUnicorn.color).toBe('white');
		expect(proxyUnicorn.horn).toBe(true);
	})	

	it('should let you proxy functions', function() {
		var unicorn = {
			legs: 4,
			color: 'brown',
			horn: true,
			hornAttack: function(target) {
				return target.name + ' was obliterated!';
			}
		}
		unicorn.hornAttack = new Proxy(unicorn.hornAttack, {
			apply: function(target, context, args) {
				if(context !== unicorn) {
					return 'nobody can use unicorn horn but unicorn!';
				} else {
					return target.apply(context, args);
				}
			}
		});
		var thief = { name: 'Rupert'}
		thief.attack = unicorn.hornAttack;
		expect(thief.attack()).toBe('nobody can use unicorn horn but unicorn!');
		expect(unicorn.hornAttack(thief)).toBe('Rupert was obliterated!');
	})

});