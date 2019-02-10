var stocks = [
    {symbol:"XFX", price: 240.22, voulme:23432},
    {symbol:"TNZ", price: 332.02, voulme:234},
    {symbol:"JXT", price: 222, voulme:453}
]

var prices =stocks
    .filter(stock => stock.price > 250)
    .map( stock => stock.price * 4 )
    
console.log(prices);
console.log(3)


