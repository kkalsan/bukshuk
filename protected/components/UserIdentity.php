<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 private $_id;

	public function authenticate()
	{
		$row = Yii::app()->db->createCommand(array(
    'select' => array('user_name', 'password'),
    'from' => 'tbl_admin_master',
    'where' => 'user_name=:user_name',
    'params' => array(':user_name'=>$this->username),
))->queryRow();
		
        if($row===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($row['password']!==($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id='admin';
            $this->setState('title', 'admin');
            $this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}
	
	public function getId()
    {
        return $this->_id;
    }

}