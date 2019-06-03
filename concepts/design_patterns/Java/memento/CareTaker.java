import java.util.ArrayList;
import java.util.List;

public class CareTaker {

    private List stateList = new ArrayList();


    public void addMemento(Memento me) {
        stateList.add(me);

    }

    public Memento getMemento(int index) {
        return (Memento) stateList.get(index);
    }
}
