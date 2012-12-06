<?php
?>
<script type="text/javascript">
	function saveDate(cal) {
		var data = {
			task_id: <?php echo $this->item->task_id; ?>,
			duedate: $(cal).value,
			};
		jQuery.ajax({
			type: "POST",
			url: "<?php echo JURI::base();?>index.php?option=com_taskman&view=task&task=task.saveDate",
			data: data,
			success: function(response)
			{
				jQuery("#duedate_result").html(response);
			}
		});
		return false;
	}

</script>




<form>

	<div class="row-fluid">
		<div class="span6 ">

			<div class="row-fluid">
				<div class="span12 ">
					<h3>
						<?php echo $this->item->title;?>
					</h3>

				</div>
			</div>


			<div class="row-fluid">
				<div class="span3">
					<?php echo JText::_('COM_TASKMAN_TASKMAN_NOTES_LABEL');?>
				</div>
				<div class="span9">
					<input type="text" value="<?php echo $this->item->notes; ?>"><button onclick="note()">click here</button>
				</div>




				<div class="row-fluid">
					<div class="span3">

						<?php echo JText::_('COM_TASKMAN_TASKMAN_ASSIGNEE_LABEL');?>
					</div>
					<div class="span9">
						<b><?php echo $this->item->assignee; ?> </b>
					</div>
				</div>


				<div class="row-fluid">
					<div class="span3">

						<?php echo JText::_('COM_TASKMAN_TASKMAN_DUEDATE_LABEL');?>
					</div>
					<div class="span9">
						<b id="duedate_result"><?php echo $this->item->duedate; ?> </b>
						<?php 
						$attribs = Array(
								'onchange' => 'saveDate(this)',
								'style'=>'display:none;'
						);
												// deafult value       name        id         format    extra attri 
							echo JHtml::calendar($this->item->duedate, 'duedate', 'duedate','%Y-%m-%d',$attribs );  ?>

					</div>
				</div>


				<div class="row-fluid">
					<div class="span3">

						<?php echo JText::_('COM_TASKMAN_TASKMAN_FOLLOWERS_LABEL');?>
					</div>
					<div class="span9">
						<?php echo $this->item->followers; ?>
					</div>
				</div>

				<div class="row-fluid">
					<div class="span3">

						<?php echo JText::_('COM_TASKMAN_TASKMAN_TAGS_LABEL');?>
					</div>
					<div class="span9">
						<?php echo $this->item->tags; ?>
					</div>
				</div>

				<div class="row-fluid">
					<div class="span3">

						<?php echo JText::_('COM_TASKMAN_TASKMAN_PROJECTS_LABEL');?>
					</div>
					<div class="span9">
						<?php echo $this->item->projects; ?>
					</div>
				</div>

</form>
<!-- end of form -->

</div>
<!-- end of span4  -->


</div>
