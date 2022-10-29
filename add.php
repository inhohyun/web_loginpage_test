<?php 
extract($_POST);
$fptr2 = fopen("./stuinfo.dat","r");
$line2 = fread($fptr2, 1024);
$stu = explode(",", $line2); 

array_push($stu, $text2);


fclose ($fptr2);

$fptr2 = fopen("./stuinfo.dat","w");
for($i=0;$i<count($stu);$i++){
 
        fwrite($fptr2, $stu[$i].","); 
}

fclose ($fptr2);
echo("<script>location.replace('./welcome.php');</script>");
?>
