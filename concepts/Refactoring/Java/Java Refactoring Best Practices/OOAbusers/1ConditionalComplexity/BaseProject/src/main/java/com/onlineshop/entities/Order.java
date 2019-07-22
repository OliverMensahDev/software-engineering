package com.onlineshop.entities;

import com.onlineshop.country.Canada;
import com.onlineshop.country.Country;
import com.onlineshop.items.Item;

import java.util.ArrayList;
import java.util.List;

public class Order {

    private Customer customer;
    private List<Item> items;
    private String voucher;

    public Order(){
        items = new ArrayList<>();
    }

    public int size() {
        return items.size();
    }

    public Order(Customer customer){
        items = new ArrayList<>();
        this.customer = customer;
    }

    public Order(List<Item> items, String voucher){
        this.items = items;
        this.voucher = voucher;
    }

    /**
     * Simple.. if sold only in the US
     */
    public boolean add(Item item){
        if(item.isAgeRestrictedBeverage()){
            if(customer.getAge() < 21) {
                System.out.println("Cannot add age restricted item to order");
                return false;
            }
        }
        return items.add(item);
    }


    public boolean addWithCheck(Item item){
        if(item.isAgeRestrictedBeverage()){
            if(customer.getAge() < getLegalAgeFor(customer)){
                System.out.println("Sorry!");
                return false;
            }
        }

        return items.add(item);
    }


    private int getLegalAgeFor(Customer customer) {
        Country country = customer.getAddress().getCountry();

        if(country instanceof Canada){
            Canada canada = (Canada) country;
            return canada.getLegalDrinkingAge(customer.getAddress().getProvince());
        }


        return country.getMinimumLegalDrinkingAge();
    }



    public List<Item> getItems() {
        return items;
    }

    public void setItems(List<Item> items) {
        this.items = items;
    }

    public String getVoucher() {
        return voucher;
    }

    public void setVoucher(String voucher) {
        this.voucher = voucher;
    }

    public Customer getCustomer() {
        return customer;
    }

    public void setCustomer(Customer customer) {
        this.customer = customer;
    }
}
