package prototype;

public class Dolphin implements Prototype {
    private String name;
    private int age;

    public Dolphin(String name, int age) {
        this.name = name;
        this.age = age;
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
    public Prototype clone() {
        return new Dolphin(name, age);
    }

    @Override
    public String toString() {
        return "This is person named: " + name;
    }
}
