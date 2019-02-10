import java.util.ArrayList;
import java.util.List;

public class ProxyBank implements Bank {
    private RealBank bank = new RealBank();
    private static List<String> bannedClients;


    static {
         bannedClients =  new ArrayList<>();
         bannedClients.add("xXcs");
         bannedClients.add("me@me");
         bannedClients.add("@xmil.com");
    }

    @Override
    public void withdrawMoney(String clientName) throws Exception {
        if (bannedClients.contains(clientName.toLowerCase())) {
            throw new Exception(clientName + " Access Denied!  You are not who you say you are!");
        }

        bank.withdrawMoney(clientName);
    }
}
