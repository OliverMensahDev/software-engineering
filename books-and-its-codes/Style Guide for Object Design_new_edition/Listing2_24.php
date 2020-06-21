<?php

// Bad approach because you cannot retreive other users apart from those in the session 
final class ContactRepository
{
    public function __construct(Session $session)
    {
        $this->session = $session;
    }
    public function getAllContacts(): array
    {
        return $this->select()
            ->where([
                'userId' => $this->session->getUserId(),
                'companyId' => $this->session->get('companyId')
            ])->getResult();
    }
}


//Better : Pass those as arguments.


final class ContactRepository
{
    public function __construct(Session $session)
    {
        $this->session = $session;
    }
    public function getAllContacts(UserId $userId, CompanyId $companyId): array
    {
        return $this->select()
            ->where([
                'userId' => $userId,
                'companyId' => $companyId
            ])->getResult();
    }
}
