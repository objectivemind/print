<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function initSession() {
        
        new Zend_Session_Namespace('basket');
    }
}

