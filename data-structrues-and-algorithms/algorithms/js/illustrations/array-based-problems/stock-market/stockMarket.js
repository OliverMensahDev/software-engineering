class StockMarket{
    constructor(stockPrices){
        this.stockPrices = stockPrices
    }
    getMaxProfitA() {
        let maxProfit = 0;
        // Go through every price and time
        for (let earlierTime = 0; earlierTime < this.stockPrices.length; earlierTime++) {
          const earlierPrice = this.stockPrices[earlierTime];
      
          // And go through all the LATER prices
          for (let laterTime = earlierTime + 1; laterTime < this.stockPrices.length; laterTime++) {
            const laterPrice = this.stockPrices[laterTime];
            // See what our profit would be if we bought at the
            // min price and sold at the current price
            const potentialProfit = laterPrice - earlierPrice;
            // Update maxProfit if we can do better
            maxProfit = Math.max(maxProfit, potentialProfit);
          }
        }
        return maxProfit;
    }

    getMaxProfitB() {
        let minPrice = this.stockPrices[0];
        let maxProfit = 0;
        for (let i = 0; i < this.stockPrices.length; i++) {
          const currentPrice = this.stockPrices[i];
          // Ensure minPrice is the lowest price we've seen so far
          minPrice = Math.min(minPrice, currentPrice);
      
          // See what our profit would be if we bought at the
          // min price and sold at the current price
          const potentialProfit = currentPrice - minPrice;
          // Update maxProfit if we can do better
          maxProfit = Math.max(maxProfit, potentialProfit);
        }
        return maxProfit;
    }
    getLargestAndSmallest(){
        let largest = this.stockPrices[0];
        let smallest =  this.stockPrices[0];
        let remaining = this.stockPrices.slice(1);  
        for (let  number of  remaining) {
             if (number > largest) { 
                 largest = number; 
            } else if (number < smallest) {
                 smallest = number; 
            }
        } 
        return largest -   smallest ;
    }


}

const stockPrices = [10, 7, 5, 8, 11, 9];
const s = new StockMarket(stockPrices);
console.log(s.getLargestAndSmallest());
