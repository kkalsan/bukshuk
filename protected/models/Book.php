<?php
class Book extends CFormModel
{
    public $title;
    public $total_in_store;     
    
    public function rules()
    {
        return array(
            array('book_title, total_number', 'required'),           
        );
    }
 
    public function addbooksnow($attribute,$params)
    {		
        $this->_identity=new UserIdentity($this->username,$this->password);
        if(!$this->_identity->authenticate())
            $this->addError('password','Incorrect username or password.');
			else
			Yii::app()->user->login($this->_identity);
    }
}
?>