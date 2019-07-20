package com.onlineshop;


import com.onlineshop.entities.Customer;
import com.onlineshop.entities.DeliveryTimeWindow;
import com.onlineshop.entities.Order;
import com.onlineshop.items.Cheese;
import com.onlineshop.items.Chocolate;
import com.onlineshop.items.Item;
import com.sun.org.apache.xpath.internal.operations.Or;

import java.time.LocalDate;
import java.util.Arrays;
import java.util.List;

import static java.time.LocalDate.now;

public class App {


    public static void main(String[] args){

        List<Item> shoppingList = Arrays.asList(new Chocolate(), new Chocolate(), new Cheese());
        Order order = new Order(shoppingList, "DummyVoucher");

        CheckoutHandler checkout = new CheckoutHandler();
        double total = checkout.calculateTotal(order, new Customer("GOLD", "MyStreet 123, US"));
        System.out.println("Total price for goods: " + total);

//        DeliveryTimeWindow window = new DeliveryTimeWindow(now().plusDays(1), now().plusDays(2));
//        checkout.setDeliveryTimeWindow(window);

        //finals
        DeliveryTimeWindow window = DeliveryTimeWindow.deliveryTimeWindow().startInDays(1).endInDays(2);
        checkout.setDeliveryTimeWindow(window);

    }
}
