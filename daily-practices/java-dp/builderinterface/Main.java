package builderinterface;

public class Main {

    public static void main(String[] args) {

         Person oldPerson = new Person.Builder("James", "Bond")
                 .phone("007")
                 .address("London")
                 .age(45)
                 .build();


        System.out.println(oldPerson);






    }
}
