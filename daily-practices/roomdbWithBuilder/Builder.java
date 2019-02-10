class Builder{
  public static void main(String[] args){
    Room roomdb = new Room
      .databaseBuilder("app context", "class", "db")
      .build();
    System.out.println(roomdb);
  }  
}

class Room{
  private final String context;
  private final String obj;
  private final String dbName;
  
  public Room(databaseBuilder builder){
    this.context = builder.context;
    this.obj = builder.obj;
    this.dbName = builder.dbName;
  }
  
  public static class databaseBuilder {
  private final String context;
  private final String obj;
  private final String dbName;
  private String others;
    
    
    public databaseBuilder(String context, String obj, String dbName){
    this.context = context;
    this.obj = obj;
    this.dbName = dbName;
    }
    
    public databaseBuilder age(String others){
      this.others = others ;
      return this;
    }
    
    public Room build(){
      return new Room(this);
    }
  }
  @Override 
  public String toString(){
     return "context: " + this.context + "\n" 
      + "dbName: " + this.dbName + "\n"
      +"obj: " + this.obj + "\n";
  }
}  