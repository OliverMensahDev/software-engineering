public class Main {

    public static void main(String[] args) {

        ATCMediator mediator = new ATCMediatorImpl();

        //Create a few aircrafts
        AirCraft boing1 = new AirCraftImpl(mediator,"Boing 1");
        AirCraft helicopter = new AirCraftImpl(mediator, "Helicopter");
        AirCraft boing707 = new AirCraftImpl(mediator, "Boing 707");

        //Adding aircrafts to the mediator
        mediator.addAirCraft(boing1);
       // mediator.addAirCraft(helicopter);
        mediator.addAirCraft(boing707);

        boing1.send("Hello from Boing 1");
    }
}
