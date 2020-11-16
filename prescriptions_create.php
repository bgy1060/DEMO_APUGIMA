<?php
    session_start();

    include_once 'includes/dbh.inc.php';

    $hospital_name = trim($_POST['params_hosptial']);
    $disease_name = trim($_POST['params_disease']);
    $user_id = $_SESSION['userid'];


    $hospital_query = "SELECT hospital_id from hospitals WHERE hospital_name='$hospital_name'";
    $disease_query = "SELECT disease_id from diseases WHERE disease_name='$disease_name'";

    $hospital_result = mysqli_query($conn, $hospital_query);
    $disease_result = mysqli_query($conn, $disease_query);

    $hospital_row = mysqli_fetch_array($hospital_result);
    $hospital_id = $hospital_row['hospital_id'];

    $disease_row=mysqli_fetch_array($disease_result);
    $disease_id = $disease_row['disease_id'];

    $sql = "
    INSERT INTO prescriptions
        (uid, hospital_id, disease_id, memo, prescription_date, prescription_price, doctor_name)
        VALUES(
            {$user_id},
            {$hospital_id},
            {$disease_id},
            '{$_POST['params_memo']}',
            '{$_POST['params_date']}',
            '{$_POST['params_price']}',
            '{$_POST['params_doctor']}'
        )
    ";

    $result = mysqli_query($conn, $sql);
    if($result === false){
        alert("Error occurred.");
        history.back();
    }
    else {
    ?>
        <script>
                location.replace("./prescriptions.php");
        </script>

<?php
        }


?>
