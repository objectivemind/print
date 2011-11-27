<?php

class Benson_Order {
    
    private $id;
    private $customerId;
    private $addressId;
    private $total;
    private $createDate;
    public $status;
    
    public function __construct($customerId, $addressId, $total, $date ,$status = 'inProgress', $id = null) {
        
        $this->customerId = $customerId;
        $this->addressId = $addressId;
        $this->total = $total;
        $this->createDate = $date;
        $this->status = $status;
        $this->id = $id;
    }
    
    public static function getInstance( $id ) {
        if($order = Benson_Db::getInstance()->fetchRow('SELECT * FROM orders WHERE id = ?',$id)) {
  
            return new Benson_Order(
                    $order['customerId'],
                    $order['addressId'],
                    $order['total'],
                    $order['createDate'],
                    $order['status'],
                    $order['id']);                  
        } else {
            return false;
        }
    }
    
    public function create() {
        $db = Benson_Db::getInstance();
        $order = get_object_vars($this);
        unset ($order['id']);
        $orderId = $db->insert('orders', $order);
        $this->id = $db->lastInsertId();
        return TRUE;
    }
    
    public function update() {
        $db = Benson_Db::getInstance();
        $order = get_object_vars($this);
        unset ($order['id']);
        if($db->update('orders', $order, "id = $this->id") == 1) {
            return TRUE;
        }
        return false;
    }
    
    public function getCustomerId() {
        return $this->customerId;
    }
    
    public function getAddressId() {
        return $this->addressId;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getTotal() {
        return $this->total;
    }
    
    public function getCreateDate() {
        return $this->createDate;
    }
    
}
?>
