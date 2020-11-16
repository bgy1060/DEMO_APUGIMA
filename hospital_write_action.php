
<?php
    session_start();

    include_once 'includes/dbh.inc.php';

    $hospital_name = trim($_POST['params_hosptial']);
    $hospital_grade = (int)trim($_POST['hospital_grade']);
    $user_id = $_SESSION['userid'];


    $hospital_query = "SELECT hospital_id from hospitals WHERE hospital_name='$hospital_name'";

    $hospital_result = mysqli_query($conn, $hospital_query);
    
    if(mysqli_num_rows($hospital_result)==1) {
        $hospital_row = mysqli_fetch_array($hospital_result);
        $hospital_id = $hospital_row['hospital_id'];

        $sql = "
        INSERT INTO hospital_reviews
            (uid, hospital_id, memo, rate)
            VALUES(
                {$user_id},
                {$hospital_id},
                '{$_POST['params_memo']}',
                {$hospital_grade}
            )
        ";

        $result = mysqli_query($conn, $sql);
        if($result === false){
            alert("There was a problem with the save process.");
            history.back();
        } 
        else {
?>
            <script>
                alert('Finished appointment');
                location.replace("./hospitals.php");
            </script>

<?php
        }}
    else{
?>
            <script>
                alert('Please enter the correct value.');
                location.replace("./hospitals_write.php");
            </script>
<?php
    }    
?>

    

  
  