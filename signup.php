<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
<script language="javascript" type="text/javascript">
var judge=true;
function userCheck(judge){
	var ajaxRequest; 
	flag=true;

	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}

	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			document.getElementById('user_check').innerHTML=ajaxRequest.responseText
			if(ajaxRequest.responseText.trim()!="")
				{
				  flag=false;
				}
			
			
		}
	}
	var user = document.getElementById('User').value;
	var queryString = "?User=" + user;
	ajaxRequest.open("GET", "user_check.php" + queryString, judge);
	ajaxRequest.send(null); 
 
}
</script>
</head>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	text-align: left;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}

.auto-style4 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style5 {
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: xx-large;
}
.auto-style21 {
	text-align: right;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
</style>
<body>
<form style="margin-top:5%" method="post" action="signupCheck.php">
<table align="center"  style="width: 600px">
	<tr>
		<td class="auto-style5">ProjectX Sign Up</td>
	</tr>
	 <tr>
		<td>
		<table align="center">
			<tr>
				<td class="auto-style21" style="width: 200px">Email ID</td>
            	<td><input class="auto-style4" id="User" onchange="userCheck(true);" name="Email" style="width: 200px" type="email" /></td>
				<td class="auto-style2" style="width: 200px">
					<span id="user_check" class="auto-style22"></span>

				</td>
			</tr>
		</table>
		</td>
	</tr>
	<!--<tr>
		<td>
		<table align="center">
			<tr>
				<td class="auto-style21" style="width: 200px">Username</td>
				<td><input class="auto-style4" id="User" onchange="userCheck(true);" name="User" type="text" style="width: 200px"/></td>
				<td class="auto-style2" style="width: 200px">
					<span id="user_check" class="auto-style22"></span>
				</td>
			</tr>
		</table>
		</td>
	</tr> -->
    <tr>
		<td>
		<table align="center">
			<tr>
				<td class="auto-style21" style="width: 200px">Password</td>
				<td><input class="auto-style4" name="Pass" style="width: 200px" type="password" /></td>
				<td class="auto-style2" style="width: 200px">&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
    <tr>
		<td>
		<table align="center">
			<tr>
				<td class="auto-style21" style="width: 200px">Name</td>
            	<td><input class="auto-style4" name="Name" style="width: 200px" type="text" /></td>
				<td class="auto-style2" style="width: 200px">&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
   
    <tr>
		<td class="auto-style1" align="center">
		<input class="auto-style4" name="Submit1" type="submit" value="Continue" /><span class="auto-style4">&nbsp;</span></td>
	</tr>

</table>
</form>
</body>
</html>
