var stocks = [
    {symbol:"XFX", price: 240.22, voulme:23432},
    {symbol:"TNZ", price: 332.02, voulme:234},
    {symbol:"JXT", price: 222, voulme:453}
]

function getStocksSymbol(stocks){
    return  stocks.map(function(stock){
        return stock.symbol;
    })
}
//override built in map
// Array.prototype.map = function(projection){
//     var results = [];
//     this.forEach(function(item){
//         results.push(projection(item));
//     })
//     return results;
// }

console.log(getStocksSymbol(stocks));
console.log(3)


