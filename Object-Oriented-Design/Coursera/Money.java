// The Money class has information about the money but it does not do anything with it. It allows
// other classes to do comparison which is bad.
public class Money {
  private double value;
  
  public Money(double value) {
    this.value = value;
  }
  
  public double getValue () {
    return this.value;
  }
  public void setValue(double value) {
    this.value = value;
  }
}

class Test {
  private static void dispenseFunds(Money amount){}
  
  public static void test(){
    Money balance = new Money(1.0);
    Money request = new Money(3.0);
    
    if(balance.getValue() > request.getValue()){
      dispenseFunds(request);
    }
  }
}


// Upgrading class  and that is where the challenge comes in.

enum Currency{
  USD, EURO;
  public double conversionRateTo(Currency taget){
    return 1.0;
  }
}
class Money {
  private double value;
  private Currency currency;
  
  public Money(double value, Currency currency) {
    this.value = value;
    this.currency  = currency;
  }
  
  public double getValue () {
    return this.value;
  }
  public void setValue(double value) {
    this.value = value;
  }
  public Currency getCurrency() {
    return this.currency;
  }
  
  public void setCurrency(Currency currency) {
    this.currency = currency;
  }
}

class Test {
  private static void dispenseFunds(Money amount){}
  
  public static void test(){
    Money balance = new Money(1.0, Currency.EURO);
    Money request = new Money(3.0, Currency.USD);
    
    
    double normalizedBalance = balance.getValue() * balance.getCurrency().conversionRateTo(Currency.USD);
    double normalizedRequest = request.getValue()* request.getCurrency().conversionRateTo(Currency.EURO);
    if(normalizedBalance > normalizedRequest){
      dispenseFunds(request);
    }
  }
}
