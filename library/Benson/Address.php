<?php

class Benson_Address {
    
    private $id;

    public $address1;
    public $address2;
    public $address3;
    public $county;
    public $postcode;
    public $customerId;
    
    public function __construct( $customerId, $address1, $address2, $address3, $county, $postcode, $id = NULL ) {
        $this->customerId = $customerId;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->county = $county;
        $this->postcode = $postcode;
        $this->id = $id;
    }
    
    public static function getInstance( $id ) {
        if($addr = Benson_Db::getInstance()->fetchRow('SELECT * FROM address WHERE id = ? AND isDefault = ?',array($id,1))) {
  
            return new Benson_Address(
                    $addr['customerId'],
                    $addr['address1'],
                    $addr['address2'],
                    $addr['address3'],
                    $addr['county'],
                    $addr['postcode'],
                    $addr['id']
                   );
        } else {
            return false;
        }
    }
    
    public function create() {
        $address = get_object_vars($this);    
        unset ($address['id']);
        try {
            $db = Benson_Db::getInstance();
            if( $db->insert('address', $address)) {
                $this->id = $db->lastInsertId();
            return TRUE;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function update() {
        $address = get_object_vars($this);    
        unset ($address['id']);
        if(Benson_Db::getInstance()->update('address', $address, "id = $this->id")) {
            return TRUE;
        } 
        return FALSE;
    }
    
    public function getId() {
        return $this->id;
    }
}

?>
