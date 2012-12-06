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
	
  
  function stitle()
  {
  	
  	$app=JFactory::getApplication();
  	$task_id = $app->input->get('task_id');
  	$title = $app->input->get('title');
 
  	$model= $this->getModel();
  
  	$row = $model->getTable();
  	$row->load($task_id);
  	//replace the db duedate row by POSTED value
  	$row->title=$title;
  	//save the values
  	$row->store();
  	//display the date
  	echo $title;
  	exit;
  }
  
  function snotes()
  {
  	 
  	$app=JFactory::getApplication();
  	$task_id = $app->input->get('task_id');
  	$notes = $app->input->get('notes');
  
  	$model= $this->getModel();
  
  	$row = $model->getTable();
  	$row->load($task_id);
  	//replace the db duedate row by POSTED value
  	$row->notes=$notes;
  	//save the values
  	$row->store();
  	//display the date
  	echo $notes;
  	exit;
  }
  
  function sassignee()
  {
  
  	$app=JFactory::getApplication();
  	$task_id = $app->input->get('task_id');
  	$assignee = $app->input->get('assignee');
  
  	$model= $this->getModel();
  
  	$row = $model->getTable();
  	$row->load($task_id);
  	//replace the db duedate row by POSTED value
  	$row->assignee=$assignee;
  	//save the values
  	$row->store();
  	//display the date
  	echo $assignee;
  	exit;
  }
  
  function sfollowers()
  {
  
  	$app=JFactory::getApplication();
  	$task_id = $app->input->get('task_id');
  	$followers = $app->input->get('followers');
  
  	$model= $this->getModel();
  
  	$row = $model->getTable();
  	$row->load($task_id);
  	//replace the db duedate row by POSTED value
  	$row->followers=$followers;
  	//save the values
  	$row->store();
  	//display the date
  	echo $followers;
  	exit;
  }
  
  function stags()
  {
  
  	$app=JFactory::getApplication();
  	$task_id = $app->input->get('task_id');
  	$tags = $app->input->get('tags');
  
  	$model= $this->getModel();
  
  	$row = $model->getTable();
  	$row->load($task_id);
  	//replace the db duedate row by POSTED value
  	$row->tags=$tags;
  	//save the values
  	$row->store();
  	//display the date
  	echo $tags;
  	exit;
  }
  
  
  function saveDate()
  {
  
  	$app=JFactory::getApplication();
  	$task_id = $app->input->get('task_id');
  	$duedate = $app->input->get('duedate');
  
  	$model= $this->getModel();
  
  	$row = $model->getTable();
  	$row->load($task_id);
  	//replace the db duedate row by POSTED value
  	$row->duedate=$duedate;
  	//save the values
  	$row->store();
  	//display the date
  	echo $duedate;
  	exit;
  }
  
}
