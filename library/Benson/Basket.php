<?php

class Benson_Basket {
    
    private $session;
    

    public function __construct() {
        $this->session = new Zend_Session_Namespace('basket');
    }
    
    
    public function addProduct(Benson_Product $product, $qty ) {
        $productId = $product->getId();
        $totalPrice = $product->getPrice() * $qty;
        $this->session->products[$productId] = array($product,'qty' => $qty,'unitPrice' => $product->getPrice(),'totalPrice' => $totalPrice);
        //return $this->products;
    }
    
    public function delProduct( $id  ){
        //foreach($this->products as $productId => $product) {
          //  if($products);
        //}
        unset ($this->session->products[$id]);
    }
    
    public function getBasket() {
        $this->total = 0;
        if(count( $this->session->products) > 0) {
            foreach($this->session->products as $key => $value) {
                $this->total += $value['totalPrice']; 
            }
            $this->session->total = $this->total;
            
            return $this->session;
        }
        return FALSE;
    }
    
    public function getTotal() {
        return $this->session->total;
    }
    
    public function updateQty( $id, $qty ) {
        if($qty == 0) {
            unset ($this->session->products[$id]);
            
        } else {
            $this->session->products[$id]['qty'] = $qty;
            $this->session->products[$id]['totalPrice'] = $this->session->products[$id]['unitPrice'] * $qty;
        }
    }
    
    public function emptyBasket() {
        unset ($this->session->products);
    }
    
}

?>
