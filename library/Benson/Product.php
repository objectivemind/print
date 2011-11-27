<?php

class Benson_Product {
    
    private $id;
    private $price;
    private $status;
    private $discount;
    
    public $material;
    public $manufacturer;
    public $name;
    public $description;
    public $productGroupId;
    
    public function __construct( $name, $manufacturer, $material, $description, $price, $status, $productGroupId, $discount, $id = NULL ) {
        
        $this->id = $id;
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->description = $description;
        $this->price = $price;
        $this->status = $status;
        $this->productGroupId = $productGroupId;
        $this->discount = $discount;
        $this->material = $material;
    }
    
    public static function getInstance( $id ) {
        if($product = Benson_Db::getInstance()->fetchRow('SELECT * FROM product WHERE id = ?',$id)) {
  
            return new Benson_Product(
                    $product['name'], 
                    $product['manufacturer'],
                    $product['material'],
                    $product['description'], 
                    $product['price'], 
                    $product['status'], 
                    $product['productGroupId'],
                    $product['discount'],
                    $product['id']
                   );                    
        } else {
            return false;
        }
    }
    
    public function create() {
        $product = get_object_vars($this);    
        unset ($product['id']);
        try {
            if( Benson_Db::getInstance()->insert('product', $product)) {
            return TRUE;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function update() {
        $product = get_object_vars($this);    
        unset ($product['id']);
        if(Benson_Db::getInstance()->update('product', $product, "id = $this->id")) {
            return TRUE;
        } 
        return FALSE;
    }
    
    public static function getProductByGroupId( $id ) {
        if($products = Benson_Db::getInstance()->fetchAll('SELECT * FROM product WHERE productGroupId =?', $id)) {
            return $products;
        } 
        return FALSE;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getPrice() {
        return $this->price * 1.20;
    }
    
    public function getStatus() {
        return $this->status;
    }
    
    public function setStatus( $status ) {
        $this->status = $status;
    }
}
?>
