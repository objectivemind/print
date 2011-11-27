<?php

class Benson_Payment {
    private $id;
    private $customerId;
    private $orderId;
    private $status;
    private $type;
    private $total;
    protected $transactionId = null;
    protected $date = null;


    public function __construct( $customerId, $orderId, $total, $status, $type ) {
        ;
    }
}
?>
