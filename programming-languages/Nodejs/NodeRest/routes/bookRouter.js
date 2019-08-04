/* eslint-disable no-param-reassign */
const express = require('express');
const booksController = require('../controllers/bookController');

function routes(Book) {
  const bookRouter = express.Router();
  const controller = booksController(Book);
  bookRouter.route('/books')
    .post(controller.post);
  bookRouter.route('/books')
    .get(controller.get); 
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
    .get((req, res) => {
      const returnedBook = req.book.toJSON();
      returnedBook.links = {};
      const genre = req.book.genre.replace(' ', '%20');
      returnedBook.links.filterByThisGenre =  `http://${req.headers.host}/api/books/?genre=${genre}`;
      res.json(returnedBook)
    }) 
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