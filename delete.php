<?php
session_start();
extract($_POST); 
echo("<script> alert('회원이 탈퇴되었습니다.');</script>");
$info = $id."||".$pw."||".$name;


$wptr1 = fopen ("./stuinfo.dat", "a");  
$line1 = fread($wptr1, 1024); 
$user= explode("||", $line); //user에 id, pw, name
//회원탈퇴기능을 어떻게하는지 잘모르겠어요..



fclose($wptr1);
 



session_destroy();





echo("<script>location.replace('./index.php');</script>");
?>