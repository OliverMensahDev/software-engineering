package bridge;

public class Bike extends Vehicle {

    public Bike(WorkShop workshop, WorkShop workShop2) {
        super(workshop, workShop2);
    }

    @Override
    public void manufacture() {
        System.out.println("Bike...");
        workshop.make();
        workshop.make();

    }
}
