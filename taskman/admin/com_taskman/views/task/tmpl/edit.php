<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_taskman&view=task&layout=edit&id='.(int) $this->item->task_id); ?>"
      method="post" name="adminForm" id="adminForm">
        <fieldset class="adminform">
                <legend><?php echo JText::_( 'COM_TASKMAN_TASKMAN_DETAILS' ); ?></legend>
                <ul class="adminformlist">
<?php foreach($this->form->getFieldset() as $field): ?>
                        <li><?php echo $field->label;echo $field->input;?></li>
<?php endforeach; ?>
                </ul>
        </fieldset>
        <div>
                <input type="hidden" name="task_id" value="<?php echo $this->item->task_id;?>" />
                <input type="hidden" name="task" value="" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
</form>
