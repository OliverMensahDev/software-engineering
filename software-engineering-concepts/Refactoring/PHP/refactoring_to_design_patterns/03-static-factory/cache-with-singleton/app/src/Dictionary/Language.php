<?php
//
//declare(strict_types=1);
//
//namespace App\Dictionary;
//
//use MyCLabs\Enum\Enum;
//
//class Language extends Enum
//{
//  private const ENGLISH = "en";
//  private const SPANISH = "es";
//}


declare(strict_types=1);

namespace App\Dictionary;

use InvalidArgumentException;

final class Language
{
    const ENGLISH = 'en';
    const SPANISH = 'es';


    private string $type;

    public static function ENGLISH(): self
    {
        return self::fromString(self::ENGLISH);
    }

    public static function SPANISH(): self
    {
        return self::fromString(self::SPANISH);
    }

    public static function all(): array
    {
        return [
            self::ENGLISH(),
            self::SPANISH()
        ];
    }

    public static function allAsString(): array
    {
        return [
            self::ENGLISH,
            self::SPANISH,
        ];
    }

    public static function fromString(string $type): self
    {
        $self = new self();
        $self->type = $type;
        $self->protect();

        return $self;
    }

    public function toString(): string
    {
        return $this->type;
    }

    public function equals($other): bool
    {
        return $other == $this;
    }

    private function protect()
    {
        if (!in_array($this->type, $this->allAsString(), true)) {
            throw new InvalidArgumentException(sprintf('Invalid Language type %s', $this->type));
        }
    }

    private function __construct()
    {
    }
}

