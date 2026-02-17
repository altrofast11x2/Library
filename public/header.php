<?php
require_once "data/db.php";
require_once "lib.php"
?>
<link rel="stylesheet" href="./asset/css/style.css">
<?php

?>
<header class="site_header">
  <div class="container">
    <ul class="gnb">
      <?php if (isset($_SESSION['id']) && $_SESSION['id'] === 'admin') {
        echo
        "<li>
         <a href='admin.php'>관리자</a>
        </li>
        <li>
         <a href='sub01.php'>서점둘러보기</a>
        </li>";
      } else {
        echo
        "<li>
          <a href='sub01.php'>서점둘러보기</a>
        </li>";
      }
      ?>
    </ul>
    <h1 class="logo"><a href="index.php">STARLIGHT LIBRARY</a></h1>
    <ul class="gnb">
      <?php
      if (isset($_SESSION['id'])) {
        echo
        "
        <li>
          <a href='logout.php' onclick='return confirm(\"정말 로그아웃 하시겠습니까?\")' style='color:#c71717;'>로그아웃</a>
        </li>
        <li>
          <a href='mypage.php'>안녕하세요 {$_SESSION['id']}</a>
        </li>
        ";
      } else {
        echo
        "<li>
          <a href='login.php'>로그인/회원가입</a>
        </li>";
      }
      ?>
    </ul>
  </div>

</header>