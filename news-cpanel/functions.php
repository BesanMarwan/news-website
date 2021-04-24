<?php

function getRecordName($conn, $table, $id) {
	$sql = "SELECT * FROM $table WHERE id =  $id";
	  $result = mysqli_query($conn, $sql);  
	  $userInfo = mysqli_fetch_assoc($result);
	  return $userInfo['title'];
}

function getTitlePage(){

	$GLOBALS['pageTitle'] ='';

	if(isset ($GLOBALS['pageTitle'])){
		echo $pageTitle;
	}else{
		echo 'Default';
	}
}
function getDateArabic($date){
	switch($date){
		case ('Saturday') : $date="السبت";
		                            break;
		                            case ('Sunday') : $date="الاحد";
		                            break;
case('Monday') : $date="الاتنين";
		                            break;
case ('Tuesday') : $date="الثلاثاء";
		                            break;
		                            case ('Wednesday') : $date="الاربعاء";
		                            break;

case ('Thursday') : $date="الخميس";
		                            break;
case ('Friday') : $date="الجمعة";
		                            break;


		                     }
  return $date;

}
