package com.pluralsight.calcengine;

/**
 * Created by Jim on 11/16/2015.
 */
public interface MathProcessing {
    String SEPARATOR = " ";
    String getKeyword(); // add
    char getSymbol(); // +
    double doCalculation(double leftVal, double rightVal);
}
