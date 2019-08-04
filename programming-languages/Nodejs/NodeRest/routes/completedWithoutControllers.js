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
  bookRouter.use('/book/:bookId', (req, res, next) => {
    Book.findById(req.params.bookId, (err, book) => {
      if(err) return res.send(err);
      if(book){
        req.book = book;
        return next();
      }
      return res.sendStatus(404);
    });

  });  
  bookRouter.route('/book/:bookId')
    .get((req, res) =>  res.json(req.book))
    .put((req, res) =>  {
      const { book } = req
      book.title = req.body.title;
      book.author = req.body.author;
      book.genre = req.body.genre;
      book.read  = req.body.read;
      book.save(err => {
        if(err) res.send(err)
        return res.json(book)
      })
    })
    .patch((req, res)  => {
      const { book } = req;
      if(req.body._id){
        delete req.body._id
      } 
      Object.entries(req.body).forEach(item => {
        const key = item[0];
        const value = item[1];
        book[key] = value;
      });
      book.save(err => {
        if(err) res.send(err)
        return res.json(book)
      })
    })
    .delete((req, res) => {
      req.book.remove((err) => {
        if(err) res.send(err)
        res.sendStatus(204);
      })
    })
  return bookRouter;  
}

module.exports = routes;