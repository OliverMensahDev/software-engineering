package chain_of_responsibility;

abstract class PurchasePower {
    protected static final double BASE = 1000;
    protected PurchasePower successor;

    abstract protected double getAllowable();
    abstract protected String getRole();


    public void setSuccessor(PurchasePower successor) {
        this.successor = successor;

    }

    public PurchasePower getSuccessor() {
        return successor;
    }

    public void processRequest(PurchaseRequest request ) {
        if (request.getAmount() < this.getAllowable()) {
            System.out.println(this.getRole() + " will aprove $" + request.getAmount());


        }else if (successor != null) {
            successor.processRequest(request);
        }

    }
}
