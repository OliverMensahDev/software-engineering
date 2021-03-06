package com.onlineshop.handlers;


import com.onlineshop.entities.DeliveryTimeWindow;
import com.onlineshop.entities.Order;
import com.onlineshop.items.Item;

import java.time.LocalDate;
import java.util.List;

import static java.lang.String.format;

public class CheckoutHandler {

    private LocalDate deliveryWindowStart;
    private LocalDate deliveryWindowEnd;



    private DiscountManager discountManager = new DiscountManager();
    private DeliveryManager deliveryManager = new DeliveryManager();

    public double convertToCurrency(double price, String currencyTo){
        if(currencyTo.equalsIgnoreCase("EUR")) {
            return price * 0.9;
        }else if(currencyTo.equalsIgnoreCase("CAD")){
            return price * 1.35;
        }else {
            throw new IllegalArgumentException("Unrecognized currency: "+  currencyTo);
        }
    }

    public double calculateTotal(Order order){

        double baseTotal = sumItemPrices(order.getItems());

        baseTotal = discountManager.applyVoucher(order.getVoucher(), baseTotal);

        baseTotal = deliveryManager.addDeliveryFee(order.getCustomer(), baseTotal);

        return baseTotal;
    }



    private double sumItemPrices(List<Item> items) {
        double sum = 0;
        for(Item item : items){
            sum = sum + item.price();
        }
        return sum;
    }


    public void setDeliveryTimeWindow(LocalDate deliveryStart, LocalDate deliveryEnd){
        this.deliveryWindowStart = deliveryStart;
        this.deliveryWindowEnd = deliveryEnd;

        System.out.println(format("Your Order will delivered some time between %s and %s",                                                      deliveryWindowStart, deliveryWindowEnd));
    }


    public void setDeliveryTimeWindow(DeliveryTimeWindow window){

        System.out.println(format("Your Order will delivered some time between %s and %s", window.getStart(), window.getEnd()));
    }
}
