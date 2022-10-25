<doctype html> 
<html> 
<head> <title> PHP 파일 IO </title> 
<meta charset= "UTF-8"/>
</head> 
<body> 
<?php
session_start();
extract($_POST); 
if ( strcmp($id, "")) { //아이디가 입력되었을 때
$flag = 0; 
$fptr1 = fopen ("./stuinfo.dat", "r"); 
while ( ($flag == 0) && ($line = fread($fptr1, 1024))) { 
//아이디, 비밀번호가 있으면 flag = 1
$usernum = explode("\n", $line); // 엔터를 기준으로 유저를 나눔, 이차원 배열로 유저 정보 저장
for($i=0;$i<count($usernum);$i++){
    $userinfo = explode("||", $usernum[$i]);
    for($j=0;$j<count($userinfo);$j++){  
       $user[$i][$j] = $userinfo[$j];
    }

}

for($i=0;$i<count($usernum);$i++){
      if($user[$i][0] == $id){
        $flag = 1;
        break;
      }

   


  
}
for($i=0;$i<count($usernum);$i++){

        if($user[$i][1] == $pw){      
        $flag = 1;
        break;
        }
 
   

  
}
  

} 
fclose ($fptr1);
if ( $flag == 1) { //아이디가 파일에 있는 경우
 
        echo("<script>location.replace('./welcome.php');</script>");  

} 
else { //아이디가 파일에 없는 경우
        print " 로그인 정보를 확인해 주세요<br>" ;
        print " <a href='./index.php'>
        <input type='button' value='로그인 화면으로'></a> ";
} 
} 

else { 
print "아이디가 입력되지 않았습니다.<br>" ; //아이디가 제대로 입력되지 않은 경우
print " <a href='./index.php'>
<input type='button' value='로그인 화면으로'></a> "; 
} 
?>
