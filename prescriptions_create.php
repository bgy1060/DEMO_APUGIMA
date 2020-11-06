<?php
	include_once 'includes/dbh.inc.php';

    $sql = "
    INSERT INTO prescriptions
        (uid, prescriptions_date, prescription_price, doctor_name)
        VALUES(
            '{$_POST['uid']}',
            '{$_POST['params_date']}',
            '{$_POST['params_price']}',
            '{$_POST['params_doctor']}'
        )
    ";
    $result = mysqli_query($conn, $sql);
    if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
    } else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
    }
?>