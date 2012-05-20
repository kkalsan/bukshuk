<?php

class AdministratorController extends Controller
{
	
	function __construct($id,$module=null) {
       parent::__construct($id,$module=null);
       $this->layout='adminMain';		
	   $this->pageTitle='Welcome Admin';
	   Yii::app()->name='Welcome Admin';
   }	
   
   public function actionChecklogin()
   {
   	
      if(!Yii::app()->user->isGuest)
		{		
		
		if(Yii::app()->user->title=='admin')
		{
			$this->redirect(Yii::app()->request->baseUrl.'administrator/home');
			exit;
		}
		else
		{
			$this->redirect(Yii::app()->request->baseUrl.'administrator/invalid');
			exit;
		}
		}
	}	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{	
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(!Yii::app()->user->isGuest)
		{		
		
		if(Yii::app()->user->title=='admin')
		{
			$this->redirect('/administrator/home');
			exit;
		}
		else
		{
			$this->redirect('/administrator/invalid');
			exit;
		}
		}
		
		 $model = new AdminLogin;	
		 if(isset($_POST['AdminLogin']))
		{	 
		 $model->attributes=@$_POST['AdminLogin'];
    		if($model->validate())
        	{			
				$this->redirect('/administrator/home');
				exit;
			}
			else
			{
				$this->render('administrator',array('model'=>$model));	
			}
			
		}
	else	
	{		
		$this->render('administrator',array('model'=>$model));
	}
			
	}
	
	
	public function actionHome()
	{	
		//$this->checklogin();		
		$this->render('home');
		
	}
	
	public function actionInvalid()
	{
		$this->render('invalid');		
	}
	
	public function actionLogout()
	{	
		
		Yii::app()->user->logout();			
		$this->redirect('/administrator/');		
		exit;
		
	}
	
	public function actionAddbooks()
	{
		if(!Yii::app()->user->isGuest)
		{		
		
		if(Yii::app()->user->title=='admin')
		{
		$model = new AdminLogin;	
		 if(isset($_POST['AdminLogin']))
		{	 
		 $model->attributes=@$_POST['AdminLogin'];
    		if($model->validate())
        	{			
				$this->redirect('/administrator/home');
				exit;
			}
			else
			{
				$this->render('administrator',array('model'=>$model));	
			}
			
		}
			$this->render('addbooks');
			exit;
		}
		else
		{
			$this->redirect('/administrator/invalid');
			exit;
		}
		}
		
		
	}
	
}