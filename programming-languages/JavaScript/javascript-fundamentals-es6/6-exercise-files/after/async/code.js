function getOrder(orderId) {
  return Promise.resolve({userId:35});
}

function getUser(userId) {
  return Promise.resolve({companyId:18});
}

function getCompany(companyId) {
  return Promise.resolve({name:'Pluralsight'});
}

function getCourse(courseId) {
  var courses = {
    1: {name: "Introduction to Cobol"},
    2: {name: "Yet Another C# Course"},
    3: {name: "How to make billions by blogging"}
  }
  return Promise.resolve(courses[courseId]);
}

function oldPause(delay, cb) {
  setTimeout(function() {
    console.log('paused for ' + delay + 'ms');
    cb();
  }, delay);
}

(function() {
  var sequence;
  var run = function(generator) {
    sequence = generator();
    var next = sequence.next();
  }

  var resume = function(value) {
    sequence.next(value);
  }

  var fail = function(reason) {
    sequence.throw(reason);
  }

  window.async = {
    run: run,
    resume: resume,
    fail: fail
  }
}());

(function() {
  var run = function(generator) {
    var sequence;
    var process = function(result) {
      result.value.then(function(value) {
        if(!result.done) {
          process(sequence.next(value))
        }
      }, function(error) {
        if(!result.done) {
          process(sequence.throw(error));
        }
      })
    }

    sequence = generator();
    var next = sequence.next();
    process(next);
  }

  window.asyncP = {
    run: run
  }
}());

function pause(delay) {
  setTimeout(function() {
    console.log('paused for ' + delay + 'ms');
    async.resume();
  }, delay);
}
function getStockPrice() {
  setTimeout(function() {
    try {
      // throw Error('there was a problem!');
      async.resume(50);
    } catch(ex) {
      async.fail(ex);
    }
  }, 300);
}
function executeTrade() {
  setTimeout(function() {
    console.log('trade completed');
    async.resume();
  }, 300);
}

function getStockPriceP() {
  return new Promise(function(resolve, reject) {
    setTimeout(function() {
      resolve(50);
    }, 300);
  });
}
function executeTradeP() {
  return new Promise(function(resolve, reject) {
    setTimeout(function() {
      reject(Error('failure!'));
      // resolve();
    }, 300);
  });
}