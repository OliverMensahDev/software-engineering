<?php 
final class ContactRepository {
  private $session;
  public function __construct(Session $session){
    $this->session = $session;
  }
  public function getAllContacts(): array{
    return $this->select()
    ->where([
    'userId' => $this->session->getUserId(),
    'companyId' => $this->session->get('companyId')
    ])
    ->getResult();
  }
}