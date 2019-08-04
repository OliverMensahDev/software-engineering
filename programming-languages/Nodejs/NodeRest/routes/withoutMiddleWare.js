/* eslint-disable no-param-reassign */
const express = require('express');

function routes(Book) {
  const bookRouter = express.Router();
  bookRouter.route('/books')
    .post((req, res) => {
      let book = new Book(req.body);
      book.save()
        .then(() => res.status(201).json(book))
        .catch(err=> res.status(300).json(err));
    });
  bookRouter.route('/books')
    .get((req, res) => {
      // let { query } =  req;
      let query = {};
      if(req.query.genre) query.genre = req.query.genre;
      Book.find(query, (err, books) => {
        if(err) return res.send(err);
        return res.json(books);
      });
    });  
  bookRouter.route('/book/:bookId')
    .get((req, res) => {
      Book.findById(req.params.bookId, (err, book) => {
        if(err) return res.send(err);
        return res.json(book);
      });
    })
    .put((req, res) =>  {
      Book.findById(req.params.bookId, (err, book) => {
        if(err) return res.send(err);
        book.title = req.body.title;
        book.author = req.body.author;
        book.genre = req.body.genre;
        book.read  = req.body.read;
        book.save();
        return res.json(book);
      });
    })
    .patch() 
  return bookRouter;  
}

module.exports = routes;