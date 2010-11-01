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

    public function createAction()
    {
        $form = new Application_Form_Stand();
        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
        	$standTable = new Application_Model_DbTable_Stand();
        	$standValues = $form->getValues();
        	unset($standValues['id']);
            $stand = $standTable->createRow($standValues);
            $stand->save();
            
            $this->_helper->flashMessenger->addMessage('Stand saved.');
            return $this->_redirect('/stand/list');
        }
        
        $this->view->form = $form;
    }

    public function listAction()
    {
    	$standTable = new Application_Model_DbTable_Stand();
        $this->view->stands = $standTable->fetchAll();
    }

    public function editAction()
    {
        $form = new Application_Form_Stand();
        
        $id = $this->getRequest()->getParam('id');
        if ($id == null) {
            throw new Exception('Id must be provided for the edit action');
        }
            
        $standTable = new Application_Model_DbTable_Stand();
        $stand = $standTable->find($id)->current();
        
        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
            $stand->setArray($form->getValues());
            $stand->save();
            $this->_helper->flashMessenger->addMessage('Stand saved.');
            return $this->_redirect('/stand/list');
        }
        
        $form->setDefaults($stand->toArray()); // pass values to form
        
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id == null) {
            throw new Exception('Id must be provided for the edit action');
        }
        
        $standTable = new Application_Model_DbTable_Stand();
        $stand = $standTable->find($id)->current();
        
        $stand->delete();
        $this->_helper->flashMessenger->addMessage('Stand deleted.');
        return $this->_redirect('/stand/list');
    }


}









