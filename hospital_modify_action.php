
<?php
    session_start();

    include_once 'includes/dbh.inc.php';

    $hospital_name = trim($_POST['params_hosptial']);
    $hospital_grade = (int)trim($_POST['hospital_grade']);
    $review_id = (int)trim($_POST['review_id']);
    $user_id = $_SESSION['userid'];


    $hospital_query = "SELECT hospital_id from hospitals WHERE hospital_name='$hospital_name'";

    $hospital_result = mysqli_query($conn, $hospital_query);

    $hospital_row = mysqli_fetch_array($hospital_result);
    $hospital_id = $hospital_row['hospital_id'];


    $hospital_update_query = "UPDATE hospital_reviews 
                        SET rate = $hospital_grade, uid = $user_id, memo = '{$_POST['params_memo']}', hospital_id=$hospital_id
                        WHERE hospital_review_id = $review_id";

    $hospital_result = mysqli_query($conn, $hospital_update_query);
    if(!$hospital_result){
        alert("There was a problem with the save process.");
        history.back();
     }else
     ?>
     {
        <script>
                alert('Finished update');
                location.replace("./myreviewh.php");
        </script>
     }