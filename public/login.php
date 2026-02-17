<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./asset/css/form.css">
</head>
<?php
require_once "data/db.php";
require_once "lib.php";
// 이미 계정이 로그인되어 있다면 메인페이지로 추방
if (!empty($_SESSION['id'])) {
  move('이미 계정에 로그인 되어있습니다.', 'index.php');
  exit;
}
// 이 페이지 내에서만
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 정보값 받아오기
  $id = $_POST['id'] ?? '';
  $pw = $_POST['pw'] ?? '';
  // 아이디 검사
  $user = DB::fetch("SELECT * FROM users WHERE id = '$id'");
  if (!$user) {
    back('존재하지 않는 아이디입니다');
    exit;
  }
  // 보안
  $salt = $user['salt'];
  $enc_pw = hash("sha256", $pw . $salt);
  // 위에 중복검사에 안걸리면 확인
  if ($enc_pw === $user['pw']) {
    // 값 대입
    $_SESSION['id'] = $id;
    // 이동
    move('로그인성공', 'index.php');
    exit;
  } else {
    back('아이디 또는 비밀번호가 틀렸습니다');
    exit;
  }
}
?>

<body>
  <form method="post">
    <h2 class="title"><a href="index.php">STARLIGHT LIBRARY</a></h2>
    <h2 class="title">LOGIN</h2>
    <input type="text" name="id" placeholder="아이디">
    <input type="password" name="pw" placeholder="비밀번호">
    <button type="submit">로그인</button>
    <a href="register.php">doesn't have an account?</a>
  </form>
</body>

</html>