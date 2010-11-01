<?php

class Application_Model_AuthenticationService
{

    /**
     * @return Zend_Auth_Result
     */
    public function authenticate(Zend_Auth $auth, $username, $password, $persistIfSuccessful = true)
    {
        $adapter = new Zend_Auth_Adapter_DbTable(
            Zend_Db_Table_Abstract::getDefaultAdapter(), 
            'user', 
            'username', 
            'user_credential.value'
            );

        $adapterSelect = $adapter->getDbSelect()
            ->join('user_credential', 'user_credential.user_id = user.id')
            ->where('user_credential.type = "PASSWORD"');
            
        $adapter->setIdentity($username)
            ->setCredential(md5($password)); // SQLite has no internal md5() function
            
        $authResult = $auth->authenticate($adapter);
        
        if (!$authResult->isValid() || $persistIfSuccessful == false) {
            return $authResult;
        }
        
        $userInfo = $adapter->getResultRowObject(array('id', 'username'));
        
        $userTable = new Application_Model_DbTable_User();
        $user = $userTable->find($userInfo->id)->current();
        
        // Store all user details except password in authentication session
        $auth->getStorage()->write($user);
        return $authResult;
    }

}

