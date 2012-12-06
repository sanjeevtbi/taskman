<?php
?>
<script type="text/javascript">

function saveTitle() 
{
	var datas = {
		task_id: document.getElementById('newtitle').value,
		title: document.getElementById('newtitle').value,
		};
	
	jQuery.ajax({
		type: "POST",
		url: "<?php echo JURI::base();?>index.php?option=com_taskman&view=task&task=task.hello",
		data: datas,
		success: function(response)
		{
			$("#task").html(response);
		}
	});
	return false;
}






function saveDate(cal) {
	var data = {
		task_id: <?php echo $item->task_id; ?>,
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

function hovernote()
{ 
	document.getElementById('notes1').style.display='none';
	document.getElementById('notes2').style.display='block';
	}	
function hovernotout()
{ 
	document.getElementById('notes1').style.display='block';
	document.getElementById('notes2').style.display='none';
	}

function hovers()
{ 
	document.getElementById('task').style.display='none';

	document.getElementById('icon').style.display='block'; 

	}

function hoverout()
{ 
	document.getElementById('task').style.display='block';
	document.getElementById('icon').style.display='none'; 
	
	}

	
</script>
<style type="text/css"> #icon{ display:none }</style>
<style type="text/css"> #notes2{ display:none }</style>
<form>

	<div class="row-fluid">
		<div class="span6 row-stripped ">
			<div class=" well">

				<div class="row-fluid">
					<div class="span12 ">
						<h3>
							<div id="task" onmouseover="hovers()"><?php echo $this->item->title; ?></div>
							<div id="icon"  onmouseout="hoverout()"><input id="newtitle" type="text" value="<?php echo $this->item->title; ?>"><button onclick="saveTitle()">click</button></div>
						</h3>
				
					</div>
				</div>


				<div class="row-fluid">
					<div class="span12 muted">
						<i class="icon-user"></i>
						<?php echo JText::_('COM_TASKMAN_TASKMAN_NOTES_LABEL');?>
						<div id="notes1" onclick="hovernote()"><?php echo $this->item->notes; ?></div>
						<br/>
						<div id="notes2"><input id="newnotes" type="text" value="<?php echo $this->item->notes; ?>"><button onclick="savenotes()">click</button></div>
					</div>
				</div>


				<fieldset>
					<legend>
						<hr>
					</legend>

					<div class="row-fluid">
						<div class="span3 muted">
							<i class="icon-user"></i>
							<?php echo JText::_('COM_TASKMAN_TASKMAN_ASSIGNEE_LABEL');?>
						</div>
						<div class="span9">
							<b><?php echo $this->item->assignee; ?> </b>
						</div>
					</div>
					<br>

					<div class="row-fluid">
						<div class="span3 muted">
							<?php 
							$attribs = Array(
		'onchange' => 'saveDate(this)',
		'style'=>'display:none;'
					);
	echo JHtml::calendar($this->item->duedate, 'duedate', 'duedate','%Y-%m-%d',$attribs );  ?>
							<?php echo JText::_('COM_TASKMAN_TASKMAN_DUEDATE_LABEL');?>
						</div>
						<div class="span9">
							<b  id="duedate_result"><?php echo $this->item->duedate; ?></b> 
													
						</div>
					</div>

					<br>
					<div class="row-fluid">
						<div class="span3 muted">
							<i class="icon-user"></i>
							<?php echo JText::_('COM_TASKMAN_TASKMAN_FOLLOWERS_LABEL');?>
						</div>
						<div class="span9">
							<?php echo $this->item->followers; ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span3 muted">
							<i class="icon-tag"></i>
							<?php echo JText::_('COM_TASKMAN_TASKMAN_TAGS_LABEL');?>
						</div>
						<div class="span9">
							<?php echo $this->item->tags; ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span3 muted">
							<i class="icon-tag"></i>
							<?php echo JText::_('COM_TASKMAN_TASKMAN_PROJECTS_LABEL');?>
						</div>
						<div class="span9">
							<?php echo $this->item->projects; ?>
						</div>
					</div>

				</fieldset>
				<!-- end of fieldset -->

</form>
<!-- end of form -->

</div>
<!-- end of well -->
</div>
<!-- end of span4  -->


</div>
