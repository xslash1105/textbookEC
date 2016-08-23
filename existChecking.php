<?php
include("connection.php");
 ?>

<?php
  if(isset($_GET["userCheck"])){
    $userName = $_GET["userCheck"];
    if(strlen($userName)>=8){
      $select = "SELECT * FROM user WHERE username = '$userName' ";
      $selectQuery = mysqli_query($con, $select);
      if(!mysqli_num_rows($selectQuery)>0){
          echo "<span class='available glyphicon glyphicon-ok-sign'><input value='available' id='userAvailable' class='hiddenInput' ></span>";
        }else{
          echo "<span class='unavailable glyphicon glyphicon-remove-sign'><input value='unavailable' id='userAvailable' class='hiddenInput'></span>";
        }
      }elseif(strlen($userName)==0){
        echo "&nbsp";
      }else{
        echo "<span class='unavailable glyphicon glyphicon-remove-sign'><input value='unavailable' id='userAvailable' class='hiddenInput'></span>";
      }
    }

  if(isset($_POST["emailCheck"])){
    $email = $_POST["emailCheck"];
    if(strlen($email)>0){
      $select = "SELECT * FROM user WHERE email = '$email' ";
      $selectQuery = mysqli_query($con, $select);
      if(!mysqli_num_rows($selectQuery)>0){
        echo "<span class='available glyphicon glyphicon-ok-sign'><input value='available' id='emailAvailable' class='hiddenInput'></span>";
      }elseif(mysqli_num_rows($selectQuery)>0){
        echo "<span class='unavailable glyphicon glyphicon-remove-sign'><input value='unavailable' id='emailAvailable' class='hiddenInput'></span>";
      }
    }elseif(strlen($email)==0){
      echo "&nbsp";
    }else{
      echo "<span class='unavailable glyphicon glyphicon-remove-sign'><input value='unavailable' id='emailAvailable' class='hiddenInput'></span>";
    }
  }


  if(isset($_POST["pass1"])){
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    if($pass1 == $pass2){
      echo "<span class='available glyphicon glyphicon-ok-sign'><input value='available' class='passAvailable hiddenInput'></span>";
    }elseif($pass1 != $pass2){
      echo "<span class='unavailable'>パスワードが異なります<input value='unavailable' class='passAvailable hiddenInput'></span>";
    }elseif(strlen($pass1)==0 && strlen($pass2)==0){
      echo "&nbsp;";
    }else{
      echo "<span class='unavailable glyphicon glyphicon-remove-sign'><input value='unavailable' class='passAvailable hiddenInput'></span>";
    }
  }
   ?>

   <!--    settings checking proccess -->

   <?php
   if(isset($_GET["newUserCheck"])){
     $userName = $_GET["newUserCheck"];
     if(strlen($userName)>=8){
       $select = "SELECT * FROM user WHERE username = '$userName' ";
       $selectQuery = mysqli_query($con, $select);
       if(!mysqli_num_rows($selectQuery)>0){
           echo "<span class='available glyphicon glyphicon-ok-sign'><input value='available' id='newUserAvailable2' class='hiddenInput' ></span>";
         }else{
           echo "<span class='unavailable'>既に使用されているユーザー名です<input value='unavailable' id='newUserAvailable2' class='hiddenInput'></span>";
         }
       }else if(strlen($userName)==0){
         echo "<input value='unavailable' id='newUserAvailable2' class='hiddenInput'></span>";
       }else{
         echo "<span class='unavailable glyphicon glyphicon-remove-sign'><input value='unavailable' id='newUserAvailable2' class='hiddenInput'></span>";
       }
     }

     if(isset($_POST["newEmailCheck"])){
       $email = $_POST["newEmailCheck"];
       if(strlen($email)>0){
         $select = "SELECT * FROM user WHERE email = '$email' ";
         $selectQuery = mysqli_query($con, $select);
         if(!mysqli_num_rows($selectQuery)>0){
           echo "<span class='available glyphicon glyphicon-ok-sign'><input value='available' id='newEmailAvailable' class='hiddenInput'></span>";
         }elseif(mysqli_num_rows($selectQuery)>0){
           echo "<span class='unavailable'>既に登録されているメールアドレスです<input value='unavailable' id='newEmailAvailable' class='hiddenInput'></span>";
         }
       }elseif(strlen($email)==0){
         echo "&nbsp";
       }else{
         echo "<span class='unavailable glyphicon glyphicon-remove-sign'><input value='unavailable' id='newEmailAvailable' class='hiddenInput'></span>";
       }
     }

     if(isset($_POST["newpass1"])){
       $pass1 = $_POST["newpass1"];
       $pass2 = $_POST["newpass2"];
       if($pass1 == $pass2){
         echo "<span class='available glyphicon glyphicon-ok-sign'><input value='available' class='passAvailable hiddenInput'></span>";
       }elseif($pass1 != $pass2){
         echo "<span class='unavailable'>パスワードが異なります<input value='unavailable' class='passAvailable hiddenInput'></span>";
       }elseif(strlen($pass1)==0 && strlen($pass2)==0){
         echo "&nbsp;";
       }else{
         echo "<span class='unavailable glyphicon glyphicon-remove-sign'><input value='unavailable' class='passAvailable hiddenInput'></span>";
       }
     }
    ?>
