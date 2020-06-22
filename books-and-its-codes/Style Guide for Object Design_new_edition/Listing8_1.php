<?
interface PurchaseOrderRepository
{
    /**
     * @throws CouldNotSavePurchaseOrder
     */
    public function save(PurchaseOrder purchaseOrder): void;

    /**
     * @throws CouldNotFindPurchaseOrder
     */
    public function getById(int purchaseOrderId): PurchaseOrder;
}