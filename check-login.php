<doctype html> 
<html> 
<head> <title> PHP 파일 IO </title> 
<meta charset= "UTF-8"/>
</head> 
<body> 
<?php
extract($_POST);
$flag = 0; 
$fptr1 = fopen ("./user.dat", "r"); 
while ( ($flag == 0) && ($line = fgets($fptr1, 1024))) { 
$user  = explode("||", $line);  

if(!strcmp($id1, $user[0])){
        if(!strcmp($pw1, $user[1])){
                $flag = 1;
        }
}
}
fclose ($fptr1);
//유저 정보 파일 담기
$fptr2 = fopen("./stuinfo.dat","r");
$line2 = fread($fptr2, 1024);
$stu = explode(",", $line2); // 파일에서 \n을 읽지못해 파일 전체가 $stu[0]에 저장되는 오류


if ( $flag == 1) { //아이디가 파일에 있는 경우
print "{$user[2]}님 환영합니다.<br><hr>";

for($i=0;$i<count($stu);$i++){
        print"{$stu[$i]}<br>";
}


print " <hr><a href='./logout.php'>
<input type='button' value='로그아웃'></a> ";  
print " <a href='./info_modefy.php'>
<input type='button' value='정보 수정하기'></a> ";

} 
else { //아이디가 파일에 없는 경우
        print " 로그인 정보를 확인해 주세요<br>" ;
        print " <a href='./index.htm'>
<input type='button' value='로그인 화면으로'></a> ";  
} 

fclose ($fptr2);
?>
