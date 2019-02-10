describe('async generators', function() {

  xit('should be difficult to read with regular async code', function() {
    // STEP 1
    // console.log('start');
    // pause(500);
    // console.log('middle');
    // pause(500);
    // console.log('end');

    // STEP 2
    console.log('start');
    pause(500, function() {
      console.log('middle');
      pause(500, function() {
        console.log('end');
      });
    });
  });

  // STEP 3
  xit('should be easier to read with generators', function(done) {
    window.taskDone = false;
    function* main() {
      console.log('start');
      yield pause(500);
      console.log('middle');
      yield pause(500);
      console.log('end');
      
      expect(taskDone).toBe(true);
      done();
    }

    async.run(main);


  });

  // STEP 4
  it('should work with returned data', function(done) {
    window.taskDone = false;
    function* main() {
      try {
        var price = yield getStockPrice();
        if(price > 45) {
          yield executeTrade();
        } else {
          console.log('trade not made');
        }

        expect(taskDone).toBe(true);
        done();
      } catch(ex) {
        console.log('error! ' + ex.message);
        done();
      }
    }

    async.run(main);

    
  });

  /*
  step 4
  but what about exception handling? what if say we generate an error here in 
  our getstockprices method. Just adding that will cause an unhandled exception
  let's try to address that. What would be best is if I could wrap a single try/catch
  around this body of the main method. and any exception be handled there.
  But if we add that now <add code> it doesn't improve anything.
  The key here is that sequences in addition to having a next method, also have a throw method.
  this will cause the sequence to yield with an exception. basically the yield 
  statement itself produces an exception. So now we just need to go into our async object
  and we'll add a fail method, then we go into our async function here, and get it to trap
  the exception, and call async.fail to pass it on. And now the exception is effectively 
  trapped instead of disappearing off into the async call stack ether.
  */

  

  /// but can we make this simpler? Yes. one of the issues
  /// is that we have to make sure that our async functions know to call
  // resume when they're done.
  // if we're using promises, then we don't have to do this anymore,
  // cause we can just ask the promise to let us know whne it's done
  // and then we can call next ourselves, instead of calling resume.

  xit('should also work with promises', function(done) {
    window.taskDone = false;
    function* main() {
      try {
        var price = yield getStockPriceP();
        if(price > 45) {
          yield executeTradeP();
        } else {
          console.log('trade not made');
        }

        expect(taskDone).toBe(true);
        done();
      } catch(ex) {
        console.log('error! ' + ex.message);
        done();
      }
    }

    asyncp.run(main);
  });
});