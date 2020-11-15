
<?php
    session_start();

    include_once 'includes/dbh.inc.php';

    $drug_name = trim($_POST['drug_name']);
    $disease_name = trim($_POST['disease_name']);
    $hospital_grade = (int)trim($_POST['hospital_grade']);
    $user_id = $_SESSION['userid'];


    $medicine_query = "SELECT medicine_id from medicines WHERE medicine_name='$drug_name'";
    $disease_query = "SELECT disease_id from diseases WHERE disease_name='$disease_name'";

    $medicine_result = mysqli_query($conn, $medicine_query);
    $disease_result = mysqli_query($conn, $disease_query);

    
    if(isset($medicine_result)and isset($disease_result) ){
        $medicine_row = mysqli_fetch_array($medicine_result);
        $medicine_id = $medicine_row['medicine_id'];

        $disease_row=mysqli_fetch_array($disease_result);
        $disease_id = (int)$disease_row['disease_id'];

        $sql = "
        INSERT INTO medicine_reviews
            (uid, medicine_id,disease_id, memo, rate)
            VALUES(
                {$user_id},
                '{$medicine_id}',
                {$disease_id},
                '{$_POST['params_memo']}',
                {$hospital_grade}
            )
        ";

        $result = mysqli_query($conn, $sql);
        if($result === false){
?>
        <script>
            alert("There was a problem with the save process.");
            history.back();
        </script>
<?php
        } 
        else {
?>
            <script>
                alert('Finished appointment');
                location.replace("./medicines.php");
            </script>

<?php
        }}
    else{
?>
            <script>
                alert('Please enter the correct value.');
                location.replace("./medicines_write.php");
            </script>
<?php
    }    
?>

    

  
  