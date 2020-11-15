
<?php
 
        session_start();
 
        include_once 'includes/dbh.inc.php';
 
        //입력 받은 id와 password
        $id=$_GET['id'];
        $pw=$_GET['pw'];
 
        //아이디가 있는지 검사
        $query = "SELECT * FROM users WHERE user_id='$id'";
        $result = $conn->query($query);
 
        //아이디가 있다면 비밀번호 검사
        if(mysqli_num_rows($result)==1) {
 
                $row=mysqli_fetch_assoc($result);
                //비밀번호가 맞다면 세션 생성
                if(trim($row['user_password'])==$pw){
                        $_SESSION['userid']=$row['uid'];
                        if(isset($_SESSION['userid'])){
                        ?>      <script>
                                        alert("Login was successful.");
                                        location.replace("./index.php");
                                </script>
<?php
                        }
                        else{
                                echo "session fail";
                        }
                }
 
                else {
        ?>              <script>
                                alert("ID or password is wrong.");
                                history.back();
                        </script>
        <?php
                }
 
        }
 
                else{
?>              <script>
                        alert("You do not have an account on this site. Please register as a member first.");
                        history.back();
                </script>
<?php
        }
  
    
?>


