<?php
// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Taskman Form Field class for the   Taskman  component
 */
class JFormFieldTask extends JFormFieldList
{
        /**
         * The field type.
         *
         * @var         string
         */
        protected $type = 'task';
 
        /*
         * Method to get a list of options for a list input.
         *
         * @return      array           An array of JHtml options.
         */
        protected function getOptions() 
        {
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                $query->select('task_id');
               // $query->select('Name')
                $query->from('#__taskman_task');
                $db->setQuery((string)$query);
                $messages = $db->loadObjectList();
                $options = array();
                if ($messages)
                {
                        foreach($messages as $message) 
                        {
                                $options[] = JHtml::_('select.option', $message->task_id);
                        }
                }
                $options = array_merge(parent::getOptions(), $options);
                return $options;
        }
}
