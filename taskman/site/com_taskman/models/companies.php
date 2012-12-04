<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class TaskManModelCompanies extends JModelList
{
  protected function populateState($ordering = null, $direction = null)
	{
		// List state information.
		parent::populateState('company_name', 'asc');
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
                $query->select('c.company_id,c.company_name,c.members,c.owner,c.state');
                // From the hello table
                $query->from('#__taskman_company as c');
                
                
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		//if ($orderCol == 'name') {
			$orderCol = 'company_name';
		//}
		//$query->order($db->escape($orderCol.' '.$orderDirn));
		
                return $query;
        }
}
