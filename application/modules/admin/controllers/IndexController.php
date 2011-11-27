<?php

class Admin_IndexController extends Zend_Controller_Action
{
    
    public $cookie_path;
    public $cookie_file;
    public $curl_result;
    
    public function init()
    {
        $this->_helper->layout->disableLayout();
        //$this->cookie_path = getcwd();
	$this->cookie_file = '/tmp/up.txt';
    }

    public function indexAction()
    {
        /*
        //print_r($file2);
        echo "<pre>";
        
        $basket = new Benson_Basket();
        $basket->addProduct(Benson_Product::getInstance(5), 2);
        $basket->addProduct(Benson_Product::getInstance(4), 10);
        
        
        $customer = new Benson_Customer('Samantha', 'Driscoll', 'Ms', 'sami83@hotmail.com', '1968-07-26', '07810433578', '02083549820', null, 'Schroders');
        $customer->save();
        $address = new Benson_Address($customer->getId(), '19A Cambridge Road', 'Bromley', '', 'Kent', 'br3 5er');
        $address->save();
        
        $date = date('Y-m-d');
        $order = new Benson_Order($customer->getId(), $address->getId(), $basket->getTotal(), $date);
        $order->save();
        foreach( $basket->getBasket()->products as $item ) {
            $orderItem = new Benson_OrderItem($order->getId(), $item[0], $item['qty'], $item['unitPrice'], $item['totalPrice']);
            $orderItem->save();
        }
        
        
        $obj = new stdClass();
        $obj->order = Benson_Order::getInstance(14);
        $obj->customer = Benson_Customer::getInstance($obj->order->getCustomerId());
        $obj->address = Benson_Address::getInstance($obj->order->getAddressId());
        $obj->orderItems = Benson_OrderItem::getOrderItems($obj->order->getId());
        print_r($obj);        
        */
    }


}

