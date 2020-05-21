package prototype;

import prototype.model.Person;

public class Main {

    public static void main(String[] args) {


        Person person = new Person("James", 45);
        System.out.println("Person 1: " + person);

        Person secondPerson = (Person)person.clone();
        System.out.println("Person copy: " + secondPerson);

        System.out.println(System.identityHashCode(person) + " \n"
        + System.identityHashCode(secondPerson));


//        Person bonni = new Person("Bonni", 21);
//        System.out.println("Person 1:  " + bonni);
//
//        Person nina = (Person)bonni.clone();
//        nina.setName("Nina");
//        System.out.println("Person 2: " + nina);
//
//
//        Dolphin jerrry = new Dolphin("Jerry", 78);
//        System.out.println("Dolphin 1: " + jerrry);
//
//        Dolphin sam = (Dolphin)jerrry.clone();
//        System.out.println("Dolphin 2: " + sam);
    }
}
