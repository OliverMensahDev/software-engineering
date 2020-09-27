<?php

use App\Membership;
use App\MembershipGuid;
use App\MembershipId;
use App\Memberships;

$loader = require 'vendor/autoload.php';

$memberships = Memberships::fromArray(
  [
    Membership::create(
      MembershipId::fromInteger(1),
      MembershipGuid::undefined()
    ),
  ]
);

foreach ($memberships->getIterator() as $membership) {
  echo $membership->guid()->toString();
}
