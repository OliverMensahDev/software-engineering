<?php

namespace App;

final class MembershipId
{
    /**
     * @var int
     */
    private $id;

    public static function fromInteger(int $id): self
    {
        $id = new self($id);

        return $id;
    }

    public function equals($other): bool
    {
        return $other == $this;
    }

    public function toInteger(): int
    {
        return $this->id;
    }

    private function setId($id)
    {
        if (is_string($id) && ctype_digit($id)) {
            $id = (int) $id;
        }

        if (!is_int($id)) {
            throw new \InvalidArgumentException('Must be an positive integral number');
        }

        if ($id <= 0) {
            throw new \InvalidArgumentException('Must be an positive integral number');
        }

        $this->id = $id;
    }

    /**
     * @param int $id
     * @deprecated
     */
    public function __construct($id)
    {
        $this->setId($id);
    }
}
