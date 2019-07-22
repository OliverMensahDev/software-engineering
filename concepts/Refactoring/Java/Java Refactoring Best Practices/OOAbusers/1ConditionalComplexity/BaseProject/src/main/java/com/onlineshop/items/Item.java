package com.onlineshop.items;

public abstract class Item {

    public abstract double price();

    public abstract boolean isAgeRestrictedBeverage();

    @Override
    public String toString(){
        return this.getClass().getSimpleName();
    }
}
