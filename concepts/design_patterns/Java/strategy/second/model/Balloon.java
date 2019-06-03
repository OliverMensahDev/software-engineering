package strategy.second.model;


import strategy.second.controller.ScoreAlgorithmBase;

public class Balloon extends ScoreAlgorithmBase{
    @Override
    public int calculateScore(int taps, int multiplier) {
        return (taps * multiplier) - 20;
    }
}
