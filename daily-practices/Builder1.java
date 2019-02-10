class Builder1{
  public static void main(String[] args){
    User James = new UserBuilder("Oliver", "Mensah")
      .address("Banana Street, East Legon, Accra")
      .age(26)
      .phoneNumber("0544892841")
      .mother("Mary Mensah")
      .build();
    System.out.println(James);
  }  
}

class User{
  private final String firstName;
  private final String lastName;
  private final int age;
  private final String phoneNumber;
  private final String address; 
  private final String mother;
  
  public User(UserBuilder builder){
    this.firstName = builder.firstName;
    this.lastName = builder.lastName;
    this.age = builder.age;
    this.phoneNumber = builder.phoneNumber;
    this.address = builder.address;
    this.mother = builder.mother;
  }
  
  @Override 
  public String toString(){
    return "Name: " + this.firstName + " " + this.lastName+ "\n" 
      + "Age: " + this.age + "\n"
      + "PhoneNumber: " + this.phoneNumber + "\n"
      + "Address: " + this.address + "\n"
      +"Mother: " + this.mother + "\n";
  }
}

class UserBuilder {
  public final String firstName;
  public final String lastName;
  public  int age;
  public  String phoneNumber;
  public  String address;
  public  String mother;
  
  
  public UserBuilder(String firstName, String lastName){
    this.firstName = firstName;
    this.lastName = lastName;
  }
  
  public UserBuilder age(int age){
    this.age = age ;
    return this;
  }
  
  public UserBuilder phoneNumber(String phoneNumber){
    this.phoneNumber = phoneNumber ;
    return this;
  }
  
  public UserBuilder address(String address){
    this.address = address ;
    return this;
  }
  
  public UserBuilder mother(String mother){
    this.mother = mother ;
    return this;
  }
  
  
  public User build(){
    return new User(this);
  }
}
  