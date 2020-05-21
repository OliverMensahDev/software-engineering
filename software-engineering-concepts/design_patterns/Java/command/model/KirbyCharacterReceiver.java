package command.model;

public class KirbyCharacterReceiver {

    private String name;


    public void moveUp() {
        System.out.println(getName() + " jumping up!");
    }

    public void moveLeft() {
        System.out.println(getName() + " moving Left!");
    }

    public void moveRight() {
        System.out.println(getName() + " moving Right!");
    }

    public void moveDown() {
        System.out.println(getName() + " moving Down!");
    }


    public void setName(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }
}
