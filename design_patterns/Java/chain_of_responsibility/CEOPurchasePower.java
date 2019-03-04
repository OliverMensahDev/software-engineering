package chain_of_responsibility;
public class CEOPurchasePower extends PurchasePower{
    @Override
    protected double getAllowable() {
        return BASE * 100000;
    }

    @Override
    protected String getRole() {
        return "CEO";
    }
}
