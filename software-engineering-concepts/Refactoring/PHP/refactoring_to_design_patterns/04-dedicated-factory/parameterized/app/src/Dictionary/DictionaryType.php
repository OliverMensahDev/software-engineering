<?php

declare(strict_types=1);

namespace App\Dictionary;

use InvalidArgumentException;

final class DictionaryType
{
    private const GENERAL = "general";
    private const LEGAL   = "legal";
    private const MEDICAL = "medical";

    private string $type;

    public static function GENERAL(): self
    {
        return self::fromString(self::GENERAL);
    }

    public static function LEGAL(): self
    {
        return self::fromString(self::LEGAL);
    }

    public static function MEDICAL(): self
    {
        return self::fromString(self::MEDICAL);
    }


    private static function fromString(string $type): self
    {
        $self = new self();
        $self->type = $type;
        $self->protect();
        return $self;
    }

    private function protect()
    {
        if(!in_array($this->type, $this->allAsString(), true)){
            throw new InvalidArgumentException('Invalid Dictionary Type %s', $this->type);
        }
    }

    private function allAsString(): array
    {
        return [
            self::GENERAL,
            self::LEGAL,
            self::MEDICAL
        ];
    }

    public function toString(): string
    {
        return $this->type;
    }

    public function  equals(DictionaryType  $other) : bool
    {
        return $other === $this;
    }


}
