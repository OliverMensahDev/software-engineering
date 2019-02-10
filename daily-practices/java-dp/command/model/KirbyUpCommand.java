package command.model;

import command.interfaces.Command;

public class KirbyUpCommand implements Command{

    private KirbyCharacterReceiver kirbyCharacterReceiver;

    public KirbyUpCommand(KirbyCharacterReceiver kirbyCharacterReceiver) {
        this.kirbyCharacterReceiver = kirbyCharacterReceiver;
    }

    @Override
    public void execute() {
        kirbyCharacterReceiver.moveUp();
    }
}
