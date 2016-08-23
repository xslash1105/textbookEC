<?php include("menuIn.php"); ?>

<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/styleIn.css">

    <script src="js/main.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/formAjax.js"></script>

  </head>
  <body>
    <div id="backgroundContainer" style="background-image: url('img/background.jpg')">
      <div id="insertFormContainer">
        <form action="" method="post" enctype="multipart/form-data">
            <table>
              <tr>
                <th colspan="4">
                  <h2 class="formTitle"  id="insertTitle">商品登録画面</h2>
                </th>
              </tr>
              <tr>
                <th>
                  タイトル:
                </th>
                <td>
                  <input type="text" placeholder="textbook title" name="title" class="insertinput" required>
                </td>
                <th>
                  本の状態:
                </th>
                <td>
                  <select name="state" required>
                    <option disabled selected>状態を選んでください</option>
                    <option value="非常に良い">非常に良い</option>
                    <option value="良い">良い</option>
                    <option value="多少傷あり">多少傷あり</option>
                    <option value="多少傷あり">悪い</option>
                    <option value="非常に悪い">非常に悪い</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>
                  作者:
                </th>
                <td>
                  <input type="text" placeholder="author" name="author" class="insertinput" required>
                </td>
                <th>
                  出版社:
                </th>
                <td>
                  <input type="text" placeholder="publiser" name="publisher" class="insertinput" required>
                </td>
              </tr>
              <tr>
                <th>
                  価格(最高9999円):
                </th>
                <td>
                  <input type="text" placeholder="price" name="price" class="insertinput" id="priceInsert" maxlength="4" min="3" required>
                </td>
                <th>
                  会員用価格:
                </th>
                <td id="discountInsert">
                  <input type="text" placeholder="価格を入力したら計算されます" name="discount" class="insertinput" readonly required>
                </td>
              </tr>
              <tr>
                <th>
                  授業名:
                </th>
                <td>
                  <input type="text" placeholder="Class name" name="class" class="insertinput" required>
                </td>
                <th>
                  教授名:
                </th>
                <td>
                  <input type="text" placeholder="professor" name="professor" class="insertinput" required>
                </td>
              </tr>
              <tr>
                <th>
                  授業の学部:
                </th>
                <td>
                  <select name="faculty" id="insertfaculty" required>
                    <option value="none" disabled selected>学部を選択してください</option>
                    <option value="人文学部">人文学部</option>
                    <option value="外国語学部">外国語学部</option>
                    <option value="経済学部">経済学部</option>
                    <option value="経営学部">経営学部</option>
                    <option value="法学部">法学部</option>
                    <option value="総合政策学部">総合政策学部</option>
                    <option value="理工学部">理工学部</option>
                    <option value="短期大学部">短期大学部</option>
                  </select>
                </td>
                 <th>
                   授業の学科:
                 </th>
                 <td>
                   <select name="department" id="insertdepartment" class="selectInput" required>
                     <option value="none" disabled selected>学科を選択してください</option>
                   </select>
                 </td>
               </tr>
               <tr>
                 <th>
                   出展者:
                 </th>
                 <td>
                   <input type="text" value="<?php echo $username ?>" name="exhibitor" class="insertinput" readonly required>
                 </td>
                   <th>
                     表紙の画像:
                   </th>
                   <td>
                     <input type="file" name="image" class="insertinput" required>
                   </td>
               </tr>
               <tr>
                 <th>
                   本の説明文:
                 </th>
                 <td colspan="3">
                   <textarea name="explanation" rows="5" cols="100" required></textarea>
                 </td>
               </tr>
               <tr>
                <th colspan="4">
                   <center><button id="insertButton" class="insertButton" type="submit" name="submit">登録</button><button id="resetButton" class="insertButton" type="reset">リセット</button></center>
                 </th>
               </tr>
            </table>
        </form>
      </div>
    </div>
<?php
if(isset($_POST["submit"])){
  $title = $_POST["title"];
  $state = $_POST["state"];
  $author = $_POST["author"];
  $publisher = $_POST["publisher"];
  $price = $_POST["price"];
  $class = $_POST["class"];
  $professor = $_POST["professor"];
  $faculty = $_POST["faculty"];
  $department = $_POST["department"];
  $exhibitor = $_POST["exhibitor"];
  $image = $_FILES["image"]["name"];
  $imagetmp = $_FILES["image"]["tmp_name"];
  $newImage = str_replace(" ", "_", $image);
  $folder = "upload/";
  $finalImage = $folder.$username.$image;
  $content = $_POST["explanation"];

  if(move_uploaded_file($imagetmp, $finalImage)){
    $insert = "INSERT INTO textbooks (title, author, publisher, price, state, explanation, image, class, professor, faculty, department, exhibitor) VALUES ('$title', '$author', '$publisher', '$price',  '$state', '$content',  '$finalImage', '$class', '$professor', '$faculty', '$department', '$exhibitor')";
    $insertQuery = mysqli_query($con, $insert);
    if($insertQuery){
      ?>
      <script>
      alert("ok");
      </script>
      <?php
    }else{
      ?>
      <script>
      alert("faild");
      </script>
      <?php
    }
  }

} ?>

  </body>
</html>
