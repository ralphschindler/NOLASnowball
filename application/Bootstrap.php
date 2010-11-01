<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }
    
    protected function _initAuth()
    {
        $this->bootstrap('session');
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $view = $this->getResource('view');
            $view->user = $auth->getIdentity();
        }
        return $auth;
    }
    
    protected function _initFlashMessenger()
    {
        /** @var $flashMessenger Zend_Controller_Action_Helper_FlashMessenger */
        $flashMessenger = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
        if ($flashMessenger->hasMessages()) {
            $view = $this->getResource('view');
            $view->messages = $flashMessenger->getMessages();
        }
    }

}
