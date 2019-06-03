public class Main {

    public static void main(String[] args) {
	 Bank bank = new ProxyBank();

        try {
            bank.withdrawMoney("Paulo");
            bank.withdrawMoney("me@me");
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
    }
}
