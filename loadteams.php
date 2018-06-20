 <?php
@include "db.php";
$etype=$_GET['etype'];
$ttype=$_GET['ttype'];
echo "<br><br>";
if($ttype=="p1")
	{
	$kt=mysql_query("SELECT * FROM eday_puc WHERE ename='$etype'") or die(mysql_error());
	if(mysql_num_rows($kt)>0)
	{
	echo "<table border=1><tr>";
        $kkg=0;
	while($fkt=mysql_fetch_array($kt))
		{
		$mt=array();
		$mt=$fkt['ids'];
		$super=explode("~",$mt);
		
		if($kkg%10==0)
			echo "</tr><td style='background-color:white'>";
		else
			echo "<td style='background-color:white'>";
		$kkg++;
		$colors=array("660066","990000","6600CC","9900CC","FF0000","FF00CC","CC00CC","003399","006600");
		shuffle($colors);
		echo "<u><b><FONT COLOR=YELLOW style='background-color:black;'>Team ID:".$fkt['teamid']."</FONT></u></B><br>";
                if($etype!=false){
                if($etype=="essay")
                     $keka=1;
                else
                     $keka=5;
                
		for($y=0;$y<$keka;$y++)
			echo "<font color=".$colors[0].">".$super[$y]."</font><br>";
		}}
		echo "</td>";
		
		
	}
	else
		echo "<font color=red>No Teams Found</font>";
        echo "</table>";
	}
else
	{
	$kt2=mysql_query("SELECT * FROM eday_quiz WHERE ename='$etype'") or die(mysql_error());
	if(mysql_num_rows($kt2)>0)
	{
	echo "<table border=1><tr>";
	$i=0;
	while($fkt2=mysql_fetch_array($kt2))
		{
		$mt=array();
		$mt=$fkt2['ids'];
		$super=explode("~",$mt);
		if($i%10==0)
			echo "</tr><td style='background-color:white'>";
		else
			echo "<td style='background-color:white'>";
		$i++;
		$colors=array("660066","990000","6600CC","9900CC","FF0000","FF00CC","CC00CC","003399","006600");
		shuffle($colors);
		echo "<u><b><FONT COLOR=YELLOW style='background-color:black;'>Team ID:".$fkt2['teamid']."</FONT></u></B><br>";
                if($etype!=false){
                if($etype=="essay")
                     $keka=1;
                else
                     $keka=5;
		for($y=0;$y<$keka;$y++)
			echo "<font color=".$colors[0].">".$super[$y]."</font><br>";
		}}
		echo "</td>";
		
	}
	else
		echo "<font color=red>No Teams Found</font>";
        echo "</table>";
	}


?>
