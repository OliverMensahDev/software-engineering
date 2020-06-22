<?
final class Importer
{
    private ImportNotifications notify;

    public function __construct(ImportNotifications notify)
    {
        this.notify = notify;
    }
    public function import(string csvDirectory): void
    {
        foreach (Finder.in(csvDirectory).files() as file) {
            // Read the file
            lines = /* ... */;

            foreach (lines as index => line) {
                if (index == 0) {
                    // Parse the header
                    header = /* ... */;

                    this.notify.whenHeaderImported(
                        file,
                        header
                    )
                }
                else {
                    data = /* ... */;

                    this.notify.whenLineImported(file, index);
                }
            }

            this.notify.whenFileImported(file);
        }
    }
}