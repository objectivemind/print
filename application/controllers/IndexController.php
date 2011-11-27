<?php

class IndexController extends Zend_Controller_Action
{

    private $session;
    
    public function init()
    {
        $this->session = new Zend_Session_Namespace('basket');
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        echo "<pre>";
        $db = Benson_Db::getInstance();
        $result['test']['standard'] = $db->fetchAll('SELECT * FROM flyer_standard_250gsm WHERE qty > 100 limit 15');
        $result['test']['gloss'] = $db->fetchAll('SELECT * FROM flyer_gloss_2_250gsm WHERE qty > 100  limit 15');
        $result['test']['matt'] = $db->fetchAll('SELECT * FROM flyer_matt_2_250gsm WHERE qty > 100  limit 15');
        $this->view->data = json_encode($result);
        
//$cust = new Benson_Customer('Steven', 'Benson', 'Mr', 'steven@objectiveminds.net', '1978-10-12', '02082891897', '07877952328');
        
        //$product = new Benson_Product('0.60m x 3m', 'Avery', 'PVC Vinyl', '520gsm High quality all year material-Super strong vinyl-Suitable for outdoors and indoors ', '45.00', 1, 1, 1);
        //$product = Benson_Product::getInstance(3);
        //$basket = new Benson_Basket();
        //echo "<pre>";
        //var_dump($basket->getBasket());
        //$basket->addProduct($product, 1);
        
        //$order = new Benson_Order(26, 1, 45, 'inProgress');
        //echo ($order->create());
        
     }
        
        
}

