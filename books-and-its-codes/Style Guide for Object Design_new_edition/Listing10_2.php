<?
namespace Infrastructure\UserInterface\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ScheduleMeetupCommand extends Command
{
    protected function configure()
    {
        this
            .addArgument('title', InputArgument.REQUIRED)
            .addArgument('date', InputArgument.REQUIRED)
            // ...
        ;
    }

    public function execute(
        InputInterface input,
        OutputInterface output
    ) {
        title = input.getArgument('title');
        date = input.getArgument('date');

        // ...

        output.writeln('Meetup scheduled');
    }
}