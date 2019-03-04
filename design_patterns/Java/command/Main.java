package command;

import command.model.*;

public class Main {

    public static void main(String[] args) {

        // Create our receivers
        MarioCharacterReceiver mario = new MarioCharacterReceiver();
        mario.setName("Mario");

        KirbyCharacterReceiver kirby = new KirbyCharacterReceiver();
        kirby.setName("Kirby");


        //Create commands
        MarioUpCommand marioUpCommand = new MarioUpCommand(mario);
        MarioDownCommand marioDownCommand = new MarioDownCommand(mario);
        MarioLeftCommand marioLeftCommand = new MarioLeftCommand(mario);
        MarioRightCommand marioRightCommand = new MarioRightCommand(mario);

        KirbyUpCommand kirbyUpCommand = new KirbyUpCommand(kirby);
        KirbyDownCommand kirbyDownCommand = new KirbyDownCommand(kirby);
        KirbyLeftCommand kirbyLeftCommand = new KirbyLeftCommand(kirby);
        KirbyRightCommand kirbyRightCommand = new KirbyRightCommand(kirby);




        //Invoker
        GameBoy gameBoy = new GameBoy(marioUpCommand, marioDownCommand, marioLeftCommand, marioRightCommand);
        gameBoy.arrowDown();


        GameBoy gameBoy2 = new GameBoy(kirbyUpCommand, kirbyDownCommand, kirbyLeftCommand, kirbyRightCommand);
        gameBoy2.arrowDown();
        gameBoy2.arrowUp();
        gameBoy2.arrowLeft();
        gameBoy2.arrowRight();



    }
}
