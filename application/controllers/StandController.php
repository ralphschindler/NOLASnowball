<?php

class StandController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     */
    protected $doctrine;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var NOLASnowball\Entity\Repository\StandRepository
     */
    protected $standRepository;

    public function init()
    {
        $this->doctrine = Zend_Registry::get('doctrine');
        $this->entityManager = $this->doctrine->getEntityManager();
        $this->standRepository = $this->entityManager->getRepository('\NOLASnowball\Entity\Stand');
    }

    public function indexAction()
    {
        $this->_forward('list');
    }

    public function listAction()
    {
        $stands = $this->standRepository->findAll();
        $this->view->stands = $stands;
    }

    public function createAction()
    {
        $form = new Application_Form_Stand();
        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
            $stand = new \NOLASnowball\Entity\Stand();
    
            $this->_setEntityValues($stand, $form->getValues());
    
            $this->entityManager->persist($stand);
            $this->entityManager->flush();
    
            $this->_helper->flashMessenger->addMessage('Stand saved.');
            return $this->_redirect('/stand/list');
        }

        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');

        if ($id == null) {
            throw new Exception('Id must be provided for the delete action');
        }

        $stand = $this->standRepository->findOneBy(array('id' => $id));
        $this->entityManager->remove($stand);
        $this->entityManager->flush();

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
    
        $stand = $this->standRepository->findOneBy(array('id' => $id));

        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
    
            $this->_setEntityValues($stand, $form->getValues());
            $this->entityManager->persist($stand);
            $this->entityManager->flush();
    
            $this->_helper->flashMessenger->addMessage('Stand saved.');
            return $this->_redirect('/stand/list');
        }

        $form->setDefaultsFromEntity($stand); // pass values to form

        $this->view->form = $form;
    }

    protected function _setEntityValues(\NOLASnowball\Entity\Stand $stand, Array $values)
    {
        $stand->setName($values['name']);
        $stand->setAddress($values['address']);
        $stand->setCity($values['city']);
        $stand->setState($values['state']);
        $stand->setZipCode($values['zipCode']);
    }


}

