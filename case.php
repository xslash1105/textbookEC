<?php
if($faculty=="人文学部"){
  $facultySQL = "Humanities";
}else if($faculty=="経済学部"){
  $facultySQL = "Economics";
}else if($faculty=="法学部"){
  $facultySQL = "law";
}else if($faculty=="外国語学部"){
  $facultySQL = "ForeignStudies";
}else if($faculty=="経営学部"){
  $facultySQL = "BusinessAdministration";
}else if($faculty=="情報理工学部"){
  $facultySQL = "ScienceAndEngineering";
}else if($faculty=="短期大学部"){
  $facultySQL = "JuniorCollege";
}else if($faculty=="総合政策学部"){
  $facultySQL = "PolicyStudies";
}

switch ($department) {
  case 'ChristianStudies':
    $departmentSQL = "キリスト教学科";
    break;
  case 'AnthropologyAndPhilosophy':
    $departmentSQL = "人類文化学科";
    break;
  case 'PsychologyAndHumanRelations':
    $departmentSQL = "心理人間学科";
    break;
  case 'JapaneseStudies':
    $departmentSQL = "日本文化学科";
    break;
  case 'Economics':
    $departmentSQL = "経済学科";
    break;
  case 'Law':
    $departmentSQL = "法律学科";
    break;
  case 'BritishAndAmericanStudies':
    $departmentSQL = "英米学科";
    break;
  case 'SpanishAndLatinAmericanStudies':
    $departmentSQL = "スペイン・ラテンアメリカ学科";
    break;
  case 'FrenchStudies':
    $departmentSQL = "フランス学科";
    break;
  case 'GermanStudies':
    $departmentSQL = "ドイツ学科";
    break;
  case 'AsianStudies':
    $departmentSQL = "アジア学科";
    break;
  case 'BusinessAdministration':
    $departmentSQL = "経営学科";
    break;
  case 'Mechatronics':
    $departmentSQL = "機械電子制御工学科";
    break;
  case 'SoftwareEngineering':
    $departmentSQL = "ソフトウェア工学科";
    break;
  case 'SystemAndMathmaticalScience':
    $departmentSQL = "システム数理学科";
    break;
  case 'English':
    $departmentSQL = "英語科";
    break;
  case 'PolicyStudies':
    $departmentSQL = "総合政策学科";
    break;
    default:
    $departmentSQL = "学科";
    break;
} ?>
