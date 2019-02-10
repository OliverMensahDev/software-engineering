public class Originator {

    //This String is just to simplify our understanding
    //In a real application you would have an actual
    //Java model class: Person.java, Character.java etc.

    private String state;

    public String getState() {
        return state;
    }

    public void setState(String state) {
        this.state = state;
    }


    public Memento createMemento() {
        return new Memento(state);
    }

    public void setMemento(Memento memento) {
        state = memento.getState();
    }
}
