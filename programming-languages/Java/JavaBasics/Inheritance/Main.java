public class Main{
  public static void main(String[] args){
    Baseball base = new Baseball();
    base.setColor("Blue");
    base.setName("Baseball");
    
    //base.inflated = true;
    
    System.out.println(base.getName());
    
    
    Ball ball = new Ball();
    System.out.println("Ball Color: "+ ball.color);
    
    BasketBall basketBall = new BasketBall();
    System.out.println("Basket ball Color:  " +basketBall.color);
  }
}