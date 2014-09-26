<script type="text/javascript">
function validateForm(theForm)
{

 var emailVal = theForm.email.value;
 var passVal = theForm.password.value;
  if (emailVal==null || val.trim()=="") { 
    alert('Please type your email');
    theForm.email.focus();
    return false; // cancel submission
  }
  if (passVal==null || val.trim()=="") { 
    alert('Please type your password');
    theForm.password.focus();
    return false; // cancel submission
  }
  return true; // allow submit
 
}
</script>