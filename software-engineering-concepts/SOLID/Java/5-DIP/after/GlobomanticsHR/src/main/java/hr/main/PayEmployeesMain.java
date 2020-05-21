package hr.main;

import hr.notifications.EmailSender;
import hr.payment.PaymentProcessor;
import hr.persistence.EmployeeFileRepository;
import hr.persistence.EmployeeFileSerializer;

public class PayEmployeesMain {

    /*
    Will take a couple of seconds to execute due to the
    sending of mails.
     */

    public static void main(String[] args) {
        PaymentProcessor paymentProcessor = new PaymentProcessor(
                new EmployeeFileRepository(new EmployeeFileSerializer()),
                        new EmailSender());
        int totalPayments = paymentProcessor.sendPayments();
        System.out.println("Total payments " + totalPayments);
    }
}
