<?php

declare(strict_types=1);

namespace App;

use ArrayIterator;
use Assert\Assertion;
use Countable;
use IteratorAggregate;

final class Memberships implements IteratorAggregate, Countable
{
    /**
     * @var Membership[]
     */
    private array $memberships;

    /**
     * @param Membership[] $memberships
     *
     * @return static
     */
    public static function fromArray(array $memberships): self
    {
        Assertion::allIsInstanceOf($memberships, Membership::class);

        $self              = new self();
        $self->memberships = $memberships;

        return $self;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->memberships);
    }

    public function count(): int
    {
        return count($this->memberships);
    }

    public function first(): ?Membership
    {
        if ($this->count() === 0) {
            return null;
        }

        return $this->memberships[0];
    }

    private function __construct()
    {
    }
}
