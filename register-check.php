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


while ( ($flag == 0) && $line = fgets($fptr1, 1024)) { 
    
$user = explode('||', $line);

if(!strcmp($id2, $user[0])) $flag = 1;
}
fclose ($fptr1);

if ( $flag == 1) { 
print "신청하신 아이디는 이미 사용중 입니다 <br> ";
print "다른 아이디를 신청해 주세요<br> ";
print " <a href='./index.htm'>
<input type='button' value='로그인 화면으로'></a> ";  
} 
else { 
    $count =0;
$fptr1 = fopen ("./user.dat", "r");
while($line = fgets($fptr1, 1024)){
    $count +=1;
}
fclose ($fptr1);

$fptr1 = fopen ("./user.dat", "a");
$line = "\r\n{$id2}||{$pw2}||{$name2}\n" ; 
fwrite($fptr1, $line, strlen($line)); 
fclose($fptr1);

print "회원가입이 완료되었습니다<br>" ;
print "회원가입을 환영합니다. <br>" ;
print " <a href='./index.htm'>
<input type='button' value='로그인 화면으로'></a> "; 
} 

 
?>
