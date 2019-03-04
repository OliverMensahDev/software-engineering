package chain_of_responsibility;

public class ManagerPurchasePower extends PurchasePower {
    @Override
    protected double getAllowable() {
        return BASE * 10;
    }

    @Override
    protected String getRole() {
        return "Manager";
    }
}
