
<html> 
<head> 
<title> 학생 정보 수정하기 </title> 
<meta charset="utf-8"/>
</head> 
<body> 
<h2>아래의 내용중에 수정/삭제 내용을 띄어쓰기에 주의하여 한 줄씩 작성해주세요.</h2>
<form method="post" action="modefy.php"><pre>
변경하고자하는 내용 : <input type="text" name="text1" size=10> <br>
변경할 내용(삭제시 공백) : <input type="text" name="a_d_text1" size=10> <br>
<input type="submit" value="수정">&nbsp; <input type="reset" value="다시쓰기"><hr> 

</form>

</body> 
</html> 

<?php 
$fptr2 = fopen("./stuinfo.dat","r");
$line2 = fread($fptr2, 1024);
$stu = explode(",", $line2); //띄어쓰기를 기준으로 배열에 저장

for($i=0;$i<count($stu);$i++){ // 화면에 출력
    print"{$stu[$i]}<br>";
}
fclose ($fptr2);

?>

