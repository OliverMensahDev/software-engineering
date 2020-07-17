<?php
//first client of the entity
final class ReceiveItems
{
  private $repository;

  public function __construct(PurchaseOrderRepository $repository)
  {
    $this->repository = $repository;
  }

  public function receiveItems(int $purchaseOrderId): void
  {
    $purchaseOrder = $this->repository->getById($purchaseOrderId);
    $purchaseOrder->markAsReceived();
    $this->repository->save($purchaseOrder);
  }
}
