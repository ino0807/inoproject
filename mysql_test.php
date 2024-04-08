<?php

#(host 주소, 유저 이름, 비밀번호, 데이터베이스명)
$connect = mysqli_connect("localhost","root","1234","test");
 
if($connect->connect_errno){
    echo '[연결실패..] : '.$connect->connect_error.'';
}else{
    echo '[연결성공!]'.'<br>';
}
 
?>