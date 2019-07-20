package com.onlineshop;


import com.onlineshop.items.Item;

import java.math.BigDecimal;
import java.math.RoundingMode;
import java.time.LocalDate;
import java.util.List;

public class CheckoutHandler {

    private LocalDate deliveryWindowStart;
    private LocalDate deliveryWindowEnd;

    private double sumItemPrices(List<Item> items){
        double sum = 0;
        for(Item item: items){
            sum += sum + item.price();
        }
        return sum;
    }

    private double applyVoucher(String voucher, double price){
        // check if voucher is valid
        if(isValidVoucher(voucher)){
            price = BigDecimal.valueOf(price * 0.95).setScale(2, RoundingMode.HALF_EVEN).doubleValue();
        } else {
            System.out.println("Voucher invalid");
        }
        return price;
    }

    private boolean isValidVoucher(String voucher){
        return voucher.equals("GIMME_DISCOUNT") || voucher.equals("CHEAPER_PLEASE");
    }

    private double addDeliveryFee(String membership, String address, double price){
        // handle delivery fee
        if(isEligibleForFreeDelivery(membership)){
            // do nothing
        } else {
            if(isUSAddress(address)){
                System.out.println("Adding flat delivery fee of 5 USD");
                price = price + 5;
            } else {
                System.out.println("Adding flat global delivery fee of 10 USD");
                price = price + 10;
            }
        }
        return price;
    }
    private boolean isEligibleForFreeDelivery(String membership){
        return  membership.equalsIgnoreCase("GOLD");
    }

    private boolean isUSAddress(String address){
        return address.contains("US");
    }

    public double calculateTotal(List<Item> items, String voucher, String membership, String address){
        double baseTotal = sumItemPrices(items);
        baseTotal = applyVoucher(voucher, baseTotal);
        baseTotal = addDeliveryFee(membership, address, baseTotal);
        return baseTotal;
    }



    public void setDeliveryTimeWindow(LocalDate deliveryStart, LocalDate deliveryEnd){
        this.deliveryWindowStart = deliveryStart;
        this.deliveryWindowEnd = deliveryEnd;

        System.out.println(String.format("Your Order will delivered some time between %s and %s", deliveryWindowStart, deliveryWindowEnd));
    }

}
