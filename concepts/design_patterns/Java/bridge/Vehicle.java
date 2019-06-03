package bridge;

abstract class Vehicle {
    protected WorkShop workshop;
    protected WorkShop workShop2;

    public Vehicle(WorkShop workshop, WorkShop workShop2) {
        this.workshop = workshop;
        this.workShop2 = workShop2;
    }

    abstract public void manufacture();
}
