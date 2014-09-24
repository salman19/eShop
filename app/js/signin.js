<script type="text/javascript">
function validateForm()
{
	var user=document.signin.email.value;
	var pass=document.signin.password.value;
 
	if(user == '')
	{
		document.getElementById('error').innerHTML="Please Enter Email";
		return false;
	}
 
	if(pass == '')
	{
		document.getElementById('error').innerHTML="Please Enter Password";
		return false;
	}
}
</script>