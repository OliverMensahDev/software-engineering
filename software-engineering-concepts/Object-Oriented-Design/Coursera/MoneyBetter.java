enum Currency{
  USD, EURO;
  public double conversionRateTo(Currency taget){
    return 1.0;
  }
}
class MoneyBetter {
  private double value;
  private Currency currency;
  
  public MoneyBetter(double value, Currency currency) {
    this.value = value;
    this.currency  = currency;
  }
  
  private double normalized() {
    return this.currency == Currency.USD
      ? this.value
      : this.value * this.currency.conversionRateTo(Currency.USD);
  }
  
  public boolean isGreaterThan(MoneyBetter op){
    return (normalized() > op.normalized());
  }
  
}

class Test {
  private static void dispenseFunds(Money amount){}
  
  public static void test(){
    MoneyBetter balance = new MoneyBetter(1.0, Currency.EURO);
    MoneyBetter request = new MoneyBetter(3.0, Currency.USD);
    if(balance.isGreaterThan(request)) dispenseFunds(request);
    
  }
}