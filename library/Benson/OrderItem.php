<?php

class Benson_OrderItem {
    
    private $orderId;
    private $productObj;   // Benson_Product object; 
    public $qty;
    private $unitPrice;
    private $id;
    private $totalPrice;
    
    public function __construct($orderId, Benson_Product $product, $qty, $unitPrice, $totalPrice, $id = NULL) {
        $this->orderId = $orderId;
        $this->productObj = $product;
        $this->qty =$qty;
        $this->unitPrice = $unitPrice;
        $this->totalPrice = $totalPrice;
        $this->id = $id;
    }
    
    public static function getOrderItems( $orderId ) {
        
        $order_items = Benson_Db::getInstance()->fetchAll('SELECT * FROM order_item WHERE orderId = ?', $orderId);
        
        foreach ($order_items as $item) {
            $orderItem[$item['id']] = new Benson_OrderItem(
                                    $orderId,
                                    Benson_Product::getInstance($item['productId']),
                                    $item['quantity'],
                                    $item['unitPrice'],
                                    $item['totalPrice'],
                                    $item['id']);
         }
         
         return $orderItem;
    }
    
    public function create() {
        $orderItem = array(
            'orderId' => $this->orderId,
            'productId' => $this->productObj->getId(),
            'quantity' => $this->qty,
            'unitPrice' => $this->unitPrice,
            'totalPrice' => $this->totalPrice
        );
        try {
            if( Benson_Db::getInstance()->insert('order_item', $orderItem)) {
            return TRUE;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>
