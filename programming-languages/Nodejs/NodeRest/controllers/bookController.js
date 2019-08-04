//revealing module pattern

function bookController(Book){
  function post(req, res){
    let book = new Book(req.body);
    if(!req.body.title){
      res.status(400)
      return res.send("Title is required");
    }   
    book.save( err => {
      if(err) {
        res.status(400)
        return res.json(err)
      };
        res.status(201)
        return res.json(book) 
    })
  }

  function get(req, res){
    // let { query } =  req;
    let query = {};
    if(req.query.genre) query. genre = req.query.genre;
    Book.find(query, (err, books) => {
      if(err) return res.send(err);
      const returnedBooks = books.map((book)=> {
        let newBook = book.toJSON();
        newBook.links = {};
        newBook.links.self = `http://${req.headers.host}/api/book/${book._id}`;
        return newBook;
      }) 
      return res.json(returnedBooks);
    });
  }
  
  return {
    post,
    get
  }
}
module.exports = bookController;