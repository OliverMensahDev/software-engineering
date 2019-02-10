class Driver{
  
  public static void main(String[] args){
    Driver driver = new Driver(true);
    
//    if (driver.sleepy) {
//      driver.park();
//    } else {
//      driver.drive();
//    }
    driver[driver.sleepy ? 'park' : 'drive']()

    
  }
  public boolean sleepy;
  public Driver( boolean sleepy){
    this.sleepy =sleepy;
  }
  public void drive(){
    System.out.println("sleep");
  }
  public void park(){
    System.out.println("Park");
  }
}




