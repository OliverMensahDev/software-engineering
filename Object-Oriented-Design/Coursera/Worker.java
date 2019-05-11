import java.util.Currency;
interface Timesheet{}
interface Invoice{}

class Money {
  public Money(double val, Currency c){}
}

class Worker{
  private String name;
  public Worker(String name){
    this.name = name;
  }
  public void pay(){};
}

class Employee extends Worker {
  private Timesheet[] unpaidTimesheets;
  public Employee(String name){
    super(name);
  }
  
  public void attachTimesheet(Timesheet i){}
}

class Contractor extends Worker {
  private Invoice[] invoiceDues;
  public Contractor(String name){
    super(name);
  }
  
  public void attachInvoice(Invoice i){}
}


class AccountsPayable  {
  Worker[] workers;
  
  public void payEverybody(){
    for (Worker worker: workers){
      worker.pay();
    }
  }
}

// reducing class Dependency 

import java.util.Currency;
interface Timesheet{}
interface Invoice{}

interface Payable(){
  void pay();
}

class Money {
  public Money(double val, Currency c){}
}

abstract class Worker{
  private String name;
  public Worker(String name){
    this.name = name
  }
  public void pay(){
    Money due = getAmountDue();
  };
  
  abstract protected Money getAmountDue();
}

class Employee extends Worker {
  private Timesheet[] unpaidTimesheets;
  public Employee(String name){
    super(name);
  }
  
  public void attachTimesheet(Timesheet i){}
  
  protected Money getAmountDue(){
    return new Money(12.34, Currency.getIntance("USD"));
  }
}

class Contractor extends Worker {
  private Invoice[] invoiceDues;
  public Employee(String name){
    super(name);
  }
  
  public void attachInvoice(Invoice i){}
  
    protected Money getAmountDue(){
    return new Money(12.34, Currency.getIntance("USD"));
  }
  
}


class AccountsPayable  {
  Payable[] payables;
  
  public void payEverybody(){
    for (Worker payable: payables){
      payable.pay;
    }
  }
}