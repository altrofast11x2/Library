<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <title>관리자 페이지</title>
  <link rel="stylesheet" href="./asset/css/style.css">
  <style>
    body {
      width: 100%;
      min-height: 100vh;
    }

    .admin_wrap {
      margin: 150px auto;
      padding: 50px 0;
    }

    .admin_section {
      margin-bottom: 80px;
    }

    .admin_section h2 {
      font-size: 2em;
      margin-bottom: 20px;
      color: #494040;
      font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
    }

    /* ===== 핵심 수정 부분 ===== */

    .admin_table {
      table-layout: fixed;
      /* 컬럼 고정 */
      width: 100%;
    }

    .admin_table th,
    .admin_table td {
      border: 1px solid #ccc;
      padding: 12px;
      text-align: center;
      white-space: normal;
      /* 줄바꿈 허용 */
      word-break: break-word;
      /* 긴 문자열 자동 줄바꿈 */
    }

    .admin_table th {
      background: #e0e0e0;
    }

    /* ===== 사용자 테이블 컬럼 비율 ===== */
    .admin_section:first-of-type th:nth-child(1) {
      width: 6%;
    }

    .admin_section:first-of-type th:nth-child(2) {
      width: 15%;
    }

    .admin_section:first-of-type th:nth-child(3) {
      width: 15%;
    }

    .admin_section:first-of-type th:nth-child(4) {
      width: 14%;
    }

    .admin_section:first-of-type th:nth-child(5) {
      width: 25%;
    }

    .admin_section:first-of-type th:nth-child(6) {
      width: 15%;
    }

    /* ===== 도서 테이블 컬럼 비율 ===== */
    .admin_section:last-of-type th:nth-child(1) {
      width: 8%;
    }

    .admin_section:last-of-type th:nth-child(2) {
      width: 32%;
    }

    .admin_section:last-of-type th:nth-child(3) {
      width: 20%;
    }

    .admin_section:last-of-type th:nth-child(4) {
      width: 20%;
    }

    .admin_section:last-of-type th:nth-child(5) {
      width: 20%;
    }

    .action_btn {
      padding: 6px 12px;
      border: 1px solid #494040;
      margin: 2px;
      transition: 0.3s;
    }

    .action_btn:hover {
      background: #494040;
      color: white;
    }

    .book_form {
      margin-top: 30px;
      display: flex;
      gap: 10px;
      justify-content: center;
    }

    .book_form input {
      border: 1px solid #ccc;
      padding: 8px;
      width: 200px;
    }

    .book_form button {
      border: 1px solid #494040;
      padding: 8px 20px;
      transition: 0.3s;
    }

    .book_form button:hover {
      background: #494040;
      color: white;
    }
  </style>
</head>
<?php
require_once "header.php";
$sql = DB::fetchAll("SELECT * FROM  users"); ?>
<?php $sql2 = DB::fetchAll("SELECT * FROM  products"); ?>

<body>
  <div class="admin_wrap container">

    <div class="admin_section">
      <h2>사용자 조회</h2>
      <table class="admin_table">
        <thead>
          <tr>
            <th>번호</th>
            <th>아이디</th>
            <th>암호화 된 비밀번호</th>
            <th>이름</th>
            <th>이메일</th>
            <th>가입일</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sql as $data) { ?>
            <tr>
              <td><?= $data['idx'] ?></td>
              <td><?= $data['id'] ?></td>
              <td><?= $data['pw'] ?></td>
              <td><?= $data['name'] ?></td>
              <td><?= $data['email'] ?></td>
              <td><?= $data['date'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="admin_section">
      <h2>도서 관리</h2>

      <table class="admin_table">
        <thead>
          <tr>
            <th>번호</th>
            <th>책 제목</th>
            <th>가격</th>
            <th>할인</th>
            <th>수량</th>
            <th>관리</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $type = $_GET['type'] ?? 'DESC';
          $page = $_GET['page'] ?? 1;
          $scale = 6;
          $start = ($page - 1) * $scale;
          $count = DB::fetch("SELECT COUNT(*) AS cnt FROM products");
          $cnt = $count['cnt'];
          $total_page = ceil($cnt / $scale);
          if ($total_page == 0) $total_page == 1;
          foreach ($sql2 as $data) { ?>
            <tr>
              <td><?= $data['idx'] ?></td>
              <td><?= $data['title'] ?></td>
              <td><?= number_format($data['price']) . "원" ?></td>
              <td><?= number_format($data['dis']) . "원" ?></td>
              <td><?= $data['rental'] ?></td>
              <td>
                <button class="action_btn">수정</button>
                <button class="action_btn">삭제</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="arrows" style="display: flex;">
        <div class="left">&lt;</div>
        <?= $start / $scale ?>
        <div class="left">&gt;</div>
      </div>
      <form class="book_form">
        <input type="text" placeholder="책 제목">
        <input type="text" placeholder="저자">
        <input type="text" placeholder="출판사">
        <button type="submit">추가</button>
      </form>

    </div>

  </div>

</body>

</html>