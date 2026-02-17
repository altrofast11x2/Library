<?php
require_once "data/db.php";
require_once "lib.php";
if (!isset($_SESSION['id'])) {
  move('잘못된경로입니다', 'index.php');
  exit;
} else {
  session_destroy();
  move('로그아웃되었습니다', 'login.php');
  exit;
}
