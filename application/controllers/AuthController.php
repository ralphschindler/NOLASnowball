<?php

class AuthController extends Zend_Controller_Action
{

    /**
     * @var Zend_Auth
     */
    protected $_auth = null;

    public function init()
    {
        $this->_loginForm = new Application_Form_Login();
        $this->view->form = $this->_loginForm;
        
        // get auth service from bootstrap
        $bootstrap = $this->getInvokeArg('bootstrap');
        $this->_auth = $bootstrap->getResource('auth');
    }

    public function indexAction()
    {
        $this->_forward('login');
    }

    public function loginAction()
    {
        $request = $this->getRequest();
        if ($request->isPost() && $this->_loginForm->isValid($request->getPost())) {
            
            // Authenticate user
            $username = $this->_loginForm->getValue('username'); 
            $password = $this->_loginForm->getUnfilteredValue('password');
            
            $flashMessenger = $this->getHelper('FlashMessenger');
            
            $authService = new Application_Model_AuthenticationService();
            
            $result = $authService->authenticate($this->_auth, $username, $password);
            
            if ($result->isValid()) {
                $flashMessenger->addMessage('Login successful');
                $this->_redirect('/');
            } else {
                $errorMessage = current($result->getMessages());
                $flashMessenger->addMessage($errorMessage);
                $this->_redirect('/auth/login');
            }
            
            return;
        }
    }

    public function logoutAction()
    {
        // action body
    }

}
