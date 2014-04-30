<?php
require_once ("dbconnection.php");
$DBConn = new Connection();

//no of volunteers
$date=0;

function setDate($d){
		global $date;
		$date= $d;
}

function volunteer_id(){
	global $date,$DBConn;
	$arr=array();
	$count=$DBConn->get_array("SELECT `volunteer_ID` FROM `volunteer_attendance` WHERE `attendance_date`=?",array($date));
	foreach($count as $countid){
		$arr[]=$countid['volunteer_ID'];
	}
	return $arr;
	
}

function count_volunteers(){
		$arr=volunteer_id();
		return sizeof($arr);
}

function volunteer_name(){
	global $date,$DBConn;
	$arr=array();
	$count=volunteer_id();
	foreach($count as $countid){
		$sel=$DBConn->get_array("SELECT `name` FROM `volunteer` WHERE `volunteer_ID`=?",array($countid));			
		foreach($sel as $selid){
		$arr[]=$selid['name'];	
		}
	}
	return $arr;
}

function call_determine($PID,$d){
	global $date,$DBConn;
	$i=0;
	if($d=='contacted'){
	$sel=$DBConn->get_array("SELECT * FROM `calllog` WHERE `PID`=? AND `contacted`=?",array($PID,1));
	}
	else if($d=='couldntreach'){
	$sel=$DBConn->get_array("SELECT * FROM `calllog` WHERE `PID`=? AND `couldntreach`!=?",array($PID,NULL));	
	}
	else if($d=='dontcall'){
	$sel=$DBConn->get_array("SELECT * FROM `calllog` WHERE `PID`=? AND `dontcall`=?",array($PID,1));	
	}
	else if($d=='mailed'){
	$sel=$DBConn->get_array("SELECT * FROM `calllog` WHERE `PID`=? AND `mailed`=?",array($PID,1));	
	}
	foreach($sel as $selid){
			$i++;				
			}
	return $i;
}

function call_success($index){
	global $date,$DBConn;
	$i=0;
	$count=$DBConn->get_array("SELECT `PID` FROM `calldetail` WHERE `date`=?",array($date));
	foreach($count as $countid){
		$i = $i + call_determine(	$countid['PID'],$index);
	}
	return $i;
}

function cal_vol($PID){
		global $date,$DBConn;
		$arr=array();
		$i=0;
		$sel=$DBConn->get_array("SELECT * FROM `calldetail` WHERE `date`=? AND `PID`=?",array($date,$PID));
		foreach($sel as $selid){
			$i++;	
		}
		return $i;
}

function top_vol(){
	global $date,$DBConn;
	$arr1=array();
	$i=0;
	$count=volunteer_id();
	foreach($count as $countid){
	$sel=$DBConn->get_array("SELECT `PID` FROM `allotment` WHERE `volunteer_ID`=?",array($countid));
		$arr1[$countid]=0;
		foreach($sel as $selid){
			$arr1[$countid]=+cal_vol($selid['PID']);		
		}		
	}
	foreach($arr1 as $key=>$value){
	echo $key.'---'.$value.'<br>';
	}
}

function agenda_id($agenda){
	global $date,$DBConn;
	$count=$DBConn->get_array("SELECT `agenda_id` FROM `agenda` WHERE `active`=? AND `agenda`=?",array(1,$agenda));
	foreach($count as $countid){
		return $countid['agenda_id'];
	}
	
}

function agenda($index){
		global $date,$DBConn;
		$i=0;
		$agenda_id=agenda_id($index);
		$count=$DBConn->get_array("SELECT * FROM `alumnus_agendaconfirmation` WHERE `date_of_confirmation`=? AND `agenda_id`=?",array($date,$agenda_id));
		foreach($count as $countid){
			$i++;	
		}
		return $i;
}

function date1($d,$show_name){
setDate($d);
echo 'No of volunteers '.count_volunteers().'<br>';

if($show_name=='on'){
        echo '<br>Volunteers attended on date '.$d.'<br>';
        $f=volunteer_name();
        foreach($f as $id){
        echo $id.'<br>';    
        }    
}

echo '<br>call success<br>';
echo 'contacted: '.call_success('contacted').'<br>';
echo 'couldnt reach: '.call_success('couldntreach').'<br>';
echo 'dontcall: '.call_success('dontcall').'<br>';
echo 'mailed: '.call_success('mailed').'<br>';
//top_vol();
echo '<br>No of agenda confirmed<br>';
echo 'Fund raising: '.agenda('Fund Raising').'<br>';
echo 'Intership: '.agenda('Intership').'<br>';
echo 'ASMP: '.agenda('ASMP').'<br>';
echo 'Database Updation: '.agenda('Database Updation').'<br>';
}

$q=$_POST['date'];
$show_name=$_POST['show_name'];
date1($q,$show_name);
?>