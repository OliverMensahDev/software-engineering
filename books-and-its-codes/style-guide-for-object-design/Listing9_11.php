<?
final class ChangeUserPassword
{
    private PasswordEncoder passwordEncoder;

    public function __construct(
        PasswordEncoder passwordEncoder,
        /* ... */
    ) {
        // ...
    }

    public function changeUserPassword(
        UserId userId,
        string plainTextPassword
    ): void {
        encodedPassword = this.passwordEncoder.encode(
            plainTextPassword
        );

        // Store the new password...
    }
}