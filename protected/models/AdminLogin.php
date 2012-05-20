<?php
class AdminLogin extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe=false;
 
    private $_identity;
 
    public function rules()
    {
        return array(
            array('username, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    }
 
    public function authenticate($attribute,$params)
    {		
        $this->_identity=new UserIdentity($this->username,$this->password);
        if(!$this->_identity->authenticate())
            $this->addError('password','Incorrect username or password.');
			else
			Yii::app()->user->login($this->_identity);
    }
}
?>