class Polymorphism{
  public static void main(String args[]){
   Shape rec = new Rectangle(7, 3);
   System.out.println(rec.calArea());
   Shape cir = new Circle(7);
   System.out.println(cir.calArea());
  }
}


interface Shape{
  double calArea();
}

class Rectangle implements Shape{
  private double length, width;
  public Rectangle(double length, double width){
    this.length = length;
    this.width = width;
  }
  
  public double calArea(){
    return this.length * this.width;
  }
}


class Circle implements Shape{
  private double radius;
  public Circle(double radius){
    this.radius = radius;
  }
  
  public double calArea(){
    return this.radius * this.radius;
  }
}