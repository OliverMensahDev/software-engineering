function advancedResults(model, populate) {
  return async function (req, res, next) {
    let query = model.find();
    if (req.params.bootcampId) {
      query = model.find({ bootcamp: req.params.bootcampId });
    }
    //paginate
    const page = parseInt(req.query.page, 10) || 1;
    const limit = parseInt(req.query.limit, 10) || 10;
    const startIndex = (page - 1) * limit;
    const endIndex = page * limit;
    const total = await model.countDocuments();

    query = query.skip(startIndex).limit(limit);
    const paginationRes = {};
    if (endIndex < total) {
      paginationRes.next = {
        page: page + 1,
        limit: limit,
      };
    }
    if (startIndex > 0) {
      paginationRes.prev = {
        page: page - 1,
        limit,
      };
    }
    //select
    if (req.query.select) {
      const fields = req.query.select.split(',').join(' ');
      query = query.select(fields);
    }
    //Sort
    if (req.query.sort) {
      const fields = req.query.sort.split(',').join(' ');
      query = query.sort(fields);
    }

    if (populate) {
      query = query.populate(populate);
    }
    const results = await query;

    res.advancedResults = {
      success: true,
      count: results.length,
      pagination: paginationRes,
      data: results,
    };
    next();
  };
}

module.exports = advancedResults;
