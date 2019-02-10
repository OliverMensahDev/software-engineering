class Main{
  public static void main(String[] args){
    DB roomdb = new Room()
      .databaseBuilder("app context", "class", "db")
      .build();
    System.out.println(roomdb);
  }  
}

class DB{
  private String context;
  private String obj;
  private String dbName;
  
  public DB(Room room){
    this.context = room.context;
    this.obj = room.obj;
    this.dbName = room.dbName;
  }
  
  @Override 
  public String toString(){
    return "context: " + this.context + "\n" 
      + "dbName: " + this.dbName + "\n"
      +"obj: " + this.obj + "\n";
  }
}

class Room {
  public String context;
  public String obj;
  public String dbName;
    
  public Room databaseBuilder(String context, String obj, String dbName){
    this.context = context;
    this.obj = obj;
    this.dbName = dbName;
    return this;
  }
  public DB build(){
    return new DB(this);
  }
}
  