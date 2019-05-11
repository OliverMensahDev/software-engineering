class BuilderRoom{
  public static void main(String[] args){
    Room roomdb = new Room
      .databaseBuilder("app context", Room.class, "db")
      .build();
    System.out.println(roomdb);
  }  
}

class Room{
  private final String context;
  private final Class obj;
  private final String dbName;
  
  public Room(databaseBuilder builder){
    this.context = builder.context;
    this.obj = builder.obj;
    this.dbName = builder.dbName;
  }
  
  public static class databaseBuilder {
  private final String context;
  private final Class obj;
  private final String dbName;

    
    
    public databaseBuilder(String context, Class obj, String dbName){
    this.context = context;
    this.obj = obj;
    this.dbName = dbName;
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