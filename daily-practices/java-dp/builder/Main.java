package builder;

public class Main {

    public static void main(String[] args) {

        //An example of a Java Library class that uses the Builder Design Patterns
//        StringBuilder stringBuilder = new StringBuilder();
//        stringBuilder.append("Hello World")
//                .append("I don't know")
//                .append("This is the end");

       // System.out.println(stringBuilder);

       User James = new User.UserBuilder("James", "Bond")
               .phoneNumber("007")
               .build();

        //System.out.println(James);

        Person tallPerson = new Person.Builder("James", "Arriola").build();

        System.out.println(tallPerson);


    }

}
