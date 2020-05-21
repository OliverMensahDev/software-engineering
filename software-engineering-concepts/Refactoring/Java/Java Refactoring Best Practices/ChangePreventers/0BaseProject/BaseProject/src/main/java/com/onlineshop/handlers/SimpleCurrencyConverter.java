package com.onlineshop.handlers;

import java.io.IOException;
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;

import static java.net.http.HttpClient.newBuilder;

public class SimpleCurrencyConverter {

    private String currencyTo;

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

        String rates = getCurrencyRates("USD");
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

    public String getCurrencyRates(String baseCurrency){
        HttpClient httpClient = newBuilder().build();
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create("https://api.exchangeratesapi.io/latest?base=" + baseCurrency))
                .build();

        HttpResponse<String> response = null;
        try {
            response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());
        } catch (IOException | InterruptedException e) {
            e.printStackTrace();
        }
        return response.body();
    }


}
