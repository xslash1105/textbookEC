<?php
if(isset($_POST["faculty"])){
    $faculty = $_POST["faculty"];
    if($faculty=="humanities"){
      ?>
      <option value="none" disabled selected>学科を選択してください</option>
      <option value="christian">キリスト教学科</option>
      <option value="anthropology">人類文化学科</option>
      <option value="psychology">心理人間学科</option>
      <option value="japanese">日本文化学科</option>
      <?php
    }elseif ($faculty=="foreign") {
      ?>
      <option value="none" disabled selected>学科を選択してください</option>
      <option value="BandA">英米学科</option>
      <option value="SandL">スペイン・ラテンアメリカ学科</option>
      <option value="french">フランス学科</option>
      <option value="german">ドイツ学科</option>
      <option value="asian">アジア学科</option>
      <?php
    }elseif($faculty=="economics"){
      ?>
      <option value="none" disabled selected>学科を選択してください</option>
      <option value="economics">経済学科</option>
      <?php
    }elseif($faculty=="business"){
      ?>
      <option value="none" disabled selected>学科を選択してください</option>
      <option value="business">経営学科</option>
      <?php
    }elseif ($faculty=="law") {
      ?>
      <option value="none" disabled selected>学科を選択してください</option>
      <option value="law">法律学科</option>
      <?php
    }elseif ($faculty=="policy") {
      ?>
      <option value="none" disabled selected>学科を選択してください</option>
      <option value="policy">総合政策学科</option>
      <?php
    }elseif ($faculty=="engineering") {
      ?>
      <option value="none" disabled selected>学科を選択してください</option>
      <option value="mechatronics">システム数理学科</option>
      <option value="software">ソフトウェア工学科</option>
      <option value="SandMscience">機械電子制御工学</option>
      <?php
    }elseif($faculty=="junior"){
      ?>
      <option value="none" disabled selected>学科を選択してください</option>
      <option value="english">英語科</option>
      <?php
    }else{
      ?>
      <option disabled selected>学科を選択してください</option>
      <?php
    }
  }
 ?>

 <?php
 if(isset($_POST["facultyJap"])){
     $faculty = $_POST["facultyJap"];
     if($faculty=="人文学部"){
       ?>
       <option value="none" disabled selected>学科を選択してください</option>
       <option value="キリスト教学科">キリスト教学科</option>
       <option value="人類文化学科">人類文化学科</option>
       <option value="心理人間学科">心理人間学科</option>
       <option value="日本文化学科">日本文化学科</option>
       <?php
     }elseif ($faculty=="外国語学部") {
       ?>
       <option value="none" disabled selected>学科を選択してください</option>
       <option value="英米学科">英米学科</option>
       <option value="スペイン・ラテンアメリカ学科">スペイン・ラテンアメリカ学科</option>
       <option value="フランス学科">フランス学科</option>
       <option value="ドイツ学科">ドイツ学科</option>
       <option value="アジア学科">アジア学科</option>
       <?php
     }elseif($faculty=="経済学部"){
       ?>
       <option value="none" disabled selected>学科を選択してください</option>
       <option value="経済学科">経済学科</option>
       <?php
     }elseif($faculty=="経営学部"){
       ?>
       <option value="none" disabled selected>学科を選択してください</option>
       <option value="経営学科">経営学科</option>
       <?php
     }elseif ($faculty=="法学部") {
       ?>
       <option value="none" disabled selected>学科を選択してください</option>
       <option value="法律学科">法律学科</option>
       <?php
     }elseif ($faculty=="総合政策学部") {
       ?>
       <option value="none" disabled selected>学科を選択してください</option>
       <option value="総合政策学科">総合政策学科</option>
       <?php
     }elseif ($faculty=="理工学部") {
       ?>
       <option value="none" disabled selected>学科を選択してください</option>
       <option value="システム数理学科">システム数理学科</option>
       <option value="ソフトウェア工学科">ソフトウェア工学科</option>
       <option value="機械電子制御工学">機械電子制御工学</option>
       <?php
     }elseif($faculty=="短期大学部"){
       ?>
       <option value="none" disabled selected>学科を選択してください</option>
       <option value="英語科">英語科</option>
       <?php
     }else{
       ?>
       <option disabled selected>学科を選択してください</option>
       <?php
     }
   }
  ?>
