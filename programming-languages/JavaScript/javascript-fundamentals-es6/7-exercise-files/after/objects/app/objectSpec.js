describe('object', function() {
  
  describe('is function', function() {
    it('should consider positive and '
      + 'negative zero to be different', function() {
      expect(-0 === 0).toBe(true);
      expect(Object.is(0, -0)).toBe(false);    
    });

    it('should consider NaN to be NaN', function() {
      expect(NaN === NaN).toBe(false);
      expect(Object.is(NaN, NaN)).toBe(true);
    });
  });

  describe('assign function', function() {
    it('should apply mixins to objects', function() {
      var shark = {
        bite: function(target) {
          target.hurt = true;
        }
      }
      var person = {}

      var laser = {
        pewpew: function(target) {
          target.exploded = true;
        }
      }

      Object.assign(shark, laser);

      shark.pewpew(person);
      expect(person.exploded).toBe(true);
    });
  });

  describe('property initializer shorthand', function() {
    it('should create properties ' +
      'from local variables', function() {
      var model = 'Ford';
      var year = 1969;

      var Classic = {
        model,
        year
      } 

      expect(Classic.model).toBe('Ford');
      expect(Classic.year).toBe(1969);   
    });
  });

  describe('method initializer shorthand', function() {
    it('should create methods using shorthand', function() {
      var server = {
        getPort() {
          return 8000;
        }
      }

      expect(server.getPort()).toBe(8000);
    });
  });

  describe('computed property names', function () {
    it('should support variables for '
      + 'property names', function () {

      function createSimpleObject(propName, propVal) {
        return {
          [propName]:propVal
        }
      }

      var simpleObj = createSimpleObject('color', 'red');
      expect(simpleObj.color).toBe('red');
    });

    it('should support concatenation', function() {
      function createTriumvirate(first, second, third) {
        return {
          ['member_' + first.name]:first,
          ['member_' + second.name]:second,
          ['member_' + third.name]:third
        }
      }

      var Joe = {name: 'Joe'}
      var Ralph = {name: 'Ralph'}
      var Harry = {name: 'Harry'}

      var tri = createTriumvirate(Joe, Ralph, Harry);
      expect(tri.member_Joe).toBe(Joe);
    })
  })

});