import java.util.HashMap;

public class Stock{
  public static void main(String[] args) {
    HashMap<Integer, Product> map = new HashMap<>();
    map.put(41582018, new Product("Key Soap", 46));
    
    Product eachProduct = map.get(41582018);
    System.out.println(map.get(41582018));
    System.out.println(eachProduct);
    System.out.println(eachProduct.getName());
    
    
    
  }
}