function validateForm()
{
var a=document.getElementById('email').value;
//var b=document.forms["reg"]["fname"].value;
//var c=document.forms["reg"]["lname"].value;
//var d=document.forms["reg"]["avatar"].value;
var e=document.getElementById('password').value;

if ((a==null || a=="") && (e==null || e==""))
  {
  alert("All Field must be filled out");
  return false;
  }
if (a==null || a=="")
  {
  alert("Email must be filled out");
  return false;
  }
if (e==null || e=="")
  {
  alert("password must be filled out");
  return false;
  }
}