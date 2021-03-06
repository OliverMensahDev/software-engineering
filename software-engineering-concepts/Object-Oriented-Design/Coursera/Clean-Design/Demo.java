import java.io.*;


public class Demo {
  public static void main(String[] args){
    String json = "{ \"name\": \"Allen\"}";
    
    Reader in = new StringReader(json);
    Employee me = new Employee(new JsonImporter(in));
    
    Employee.Exporter exporter = new JsonExporter();
    me.export(exporter);
    
    String jsonVersion = exporter.toString();    
    System.out.println(jsonVersion);
    
    
    
    String xml = "<name value=\"Allen\">";
    in = new StringReader(xml);
    me = new Employee(new XMLImporter(in));
    
    exporter = new XMLExporter();
    me.export(exporter);
    
    jsonVersion = exporter.toString();    
    System.out.println(jsonVersion);
    
  }
}


class Employee{
  private String name;
  public Employee(String name){this.name = name;}
  
  
  // tightly coupled Employee to the source of data
  /*
  public enum FORMAT{XML, JSON}
  public Employee(String source, FORMAT inputFormat){}
  public Employee(java.sql.Connection con, int ID){}
  
  public void exportAsJSON(Writer out){}
  public void exportAsXML(Writer out){}
  public void exportAsSQL(java.sql.Connection out){}
  */
  
  // Solution to tightly coupled 
  interface Importer {String fetchName();}
  interface Exporter {void storeName(String name);}
  
  public Employee(Importer source){
    name = source.fetchName();
  }
  
  public void export(Exporter destination){
    destination.storeName(name);
  }
  
}

class JsonImporter implements Employee.Importer {
  private Reader in;
  public JsonImporter(Reader in) {this.in = in;}
  public String fetchName() {
    //
    return "Oliver";
  }
}

class XMLImporter implements Employee.Importer {
  private Reader in;
  public XMLImporter(Reader in) {this.in = in;}
  public String fetchName() {
    //
    return "Oliver";
  }
}

class JsonExporter implements Employee.Exporter {
  private String name;
  public void storeName(String name) {this.name = name;}
  @Override
  public String toString() {
    return "{ \"name\": \""+ name +"\"}";
  }
}

class XMLExporter implements Employee.Exporter {
  private String name;
  public void storeName(String name) {this.name = name;}
  @Override
  public String toString() {
    return "<name value= \""+ name +"\">";
  }
}
