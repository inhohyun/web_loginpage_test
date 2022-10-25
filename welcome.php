<!DOCTYPE html>
<meta charset="utf-8" />
<?php
session_start();
$fptr1 = fopen ("./stuinfo.dat", "r");
$line = fread($fptr1, 1024);
$usernum = explode("\n", $line); // 엔터를 기준으로 유저를 나눔, 이차원 배열로 유저 정보 저장
for($i=0;$i<count($usernum);$i++){
    $userinfo = explode("||", $usernum[$i]);
    for($j=0;$j<count($userinfo);$j++){  //읽은 파일을 ||를 기준으로 배열 info에 저장, info[0] = 아이디, 1 = 비번, 2 = 이름, 3 = 학년, 4 = 거주지
       $user[$i][$j] = $userinfo[$j];
    }

}

for($i=0;$i<count($usernum);$i++){
    for($j=0;$j<count($userinfo);$j++){  //읽은 파일을 ||를 기준으로 배열 info에 저장, info[0] = 아이디, 1 = 비번, 2 = 이름, 3 = 학년, 4 = 거주지
       echo $user[$i][$j];
    }
    echo"\n";
}
fclose ($fptr1);
echo "<p><a href='logout.php'>로그아웃</a></p>";
echo "<p><a href='delete.php'>회원탈퇴</a></p>";
?>