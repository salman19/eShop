<script type="text/javascript">
function validateForm()
{
	var email=document.signin.email.value;
	var password=document.signin.password.value;
 
	if(email == '')
	{
		document.getElementById('error').innerHTML="Please Enter Email";
		return false;
	}
 
	if(password == '')
	{
		document.getElementById('error').innerHTML="Please Enter Password";
		return false;
	}
}
</script>