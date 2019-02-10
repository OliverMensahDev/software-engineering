var stocks = [
    {symbol:"XFX", price: 240.22, voulme:23432},
    {symbol:"TNZ", price: 332.02, voulme:234},
    {symbol:"JXT", price: 222, voulme:453}
]

function getStocksSymbol(stocks){
    return  stocks.filter(function(stock){
        return stock.price > 300;
    })
}
//override built in filter
Array.prototype.filter = function(projection){
    var results = [];
    this.forEach(function(item){
        if(projection(item)){
            results.push(item.symbol);
        }
    })
    return results;
}

console.log(getStocksSymbol(stocks));
console.log(3)


