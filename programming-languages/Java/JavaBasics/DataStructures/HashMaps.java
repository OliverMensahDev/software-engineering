import java.util.HashMap;

public class HashMaps{
  public static void main(String[] args) {
    HashMap<Integer, String> map = new HashMap<>();
    map.put(41582018, "Oliver Mensah");
    map.put(99992017, "Adams Manan");
    map.put(20202020, "Makafui Togoh");
    map.put(20202021, "Emmanuel Appiah");
    map.put(11112020, "Banabas Korley");
    map.put(30302020, "Nanabanyin Inkabi");
    map.put(20202022, "Elorm Adinyira");
    map.put(11112021, "Michael Tetteh Nartey");
    System.out.println(map.size());
    
    System.out.println(map.get(20202021));
    // getting all key value pairs
    for ( HashMap.Entry<Integer, String> entry : map.entrySet()){
      System.out.println(entry.getKey());
       System.out.println(entry.getValue());
    }
    // getting only all keys
    for (Integer key : map.keySet()){
      System.out.println(key);
    }
    // getting only all values
    for (String value : map.values()){
      System.out.println(value);
    }
    
  }
}