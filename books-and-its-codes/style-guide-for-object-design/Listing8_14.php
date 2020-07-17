<?
final class UpdateStockReport
{
    public function whenPurchaseOrderReceived(
        PurchaseOrderReceived event
    ): void {
        this.connection.transactional(function () {
            try {
                this.connection
                    .prepare(
                        'SELECT quantity_in_stock ' .
                        'FROM stock_report ' .
                        'WHERE product_id = :productId FOR UPDATE'
                    )
                    .bindValue('productId', event.productId())
                    .execute()
                    .fetch();

                this.connection
                    .prepare(
                        'UPDATE stock_report ' .
                        'SET quantity_in_stock = ' .
                        ' quantity_in_stock + :quantityReceived ' .
                        'WHERE product_id = :productId'
                    )
                    .bindValue(
                        'productId',
                        event.productId()
                    )
                    .bindValue(
                        'quantityReceived',
                        event.quantityReceived()
                    )
                    .execute();
            } catch (NoResult exception) {
                 this.connection
                    .prepare(
                        'INSERT INTO stock_report ' .
                        ' (product_id, quantity_in_stock) ' .
                        'VALUES (:productId, :quantityInStock)'
                    )
                    .bindValue(
                        'productId',
                        event.productId()
                    )
                    .bindValue(
                        'quantityInStock',
                        event.quantityReceived()
                    )
                    .execute();
            }
        });
    }
}