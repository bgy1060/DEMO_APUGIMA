
<?php
    session_start();

    include_once 'includes/dbh.inc.php';

    $medicine_name = trim($_POST['drug_name']);
    $disease_name = trim($_POST['disease_name']);
    $medicine_grade = (int)trim($_POST['medicine_grade']);
    $review_id = (int)trim($_POST['review_id']);
    $user_id = $_SESSION['userid'];

    $medicine_query = "SELECT medicine_id from medicines WHERE medicine_name='$medicine_name'";
    $disease_query = "SELECT disease_id from diseases WHERE disease_name='$disease_name'";

    $medicine_result = mysqli_query($conn, $medicine_query);
    $disease_result = mysqli_query($conn, $disease_query);

    $medicine_row = mysqli_fetch_array($medicine_result);
    $medicine_id = $medicine_row['medicine_id'];

    $disease_row=mysqli_fetch_array($disease_result);
    $disease_id = (int)$disease_row['disease_id'];


    $medicine_update_query = "UPDATE medicine_reviews 
                        SET rate = $medicine_grade, uid = $user_id, memo = '{$_POST['params_memo']}', medicine_id=$medicine_id, disease_id=$disease_id
                        WHERE medicine_review_id = $review_id";

    $medicine_result = mysqli_query($conn, $medicine_update_query);
    if(!$medicine_result){
        alert("There was a problem with the save process.");
        history.back();
     }else
     ?>
     {
        <script>
                alert('Finished update');
                location.replace("./myreviewm.php");
        </script>
     }