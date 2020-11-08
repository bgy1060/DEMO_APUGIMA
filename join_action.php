<?php
 
 include_once 'includes/dbh.inc.php';
 
 
        $id=$_GET['id'];
        $pw=$_GET['pw'];
        $name=$_GET['name'];
 
 
        //입력받은 데이터를 DB에 저장
        $query = "insert into users (user_id, user_name, user_password) values ('$id', '$name', '$pw')";
 
        $result = $conn->query($query);

        //저장이 됬다면 (result = true) 가입 완료
        if($result) {
        ?>      <script>
                alert('가입 되었습니다.');
                location.replace("./login.php");
                </script>
 
<?php   }
        else{
?>              <script>
                        
                        alert("fail");
                </script>
<?php   }
 
        mysqli_close($conn);
?>
 


