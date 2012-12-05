<?php
// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Taskman Form Field class for the   Taskman  component
 */
class JFormFieldProjects extends JFormFieldList
{
        /**
         * The field type.
         *
         * @var         string
         */
        protected $type = 'company';
 
        /*
         * Method to get a list of options for a list input.
         *
         * @return      array           An array of JHtml options.
         */
        protected function getOptions() 
        {
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                $query->select('project_id,proj_name');
               // $query->select('Name')
                $query->from('#__taskman_projects');
                $query->where('state=1');
                $db->setQuery((string)$query);
                $messages = $db->loadObjectList();
                $options = array();
                if ($messages)
                {
                        foreach($messages as $message) 
                        {
                                $options[] = JHtml::_('select.option', $message->project_id,$message->proj_name);
                        }
                }
                //$options = array_merge(parent::getOptions(), $options);
                return $options;
        }
}
