<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * Taskman View
 */
class TaskManViewCompany extends JViewLegacy
{
        /**
         * display method of Taskman view
         * @return void
         */
        public function display($tpl = null) 
        {
                // get the Data
                $form = $this->get('Form');
                $item = $this->get('Item');
 
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Assign the Data
                $this->form = $form;
                $this->item = $item;
 
                // Set the toolbar
                $this->addToolBar();
        $this->setDocument();
                
                // Display the template
                parent::display($tpl);
        }
 
        /**
         * Setting the toolbar
         */
        protected function addToolBar() 
        {
                $input = JFactory::getApplication()->input;
          
                $isNew = ($this->item->company_id == 0);
                JToolBarHelper::title($isNew ? JText::_('COM_TASKMAN_MANAGER_COMAPANY_NEW')
                                             : JText::_('COM_TASKMAN_MANAGER_COMAPANY_EDIT'));
                JToolBarHelper::save('company.save');
                JToolBarHelper::cancel('company.cancel', $isNew ? 'JTOOLBAR_CANCEL'
                                                                   : 'JTOOLBAR_CLOSE');
        }
        protected function setDocument() 
        {
                $isNew = ($this->item->company_id < 1);
                $document = JFactory::getDocument();
                $document->setTitle($isNew ? JText::_('TASKMAN_CREATE')
                                           : JText::_('TASKMAN_EDIT'));
        }
}
