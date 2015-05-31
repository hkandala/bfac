function bell(){
	alert(":P");
}

function loadMyProjects() {
	$.ajax({
    url: 'loadMyProjects.php',
    success: function(data,status) {
    console.log("Data: " + data + "\nStat: " + status);
    $('#content').html(data);
    }
    
  });
}

function newProject() {
	$.ajax({
    url: 'newProject.php',
    success: function(data,status) {
    console.log("Data: " + data + "\nStat: " + status);
    $('#content').html(data);
    }
    
  });
}
function loadAllProjects() {
	$.ajax({
    url: 'loadAllProjects.php',
    success: function(data,status) {
    console.log("Data: " + data + "\nStat: " + status);
    $('#content').html(data);
    }
    
  });
}

function newProjectCheck() {
	alert($('#Project_Title').val());
	$.ajax({
	type: "POST",
	data: $('#newProjectForm').serialize(),
		/*{
   	 		
			Project_Title : $('#Project_Title').val(),
			tag : function()
					{
						var $inputs = $('#myForm :input');
						var values = {};
						$inputs.each(function() {
							values[this.name] = $(this).val();
						});
						return values;
					}		
		},*/ 		
    	
     url: "newProjectCheck.php",
     success: function(data,status) {
     console.log("Data: " + data + "\nStat: " + status);
     $('#content').html(data);
     }
    
  });
}

