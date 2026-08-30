<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Smart Erp</title>
	
	<link rel="stylesheet" href="css/cssdrop.css" />
	<script type="text/javascript" src="../js/jsdrop.js">
    </script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../js/datetimepicker.js">

//Date Time Picker script- by TengYong Ng of http://www.rainforestnet.com
//Script featured on JavaScript Kit (http://www.javascriptkit.com)
//For this script, visit http://www.javascriptkit.com 

</script>

	
	
	
	
	
	
	
	
	
	<script type="text/javascript">
	function valid()
	{
	if( ! confirm("Are you sure ") )
	{
	 return false;
	
	}
	
	}
	
	
	</script>
			
	
	<script type="text/javascript">
	function validation()
	{
	var title= document.f1.title.value;
	var aut= document.f1.aut.value;
    var noc= document.f1.noc.value;	
	var doa= document.f1.doa.value;	
  
	
	if(title=='')
	{
	alert("please enter title ");
	document.f1.title.focus();
	return false;
	}
	
	if(aut=='')
	{
	alert("please enter authore name ");
	document.f1.aut.focus();
	return false;
	}
	
	if(noc=='')
	{
	alert("please enter no. of copies ");
	document.f1.noc.focus();
	return false;
	}
	
	
	if(doa=='')
	{
	alert("please enter date of arrival ");
	document.f1.doa.focus();
	return false;
	}
	
	
	
	
	}
	</script>
	<script type="text/javascript" src="datetimepicker.js"></script>
    
	
		
	
	
</head>