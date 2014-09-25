<script type="text/javascript">
function validateForm()
{
var a=document.forms["reg"]["email"].value;
var b=document.forms["reg"]["fname"].value;
var c=document.forms["reg"]["lname"].value;
var d=document.forms["reg"]["avatar"].value;
var e=document.forms["reg"]["password"].value;

if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e==""))
  {
  alert("All Field must be filled out");
  return false;
  }
if (a==null || a=="")
  {
  alert("Email must be filled out");
  return false;
  }
if (b==null || b=="")
  {
  alert("First name must be filled out");
  return false;
  }
if (c==null || c=="")
  {
  alert("Last name must be filled out");
  return false;
  }
if (d==null || d=="")
  {
  alert("avatar must be chosen");
  return false;
  }
if (e==null || e=="")
  {
  alert("password must be filled out");
  return false;
  }
  }
</script>