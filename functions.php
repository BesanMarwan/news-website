<?php


function getRecordName($conn, $table, $id) {
	$sql = "SELECT * FROM $table WHERE id =  $id";
	  $result = mysqli_query($conn, $sql);  
	  $userInfo = mysqli_fetch_assoc($result);
	  return $userInfo['title'];
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

// Highlight words in text
function highlightWords($text, $word){
    $text = preg_replace('#'. preg_quote($word) .'#i', '<span class="" style="background:#F2D41F;color:#114379;font-size:18.5px;font-weight:600px">\\0</span>', $text);
    return $text;
}
