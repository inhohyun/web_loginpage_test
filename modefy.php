

<?php 
extract($_POST);
$fptr2 = fopen("./stuinfo.dat","r");
$line2 = fread($fptr2, 1024);
$stu = explode(",", $line2); //띄어쓰기를 기준으로 배열에 저장


for($i=0;$i<count($stu);$i++){ // 수정할 내용을 작성된 내용대로 배열에 수정
    if($stu[$i] == $text1){  // $i가 0일때만 참이라고 인식하는 오류
      $stu[$i] = $a_d_text1; // 해당 부분을 작성된 내용대로 수정
        break;
    }
   
}
//,와 /n가 같이 있어서 ,로 구분하면 두 번째 줄부터 인식이 안되는 오류 해결 : 엔터키를 지움



fclose ($fptr2);

$fptr2 = fopen("./stuinfo.dat","w"); // 수정된 배열 내용대로 파일 수정
for($i=0;$i<count($stu);$i++){
 
        fwrite($fptr2, $stu[$i].","); // $stu[$i]의 변화없이 마지막에 , 만 추가되는 오류
    
}

//$stu[0]은 수정 잘되는데 다른게 수정이 안됨
echo("<script>location.replace('./welcome.php');</script>");
fclose ($fptr2);
print " <a href='./logout.php'>
<input type='button' value='로그아웃'></a> ";  

?>
