package com.onlineshop;


import com.onlineshop.country.US;
import com.onlineshop.entities.Address;
import com.onlineshop.entities.Customer;
import com.onlineshop.entities.Membership;
import com.onlineshop.entities.Order;
import com.onlineshop.handlers.CheckoutHandler;
import com.onlineshop.handlers.SimpleCurrencyConverter;
import com.onlineshop.items.Cheese;
import com.onlineshop.items.Chocolate;
import com.onlineshop.items.Item;
import java.util.Arrays;
import java.util.List;

public class App {


    public static void main(String[] args){

        // BEFORE(Adding currency converter to a checkout class hence violating the SRP
        CheckoutHandler checkout = new CheckoutHandler();
        Customer customer4 = new Customer(Membership.BRONZE, new Address(new US(),"CAL", "MyStreet 123, US"),19);

        // add items to list
        List<Item> shoppingList2 = Arrays.asList(new Chocolate(), new Chocolate(), new Cheese());
        Order order4 = new Order(shoppingList2, "DummyVoucher");
        order4.setCustomer(customer4);
        double total2 = checkout.calculateTotal(order4);
        System.out.println(total2);
        double convertToEUR = checkout.convertToCurrency(total2, "EUR");
        System.out.println(convertToEUR);


        //AFTER(Using a dedicated class)
        SimpleCurrencyConverter converter = new SimpleCurrencyConverter("EUR");
        System.out.println(converter.convert(total2));
    }
}
