<?php
    include_once 'includes/dbh.inc.php';
    
    $hospital_id = "SELECT hospital_id from hospitals WHERE hospital_name=$_POST['params_hosptial']";
    $disease_id = "SELECT disease_id from diseases WHERE disease_name=$_POST['params_disease']";

    $sql = "
    INSERT INTO prescriptions
        (uid, hospital_id, disease_id, prescriptions_date, prescription_price, memo, doctor_name)
        VALUES(
            '{$_POST['uid']}',
            '{$hospital_id},
            '{$disease_id},
            '{$_POST['memo']}',
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