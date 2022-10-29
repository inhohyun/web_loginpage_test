<?php

extract($_POST);
$fptr2 = fopen("./stuinfo.dat","r");
$line2 = fread($fptr2, 1024);
$stu = explode(",", $line2); 



fclose ($fptr2);


for($i=0;$i<count($stu);$i++){
        print"{$stu[$i]}<br>";
}


print " <hr><a href='./logout.php'>
<input type='button' value='로그아웃'></a> ";  
print " <a href='./info_modefy.php'>
<input type='button' value='정보 수정/삭제하기'></a> ";
print " <a href='./info_add.htm'>
<input type='button' value='정보 추가하기'></a> "; 
?>