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
                                        alert("로그인 되었습니다.");
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
                                alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                                history.back();
                        </script>
        <?php
                }
 
        }
 
                else{
        ?>      <script>
                        alert("계정이 없습니다. 회원가입을 해주세요.");
                        history.back();
                </script>
<?php
        }
  
    
?>