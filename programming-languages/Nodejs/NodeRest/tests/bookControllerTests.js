/**
 * mocha : testing 
 * should: Assertion  
 * sinon: mocking  
 */

const should = require('should');
const sinon = require('sinon');
const bookController = require('../controllers/bookController');

 //tdd style
describe("Book controller Tests", () => {
  describe("Post", () =>{
    const Book = function(book){this.save = () => {}};

    const req = {
      body: {
        author: 'Oliver'
      }
    };

    const res = {
      status : sinon.spy(),
      send : sinon.spy(),
      json : sinon.spy()
    };

    const controller = bookController(Book);
    controller.post(req, res);

    res.status.calledWith(400).should.equal(true, `Bad Status ${res.status.args[0]}`);
    res.send.calledWith("Title is required").should.equal(true);

  });
});