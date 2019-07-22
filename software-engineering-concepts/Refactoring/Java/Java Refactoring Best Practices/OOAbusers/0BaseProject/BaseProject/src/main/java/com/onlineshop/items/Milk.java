package com.onlineshop.items;

public class Milk extends Item {

    @Override
    public double price() {
        return 1;
    }

    @Override
    public boolean isAgeRestrictedBeverage() {
        return false;
    }
}
