<?php
session_start();
?>
<head>
<script type="text/javascript">
$().ready(function() {
	//
	
});
$(function() {
		
		$( "#newProjectForm" ).find('input.tag').tagedit({
			autocompleteURL: 'autocomplete.php',
			allowEdit: false,
			allowAdd: false
		});	
	//$("#newProjectForm").validate();
}
	
);
	
</script>
</head>
<div>
	<form  id="newProjectForm" method="POST" action="JavaScript:newProjectCheck()">
		<fieldset>
			<p>
				<label id="Label1">Title</label>
				<input id="Project_Title" name="project_title" type="text" required>
			</p>
			<p>
				<label id="Label2">Threads</label>
				<input id="Project_Threads" type='text' name='tag[]'  class='tag' required>
				
			</p>
			<input name="Button1" class="submit" type="submit" value="Create" >
		</fieldset>	
	</form>
	
</div>
