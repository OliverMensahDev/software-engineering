package com.onlineshop.handlers;

import java.io.IOException;
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;

import static java.net.http.HttpClient.newBuilder;

public class SimpleCurrencyConverter {

    private HttpHelper httpHelper = new HttpHelper();
    private String currencyTo;

    public SimpleCurrencyConverter(){}


    public SimpleCurrencyConverter(String currencyTo){
        this.currencyTo = currencyTo;
    }

    public double convert(double price){
        if(currencyTo.equalsIgnoreCase("EUR")){
            return price * 0.9;
        } else if (currencyTo.equalsIgnoreCase("CAD")){
            return price* 1.35;
        } else {
            throw new IllegalArgumentException("Unrecognized currency : " + currencyTo);
        }
    }

    public double convertWithWebService(double price){

        String rates = httpHelper.getCurrencyRates("USD");
        if(currencyTo.equalsIgnoreCase("EUR")){
            return price * getRate(rates, "EUR");

        } else if (currencyTo.equalsIgnoreCase("CAD")){
            return price * getRate(rates, "CAD");
        } else {
            throw new IllegalArgumentException("Unrecognized currency : " + currencyTo);
        }
    }


    private double getRate(String rates, String currencyTo) {
        return Double.valueOf(rates.substring(rates.lastIndexOf(currencyTo)).substring(5,9));
    }



    // NEW REQUIREMENT TO PRINT RATE
    public void printUSDRate(String  currencyTo){
        String rates = httpHelper.getCurrencyRates("USD");
        System.out.println(getRate(rates, currencyTo));
    }


}
