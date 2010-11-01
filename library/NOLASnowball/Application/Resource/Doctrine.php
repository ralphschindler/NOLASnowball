<?php
class NOLASnowball_Application_Resource_Doctrine extends Zend_Application_Resource_ResourceAbstract
{
    public function init()
    {
        //pull in options from config file
        $options = $this->getOptions();
        
        //require doctrine core
        require_once 'Doctrine/Core.php';
        
        //setup autoloading for doctrine core and models
        $loader = Zend_Loader_Autoloader::getInstance();
        $loader->pushAutoLoader(array('Doctrine_Core', 'autoload'));
        $loader->pushAutoLoader(array('Doctrine_Core', 'modelsAutoLoad'));
        
        //tell doctrine to load the models but load them conservatively
        $manager = Doctrine_Manager::getInstance();
        $manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, Doctrine_Core::MODEL_LOADING_CONSERVATIVE);
        $manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
        Doctrine_Core::loadModels($options["modelPath"]);
        
        $manager->openConnection($options["connectionString"], 'db');
        
        //return doctrine manager as the resource that was bootstrapped
        return $manager;
    }
}