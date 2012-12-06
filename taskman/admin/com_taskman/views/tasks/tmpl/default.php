<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
// load tooltip behavior
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
// DROPDOWN inititlaze
JHtml::_('dropdown.init');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
//initialize the arcive and trash
$archived	= $this->state->get('filter.published') == 2 ? true : false;
$trashed	= $this->state->get('filter.published') == -2 ? true : false;

?>


<style type="text/css">
#task<?php foreach($this->items as $item){
	
	echo ",#news".$item->task_id;
}
?>
							
		{
	display: none;
	padding-bottom: 10px;
}


</style>

 <!-- JAVA SCRIPT -->

<script type="text/javascript">

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


function saveassignee(task_ids) 
{ 
	//alert(task_ids);
	var datas = {
		task_id: task_ids,
		assignee: document.getElementById('newassignee').value,
		};
	
	jQuery.ajax({
		type: "POST",
		url: "<?php echo JURI::base();?>index.php?option=com_taskman&view=task&task=task.sassignee",
		data: datas,
		success: function(response)
		{
			$("#hideassignee").html(response);
		}
	});
	return false;
}


function savefollowers(task_ids) 
{ 
	//alert(task_ids);
	var datas = {
		task_id: task_ids,
		followers: document.getElementById('newfollowers').value,
		};
	
	jQuery.ajax({
		type: "POST",
		url: "<?php echo JURI::base();?>index.php?option=com_taskman&view=task&task=task.sfollowers",
		data: datas,
		success: function(response)
		{
			$("#hidefollowers").html(response);
		}
	});
	return false;
}


function savenotes(task_ids) 
{ 
	//alert(task_ids);
	var datas = {
		task_id: task_ids,
		notes: document.getElementById('newnotes').value,
		};
	
	jQuery.ajax({
		type: "POST",
		url: "<?php echo JURI::base();?>index.php?option=com_taskman&view=task&task=task.snotes",
		data: datas,
		success: function(response)
		{
			$("#hidenotes").html(response);
		}
	});
	return false;
}


function savetitle(task_ids) 
{ 
	//alert(task_ids);
	var datas = {
		task_id: task_ids,
		title: document.getElementById('newtitle').value,
		};
	
	jQuery.ajax({
		type: "POST",
		url: "<?php echo JURI::base();?>index.php?option=com_taskman&view=task&task=task.stitle",
		data: datas,
		success: function(response)
		{
			$("#result").html(response);
		}
	});
	return false;
}

function savetags(task_ids) 
{ 
	//alert(task_ids);
	var datas = {
		task_id: task_ids,
		tags: document.getElementById('newtags').value,
		};
	
	jQuery.ajax({
		type: "POST",
		url: "<?php echo JURI::base();?>index.php?option=com_taskman&view=task&task=task.stags",
		data: datas,
		success: function(response)
		{
			$("#hidetags").html(response);
		}
	});
	return false;
}



function display(data)
{			
	var i;		
	
	for(i=1;i<=10;i++)
	{
			if(data != i)
			{
				document.getElementById('news'+i).style.display = 'none';

			}
			//alert(data);
			if(data == i)
			{
				//alert(data);
				document.getElementById('news'+data).style.display = 'block';
			}

	}	
	
	
}

function chtags()
{ 
	document.getElementById('hidetags').style.display='none';

	document.getElementById('showtags').style.display='block'; 

}
function vtags()
{ 
	document.getElementById('hidetags').style.display='block';

	document.getElementById('showtags').style.display='none'; 

}




function chfollowers()
{ 
	document.getElementById('hidefollowers').style.display='none';

	document.getElementById('showfollowers').style.display='block'; 

}
function vfollowers()
{ 
	document.getElementById('hidefollowers').style.display='block';

	document.getElementById('showfollowers').style.display='none'; 

}


function chassignee()
{ 
	document.getElementById('hideassignee').style.display='none';

	document.getElementById('showassignee').style.display='block'; 

}
function vnotes()
{ 
	document.getElementById('hideassignee').style.display='block';

	document.getElementById('showassignee').style.display='none'; 

}

	//notes
function chnotes()
{ 
	document.getElementById('hidenotes').style.display='none';

	document.getElementById('shownotes').style.display='block'; 

}
function vnotes()
{ 
	document.getElementById('hidenotes').style.display='block';

	document.getElementById('shownotes').style.display='none'; 

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

<style type="text/css">
#icon{ display:none }
#shownotes{ display:none }
#showassignee{ display:none }
#showfollowers{ display:none }
#showtags{ display:none }
</style>


<script type="text/javascript">
Joomla.orderTable = function() {
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>') {
			dirn = 'asc';
		} else {
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}



</script>

<!-- Form Start -->
<form
	action="<?php echo JRoute::_('index.php?option=com_taskman&view=tasks'); ?>"
	method="post" name="adminForm" id="adminForm">

	<?php if(!empty( $this->sidebar)): ?>
	<!-- set span 2 for side bar container(because if no sider bar it will not take space) and set span 10 for main container-->
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<?php else : ?>
		<div id="j-main-container">
			<?php endif;?>
			<!--search filter-->
			<div id="filter-bar" class="btn-toolbar">
				<div class="filter-search btn-group pull-left">
					<label for="filter_search" class="element-invisible"><?php echo JText::_('COM_WEBLINKS_SEARCH_IN_TITLE');?>
					</label> <input type="text" name="filter_search" id="filter_search"
						placeholder="<?php echo JText::_('COM_HELLOWORLD_SEARCH'); ?>"
						value="<?php echo $this->escape($this->state->get('filter.search')); ?>"
						title="<?php echo JText::_('COM_WEBLINKS_SEARCH_IN_TITLE'); ?>" />
				</div>

				<div class="btn-group pull-left">
					<button class="btn hasTooltip" type="submit"
						title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>">
						<i class="icon-search"></i>
					</button>
					<button class="btn hasTooltip" type="button"
						title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"
						onclick="document.id('filter_search').value='';this.form.submit();">
						<i class="icon-remove"></i>
					</button>
				</div>

			</div>
		</div>
		<!-- END OF J MAIN COMTAIER -->
		<div class="row-fluid">
			<!-- START OF ROW FLUID  -->
			<div class="span5 ">
				<!-- START OF ROW SPAN6 1 -->
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="5">
								<!-- arg1-text, arg2-db query name, arg3,4 ordering default values -->
								<?php echo JHtml::_('grid.sort', 'TASKMAN_MSGS_ID', 'a.task_id', $listDirn, $listOrder); ?>
							</th>
							<th width="20"><input type="checkbox" name="toggle" value=""
								onclick="Joomla.checkAll(this)" />
							</th>
							<th><?php echo JHtml::_('grid.sort', 'TASKMAN_MSGS_STATUS', 'a.state', $listDirn, $listOrder); ?>
							</th>
							<th><?php echo JHtml::_('grid.sort', 'TASKMAN_MSGS_TITLE', 'a.title', $listDirn, $listOrder); ?>
							</th>
							<th></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="5"><?php echo $this->pagination->getListFooter(); ?>
							</td>
						</tr>
					</tfoot>
					<tbody>
					
					
					
					
						<?php foreach($this->items as $i => $item): 
							$canChange=1;?>
						<tr class="row<?php echo $i % 2; ?>">
							<td><?php echo $item->task_id; ?></td>
							<td><?php echo JHtml::_('grid.id', $i, $item->task_id); ?></td>
							<td><?php echo JHtml::_('jgrid.published', $item->state, $i, 'tasks.', $canChange, 'cb'); ?>
							</td>
							
							<td class="has-context">
							<div class="pull-left">
							<?php echo $item->title; ?> &nbsp;&nbsp;
						</div>
					
						
							<!-- copied from article manager dropdown -->
							
							<div class="pull-left">
							<?php
								// Create dropdown items
								JHtml::_('dropdown.edit', $item->task_id, 'task.');
								JHtml::_('dropdown.divider');
								if ($item->state) :
															//check box + id tasks
								JHtml::_('dropdown.unpublish', 'cb' . $i, 'tasks.');
								else :
									JHtml::_('dropdown.publish', 'cb' . $i, 'tasks.');
								endif;

								JHtml::_('dropdown.divider');

								if ($archived) :
									JHtml::_('dropdown.unarchive', 'cb' . $i, 'tasks.');
								else :
									JHtml::_('dropdown.archive', 'cb' . $i, 'tasks.');
								endif;

								if ($trashed) :
									JHtml::_('dropdown.untrash', 'cb' . $i, 'tasks.');
								else :
									JHtml::_('dropdown.trash', 'cb' . $i, 'tasks.');
								endif;

								// Render dropdown list
								echo JHtml::_('dropdown.render');
								?>
									</div>
									</td>
							<td>
							<i class="icon-arrow-right btn-primary"
									onclick="display(<?php echo $item->task_id; ?>)"></i>
							</td>
						
						</tr>
						<?php endforeach; ?>
					
					</tbody>
				</table>
				
				
				<div>
					<input type="hidden" name="task" value="" /> <input type="hidden"
						name="boxchecked" value="0" /> <input type="hidden"
						name="filter_order" value="<?php echo $listOrder; ?>" /> <input
						type="hidden" name="filter_order_Dir"
						value="<?php echo $listDirn; ?>" />
					<?php echo JHtml::_('form.token'); ?>
				</div>
			</div>
			
			
			<?php foreach($this->items as $i => $item): 

			$canChange=1;

			?>
			<div id="news<?php echo $item->task_id; ?>" class="span5 ">
				<div class="row-fluid">
					<!--single tasks  default.php  -->
					<div class=" well">
						<div class="row-fluid">
							<div class="span12 ">
								<div id="task" onclick="hovers()">
									<b id="result">
										<?php echo $item->title; ?>
									</b>
								</div>
								<div id="icon" onclick="hoverout()">
									<input id="newtitle" type="text"
										value="<?php echo $item->title; ?>">
									<input type="button" onclick="savetitle(<?php echo $item->task_id; ?>)" value="click">
								</div>


							</div>
						</div>


						<div class="row-fluid">
							<div class="span12 muted">
								<i class="icon-user"></i>
								<?php echo JText::_('COM_TASKMAN_TASKMAN_NOTES_LABEL');?>
								<div id="hidenotes" onclick="chnotes()">
									<?php echo $item->notes; ?>
								</div>
								<div id="shownotes" onclick="vnotes()">
								<input type="text" id="newnotes" value="<?php echo $item->notes; ?>" >
								<input type="button" onclick="savenotes(<?php echo $item->task_id; ?>)" value="click">
								</div>
								<br />
							
								
							</div>
						</div>


						<fieldset>
							<legend>
								<hr />
							</legend>

							<div class="row-fluid">
							<div class="span12 muted">
								<i class="icon-user"></i>
								<?php echo JText::_('COM_TASKMAN_TASKMAN_NOTES_LABEL');?>
								<div id="hideassignee" onclick="chassignee()">
									<?php echo $item->assignee; ?>
								</div>
								<div id="showassignee" onclick="vassignee()">
								<input type="text" id="newassignee" value="<?php echo $item->assignee; ?>" >
								<input type="button" onclick="saveassignee(<?php echo $item->task_id; ?>)" value="click">
								</div></div></div>
							<br>

							<div class="row-fluid">
								<div class="span3 muted">
									<?php 
									$attribs = Array(
											'onchange' => 'saveDate(this)',
											'style'=>'display:none;'
									);
							echo JHtml::calendar($item->duedate, 'duedate', 'duedate','%Y-%m-%d',$attribs );  ?>
									<?php echo JText::_('COM_TASKMAN_TASKMAN_DUEDATE_LABEL');?>
								</div>
								<div class="span9">
									<b id="duedate_result"><?php echo $item->duedate; ?> </b>

								</div>
							</div>

							<!--  -->
							
						<br>
							<div class="row-fluid">
							<div class="span12 muted">
								<i class="icon-user"></i>
								<?php echo JText::_('COM_TASKMAN_TASKMAN_FOLLOWERS_LABEL');?>
								<div id="hidefollowers" onclick="chfollowers()">
									<?php echo $item->followers; ?>
								</div>
								<div id="showfollowers" onclick="vfollowers()">
								<input type="text" id="newfollowers" value="<?php echo $item->followers; ?>" >
								<input type="button" onclick="savefollowers(<?php echo $item->task_id; ?>)" value="click">
								</div></div></div>

							
							
							<div class="row-fluid">
							<div class="span12 muted">
								<i class="icon-user"></i>
								<?php echo JText::_('COM_TASKMAN_TASKMAN_TAGS_LABEL');?>
								<div id="hidetags" onclick="chtags()">
									<?php echo $item->tags; ?>
								</div>
								<div id="showtags" onclick="vtags()">
								<input type="text" id="newtags" value="<?php echo $item->tags; ?>" >
								<input type="button" onclick="savetags(<?php echo $item->task_id; ?>)" value="click">
								</div></div></div>

						</fieldset>
						<!-- end of fieldset -->
					</div>
				</div>
				<!-- END OF ROW FLUID TABLE -->
			<?php endforeach; ?>
			</div>



		</div>
		<!-- END OF SPAN6 1 -->


	</div>

</form>
