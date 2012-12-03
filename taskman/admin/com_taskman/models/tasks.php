<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class TaskManModelTasks extends JModelList
{
  protected function populateState($ordering = null, $direction = null)
	{
	   $app = JFactory::getApplication('administrator');

		// Load the filter state.
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);


		$published = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
		$this->setState('filter.state', $published);

		$order = $this->getUserStateFromRequest($this->context.'.filter.listorder', 'filter_order');
		$this->setState('list.ordering', $order);
		
		$dir = $this->getUserStateFromRequest($this->context.'.filter.listdir', 'filter_order_Dir');
		$this->setState('list.direction', $dir);
		
		// List state information.
		parent::populateState($ordering, $direction);
	}

        /**
         * Method to build an SQL query to load the list data.
         *
         * @return      string  An SQL query
         */
        protected function getListQuery()
        {
                // Create a new query object.           
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                
                // Select some fields
                $query->select('a.task_id,a.title,a.notes,a.assignee,company,label,a.created_by,a.task_status,a.priority,projects,'
								.'a.subtasks,a.comments,a.duedate,a.tags,'
								.'a.file,a.followers,a.feed,a.state');
                
                
                $published = $this->getState('filter.state');
                if (is_numeric($published)) {
                	$query->where('state = '.(int) $published);
                } elseif ($published === '') {
                	$query->where('(state IN (0, 1))');
                }
                
                
                
                
                
                
                // From the hello table
                $query->from('#__taskman_task as a');
                
                
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		//if ($orderCol == 'name') {
			$orderCol = 'title';
		//}
		//$query->order($db->escape($orderCol.' '.$orderDirn));
		
                return $query;
        }
}
