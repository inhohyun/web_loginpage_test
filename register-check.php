<doctype html> 
<html> 
<head> <title> PHP 파일 IO </title> 
<meta charset= "UTF-8"/>
</head> 
<body> 
<?php
extract($_POST);  //form에서 받아온 id, pw
if ( strcmp($id, "")) { // 아이디가 제대로 입력되었다면 
$flag = 0; 
$fptr1 = fopen ("./stuinfo.dat", "r"); //읽기로 파일 열기
while ( ($flag == 0) && $line = fread($fptr1, 1024)) { // flag가 0이 아닐 때까지




$usernum = explode("\n", $line); // 엔터를 기준으로 유저를 나눔, 이차원 배열로 유저 정보 저장
for($i=0;$i<count($usernum);$i++){
    $userinfo = explode("||", $usernum[$i]);
    for($j=0;$j<count($userinfo);$j++){  //읽은 파일을 ||를 기준으로 배열 info에 저장, info[0] = 아이디, 1 = 비번, 2 = 이름, 3 = 학년, 4 = 거주지
       $user[$i][$j] = $userinfo[$j];
    }

}

//입력한 id가 파일 id에 이미 있을 경우 flag = 1
for($a=0;$a<count($usernum);$a++){
    if(!strcmp($id, $user[$a][0])){
        $flag = 1;
        break;
    }

}


} 

fclose ($fptr1);
if ( $flag == 1) { 
print "신청하신 아이디는 이미 사용중 입니다 <br> ";
print "다른 아이디를 신청해 주세요<br> ";
print " <a href='./index.php'>
<input type='button' value='로그-인 화면으로'></a> ";  
} 
else { 
$fptr1 = fopen ("./stuinfo.dat", "a");
$line = "{$id}||{$pw}||{$name}||{$grade}||{$address}\n" ; 
fwrite($fptr1, $line, 1024); 
fclose ($fptr1);
print "회원가입이 완료되었습니다<br>" ;
print "회원가입을 환영합니다. <br>" ;
print " <a href='./index.php'>
<input type='button' value='로그인 화면으로'></a> "; 
} 

} 
else { 
print "아이디가 입력되지 않았습니다.<br>" ; 
print " <a href='./index.php'>
<input type='button' value='로그인 화면으로'></a> "; 
} 
?>
