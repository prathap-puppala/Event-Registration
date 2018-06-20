<?php
session_start();
@include "db.php";
$ename=$_GET['ename'];
$ids=$_GET['ids'];
$batch=$_GET['batch'];
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Kolkata");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
$tids=array();
$tids=explode("~",$ids);
if($batch=="puc")
	{
	$k1=mysql_query("SELECT MAX(teamid) FROM sdcac_database.eday_puc WHERE ename='$ename'");
	$teamid=0;
	$k2=mysql_fetch_array($k1);
	$teamid=$k2[0];
	$teamid++;
	$mine=mysql_query("SELECT ids FROM sdcac_database.eday_puc WHERE ename='$ename'");
	while($p2=mysql_fetch_array($mine))
		{
		$spl=explode("~",$p2['ids']);
		$cflag=0;
		for($k=0;$k<count($spl);$k++)
			{
			for($kt=0;$kt<5;$kt++)
				{
				if($spl[$k]==$tids[$k])
					$cflag=1;
				}	
			}
		}
	if($cflag==1){
		$cflag=0;
		echo "<script>alert('One/more are already Registered.....');window.location.reload();</script>";
		}
	else
		{
		mysql_query("INSERT INTO sdcac_database.eday_puc (`teamid`, `ids`, `time`, `ip`, `ename`) VALUES ('$teamid', '$ids', '$time', '$ip', '$ename')");
		$_SESSION['ok']='done';
		$_SESSION['id']=$teamid;
		echo "<script>window.location.href='index.php';</script>";
		}
	}
else
	{
$k12=mysql_query("SELECT MAX(teamid) FROM sdcac_database.eday_quiz WHERE ename='$ename'");
	$teamid2="";
	$k22=mysql_fetch_array($k12);
	$teamid2=$k22[0];
	$teamid2++;
	$mine2=mysql_query("SELECT ids FROM sdcac_database.eday_quiz WHERE ename='$ename'");
	while($p22=mysql_fetch_array($mine2))
		{
		$spl2=explode("~",$p22['ids']);
		$cflag2=0;
		for($k2=0;$k2<count($spl2);$k2++)
			{
			for($kt2=0;$kt2<6;$kt2++)
				{
				if($spl2[$k2]==$tids[$k2])
					$cflag2=1;
				}	
			}
		}
	if($cflag2==1)
		{
		$cflag2=0;
		echo "<script>alert('One/more are already Registered.....');window.location.href='index.php';</script>";
		}
	else
	{
	mysql_query("INSERT INTO `sdcac_database`.`eday_quiz` (`teamid`, `ids`, `ename`, `time`, `ip`) VALUES ('$teamid2', '$ids', '$ename', '$time', '$ip')") or die(mysql_error());
	$_SESSION['ok']='done';
	$_SESSION['id']=$teamid2;
	echo "<script>window.location.reload();</script>";}}





?>
