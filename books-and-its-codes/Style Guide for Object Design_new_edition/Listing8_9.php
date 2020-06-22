<?php 
public function execute(Request request): Response
{
    allPurchaseOrders = this.repository.findAll();
 
    forStockReport = array_map(
        function (PurchaseOrder purchaseOrder) {
            return purchaseOrder.forStockReport();
        },
        allPurchaseOrders
    );

    // ...
}

