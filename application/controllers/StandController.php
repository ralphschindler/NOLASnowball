<?php

class StandController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_forward('list');
    }

    public function listAction()
    {
        $this->view->stands = Doctrine_Query::create()->from('Stand s')->execute();
    }

    public function createAction()
    {
        $form = new Application_Form_Stand();
        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
            $stand = new Stand();
            $stand->setArray($form->getValues());
            $stand->save();
            
            $this->_helper->flashMessenger->addMessage('Stand saved.');
            return $this->_redirect('/stand/list');
        }
        
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id == null) {
            throw new Exception('Id must be provided for the edit action');
        }
        
        $stand = Doctrine_Query::create()->from('Stand s')->where('s.id = ?', $id)->fetchOne();
        
        $stand->delete();
        $this->_helper->flashMessenger->addMessage('Stand deleted.');
        return $this->_redirect('/stand/list');
    }

    public function editAction()
    {
        $form = new Application_Form_Stand();
        
        $id = $this->getRequest()->getParam('id');
        if ($id == null) {
            throw new Exception('Id must be provided for the edit action');
        }
            
        $stand = Doctrine_Query::create()->from('Stand s')->where('s.id = ?', $id)->fetchOne();
        
        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
            $stand->setArray($form->getValues());
            $stand->save();
            $this->_helper->flashMessenger->addMessage('Stand saved.');
            return $this->_redirect('/stand/list');
        }
        
        $form->setDefaults($stand->toArray()); // pass values to form
        
        $this->view->form = $form;
    }


}









