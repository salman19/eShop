
function validateForm(theForm)
{
 var emailVal = theForm.email.value;
 var passVal = theForm.password.value;
  if (emailVal==null || emailVal.trim()=="") { 
    alert('Please type your email');
    theForm.email.focus();
    return false; // cancel submission
  }
  return true; // allow submit
 
}