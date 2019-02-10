public class BasketBall extends Ball {
  
  public BasketBall(){
   super.color = "Green";
    
  }
    //Properties
    private boolean isNBA;
    private int capacity;



    //Behaviors
    public boolean isNBA() {

        if (isNBA == true) {
            return  true;
        }else {
            return false;
        }

    }

    //Override
    public void bounce() {
        System.out.println("Basketball Bouncing");

    }

}