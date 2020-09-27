<?php 
namespace App;


final class Membership
{
    private MembershipId   $id;

    private MembershipGuid $guid;

    public static function create(MembershipId $id, MembershipGuid $guid): self
    {
        $self       = new self();
        $self->id   = $id;
        $self->guid = $guid;

        return $self;
    }

    public function id(): MembershipId
    {
        return $this->id;
    }

    public function guid(): MembershipGuid
    {
        return $this->guid;
    }

    private function __construct()
    {
    }
}