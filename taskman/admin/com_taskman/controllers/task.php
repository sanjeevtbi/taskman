<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
 
/**
 * Taskman Controller
 */
class TaskManControllerTask extends JControllerForm
{
	
function saveDate(){
  	$post = JRequest::get('post');
  	//print_r($post);
  //	exit;
  	$model= $this->getModel();
  	
  	$row = $model->getTable();
  	$row->load($post['task_id']);
  
  	$row->duedate = $post['duedate'];

  	$row->store();
  	
  	echo $post['duedate'];
  	exit;
  }
  
  function hello(){
  	
  	$post = JRequest::get('post');
  	//print_r($post);
  	//exit;
  	$model= $this->getModel();
  	 
  	$row = $model->getTable();
  	$row->load($post['task_id']);
  	//replace the db duedate row by POSTED value
  	$row->title = $post['title'];
  	//save the values
  	$row->store();
  	//display the date
  	echo $post['title'];
  	exit;
  }
  
  
}
