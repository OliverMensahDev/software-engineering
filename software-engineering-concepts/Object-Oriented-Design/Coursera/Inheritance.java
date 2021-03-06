abstract class Inheritance {
  protected Color color;
  public void darken(){}
  abstract public void draw(Graphic g){}
}

class Circle extends Inheritance {
  private Point Center;
  private int radius;
  
  public void draw(Graphic g){
    g.setColor(super.color);
  }
}
  