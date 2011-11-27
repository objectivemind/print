<?php

class Benson_Db {
    
    public static function getInstance() {
        
        $db = Zend_Db::factory('Pdo_Pgsql', array(
            'host'     => '127.0.0.1',
            'username' => 'steven',
            'password' => 'trumaster88',
            'dbname'   => 'steven'
        ));
        
        return $db;
    }
    
}


?>
