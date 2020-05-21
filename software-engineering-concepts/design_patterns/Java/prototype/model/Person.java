package prototype.model;

public class Person implements Animal {
    private String name;
    private int age;

    public Person(String name, int age) {
        this.name = name;
        this.age = age;
        System.out.println("Person is created!");
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }

    @Override
    public Animal clone() {

        System.out.println("Creating Person...");
        Person person = null;
        try {
            person = (Person)super.clone();

        } catch (CloneNotSupportedException e) {
            e.printStackTrace();
        }

        return person;
    }

    @Override
    public String toString() {
        return "Person: " + name;
    }
}
