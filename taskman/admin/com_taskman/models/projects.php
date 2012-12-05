<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * TaskMan Model
 */
class TaskManModelProjects extends JModelList
{
  protected function populateState($ordering = null, $direction = null)
	{
		// List state information.
		parent::populateState('proj_name', 'asc');
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
                $query->select('p.project_id,p.proj_name,p.proj_members,p.state');
                // From the hello table
                $query->from('#__taskman_projects as p');
                
                
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
	
			$orderCol = 'proj_name';

                return $query;
        }
}
