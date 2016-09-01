<?php

$conn = mysqli_connect("115.28.93.210", "root", "admin" );
if (!$conn) {
	die ( '数据库连接异常! ErrorInfo:' . mysql_error () );
}
$db = mysqli_select_db($conn,"xDriver");