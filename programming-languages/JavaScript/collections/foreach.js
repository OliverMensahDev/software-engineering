var stocks = [
    {symbol:"XFX", price: 240.22, voulme:23432},
    {symbol:"TNZ", price: 332.02, voulme:234},
    {symbol:"JXT", price: 222, voulme:453}
]

// function getStocksSymbol(stocks){
//     var symbols = [], stock;
//     for(let counter = 0; counter < stocks.length; counter++){
//         stock = stocks[counter];
//         symbols.push(stock.symbol)
//     }
//     return symbols;
// }

stocks.forEach((el)=>{
    console.log(el.symbol)
})

//console.log(getStocksSymbol(stocks));
console.log(3)


