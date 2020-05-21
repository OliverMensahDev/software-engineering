import java.util.ArrayList;
import java.util.List;

public class ATCMediatorImpl implements ATCMediator {
    private List<AirCraft> airCraftList;

    public ATCMediatorImpl() {
        this.airCraftList = new ArrayList<>();
    }

    @Override
    public void sendMessage(String msg, AirCraft airCraft) {
        for (AirCraft a : airCraftList) {
            //message should  not be received by the aircraft sending the message
            if (a != airCraft) {
                a.receive(msg);
            }
        }


    }

    @Override
    public void addAirCraft(AirCraft airCraft) {
        airCraftList.add(airCraft);

    }
}
