<?php
session_start();

if (isset($_SESSION['ok']))
{

echo "<script>alert('Sucessfully Regestered...Your TEAM ID---".$_SESSION['id']."');</script>";
	unset($_SESSION['id']);
	unset($_SESSION['ok']);
}
?>
<!------<img src='q2.jpg' style='position:absolute;top:13%;left:0%' width='430px'  >------>
<img style='position:fixed;top:0%;height:13%;width:100%;' src='header.png'><Br><br><br>
<h2 style='position:fixed;top:3%;left:40%;color:yellow;'>Engineers Day Events</h2>
<h4 style='position:fixed;top:6%;left:60%;color:yellow;'>NOTE: Re-Register For Debate Event</h4>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Event Registration</title>
    <meta name="description" content="A preview of the jQuery UI Bootstrap theme">
    <meta name="author" content="Addy Osmani">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Styles --> 
    <link type="text/css" href="css/custom-theme/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
    
    <link type="text/css" href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/demo.css" rel="stylesheet">

  </head>

  <body >
	  
	  <script>
	  var bt,len=0,eventname,tids='';
	  function validate()
	  {
		  var flag=0;
			for(var j=1;j<=len;j++)
				{
					var tmp=$("#uid"+j).val();
					if(tmp==false)
						flag=1;
					else{
						if(j==len)
							tids=tids+tmp;
						else
							tids=tids+tmp+"~";
						}
						
				}
			if(flag==1)
				alert("Fill Required Fields");
			else
				{
					
					$.post("reg.php?ids="+tids+"&ename="+eventname+"&batch="+bt,function(data){
					$("#status").html(data);
					});
				}
		}


	function loadteams()
	{
	$("#sids").hide(3000);
	$("#tid").html("<select id='bttype' ><option selected value=''>Choose</option><option value='p1'>PUC TEAMS</option><option value='eng'>ENGG TEAMS</option></select><select id='etype' ><option selected value=''>Choose Event</option><option value='debate'>Debate</option><option value='quiz'>Quiz</option><option value='essay'>Essay</option></select><br><button onclick='teamload()' class='ui-button-primary' style='height:auto;'>View Teams</button>");
	}
	function teamload()
	{
	var ttype=$("#bttype").val();
	var etype=$("#etype").val();
	$("#teams").html("<br><font color='RED'>Loading<blink>...</blink></font>");
	$.post("loadteams.php?ttype="+ttype+"&etype="+etype,function(data){
	$("#teams").html(data);
	});
	
	}
	  function dothis()
		{
			
			eventname=$("#ename").val();
			bt=$("#batch").val();
			var str="";
			if(bt=='puc' && eventname=="quiz")            
                                 len=5;
                        else if(bt=='engg' && eventname=="quiz")
                                 len=6;
                        else if(eventname=="essay")
                                 len=1;
			if(eventname!=false){
			for(var i=1;i<=len;i++)
				{
					var tmp="<font color='black'>ID NO"+i+" </font><input type=text style='height:auto;' maxlength=7 id=uid"+i+" name=uid"+i+"><br>";
					str=str+tmp;
				}
				str=str+"<input type=submit onclick='return validate()' value='Register' class='ui-button-primary' ><br><br>";
			$("#sids").html(str);}
			else	
				alert("Choose Event Name");
			

		}

	
	  </script>
	

  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/custom-theme/jquery.ui.1.9.2.ie.css"/>
  <![endif]-->
	
	<div id='status'></div>
	<table border=0 style='' align=center>
	<tr><td>
	1.&nbsp;<select id="ename">
	<option value="">Choose Event</option>
	<option value='debate'>Debate</option>
	<option value='quiz'>Quiz</option>
        <option value='essay'>Essay</option>
     
	</select>
	2.&nbsp;<select id='batch' onchange="dothis()">
		<option value=''>Select Batch</option>
	<option value='puc'>PUC</option>
	<option value='engg'>ENGG</option>
	</select>
	<div id=sids></div>
	</td></tr>
	</table>
	<div id='tid' align=center><button class='ui-button-primary'  onclick='loadteams()'>View All Teams</button></div>
	<div id='teams' align=center></div>
 
 
 

        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <!--daterangepicker-->
        <script type="text/javascript" src="third-party/jQuery-UI-Date-Range-Picker/js/date.js"></script>
        <script type="text/javascript" src="third-party/jQuery-UI-Date-Range-Picker/js/daterangepicker.jQuery.js"></script>

        <!--wijmo-->
        <script src="third-party/wijmo/jquery.mousewheel.min.js" type="text/javascript"></script>
        <script src="third-party/wijmo/jquery.bgiframe-2.1.3-pre.js" type="text/javascript"></script>
        <script src="third-party/wijmo/jquery.wijmo-open.1.5.0.min.js" type="text/javascript"></script>


        <!-- FileInput -->
        <script src="third-party/jQuery-UI-FileInput/js/enhance.min.js" type="text/javascript"></script>
        <script src="third-party/jQuery-UI-FileInput/js/fileinput.jquery.js" type="text/javascript"></script>

        <!--init for this page-->
        <script type="text/javascript" src="js/demo.js"></script>
	


  </body>
</html>
