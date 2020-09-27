<?php

namespace App;

final class MembershipGuid
{
  const UNDEFINED_GUID = '00000000-0000-0000-0000-000000000000';

  /**
   * @var string
   */
  private $guid;

  public static function fromString(string $guid): self
  {
    $membershipGuid = new self($guid);

    return $membershipGuid;
  }

  /**
   * @return MembershipGuid
   */
  public static function undefined()
  {
    return new self(self::UNDEFINED_GUID);
  }

  /**
   * return bool
   */
  public function isUndefined()
  {
    return ($this->guid === self::UNDEFINED_GUID);
  }

  /**
   * @param mixed $other
   *
   * @return bool
   */
  public function equals($other)
  {
    return $other == $this;
  }

  /**
   * @return string
   */
  public function toString()
  {
    return $this->guid;
  }

  /**
   * @return string
   */
  public function __toString()
  {
    return $this->toString();
  }

  private function protect()
  {
    if (!preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/', $this->guid)) {
      throw new \InvalidArgumentException(sprintf('"%s" is not a valid membership GUID', $this->guid));
    }
  }

  /**
   * @param string $guid
   * @deprecated
   */
  public function __construct($guid)
  {
    $this->guid = strtoupper($guid);

    $this->protect();
  }
}
