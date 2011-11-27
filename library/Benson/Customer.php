<?php

class Benson_Customer {
    
    private $id;
    public $companyName;
    public $firstName;
    public $lastName;
    public $title;
    public $email;
    public $dob;
    public $phone1;
    public $phone2;


    public function __construct( $firstName, $lastName, $title, $email, $dob, $phone1, $phone2, $id = 0, $companyName = null) {
        
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->title = $title;
        $this->email = $email;
        $this->dob = $dob;
        $this->phone1 = $phone1;
        $this->phone2 = $phone2;
        $this->companyName = $companyName;
    }
    
    public static function getInstance( $id ) {
        if($cust = Benson_Db::getInstance()->fetchRow('SELECT * FROM customer WHERE id = ?',$id)) {
  
            return new Benson_Customer(
                    $cust['firstName'],
                    $cust['lastName'],
                    $cust['title'],
                    $cust['email'],
                    $cust['dob'],
                    $cust['phone1'],
                    $cust['phone2'],
                    $cust['id'],
                    $cust['companyName']
                    )
            ;
        } else {
            return false;
        }
    }
    
    public function create() {
        $customer = get_object_vars($this);    
        unset ($customer['id']);
        try {
            $db = Benson_Db::getInstance();
            if( $db->insert('customer', $customer)) {
                $this->id = $db->lastInsertId();
                return TRUE;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function update() {
        $customer = get_object_vars($this);    
        unset ($customer['id']);
        if(Benson_Db::getInstance()->update('customer', $customer, "id = $this->id")) {
            return TRUE;
        } 
        return FALSE;
    }
    
    public function getId() {
        return $this->id;
    }
    
}

?>
