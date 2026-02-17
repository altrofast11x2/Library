<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>document</title>
  <link rel="stylesheet" href="./asset/css/form.css">
</head>
<?php
require_once "data/db.php";
require_once "lib.php";
// 계정 로그인 되어 있으면
if (isset($_SESSION['id'])) {
  move('이미 계정에 로그인 되어있습니다.', 'index.php');
  exit;
}
// 이 페이지 내에서만
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 정보값 받아오기
  $id = $_POST['id'] ?? '';
  $pw = $_POST['pw'] ?? '';
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  // 중복검사
  $user = DB::fetch("SELECT COUNT(*) AS CNT FROM users WHERE id = '$id'");
  if ($user['CNT'] > 0) {
    back('이미 존재하는 아이디입니다');
    exit;
  }
  // 보안
  $salt = uniqid();
  $enc_pw = hash("sha256", $pw . $salt);
  // 위에 중복검사에 안걸리면 아이디 생성 
  DB::exec("INSERT INTO users (`id`,`pw`,`name`,`email`,`salt`) VALUES ('$id','$enc_pw','$name','$email','$salt')");
  move('회원가입성공', 'login.php');
}
?>

<body>
  <form method="post">
    <h2 class="title">SIGN UP</h2>
    <input type="text" name="id" placeholder="아이디">
    <input type="password" name="pw" placeholder="비밀번호">
    <input type="text" name="name" placeholder="닉네임">
    <input type="email" name="email" placeholder="이메일">
    <button type="submit">회원가입</button>
    <a href="login.php">already have an account?</a>
  </form>

</body>

</html>