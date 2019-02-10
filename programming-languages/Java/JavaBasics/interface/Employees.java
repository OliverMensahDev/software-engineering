public class Employees extends Workers{
  
  public Employees(String name, int age){
    super.name = name;
    super.age = age;
  }
  
  public void pay() {
    super.salary = 6000.00;
  }
  public boolean retired(){
    if(super.age > 60){
      return true;
    }
    else {
      return false;
    }
  }   
}