<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
 
/**
 * HelloWorld Controller
 */
class TaskManControllerTask extends JControllerForm
{
	
  function saveDate(){
  	$post = JRequest::get('post');
  	
  	$model= $this->getModel();
  	
  	$row = $model->getTable();
  	$row->load($post['task_id']);
  
  	$row->duedate = $post['duedate'];

  	$row->store();
  	
  	echo $post['duedate'];
  	exit;
  }
}
