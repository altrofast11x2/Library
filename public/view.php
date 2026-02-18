<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <title>도서 상세보기</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Noto Sans KR', sans-serif;
    }

    body {
      background-color: #f4f6f9;
    }

    .container2 {
      width: 1000px;
      margin: 40px auto;
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      display: flex;
      gap: 40px;
    }

    .book-image {
      width: 300px;
    }

    .book-image img {
      width: 100%;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .book-info {
      flex: 1;
    }

    .book-info h1 {
      font-size: 28px;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    .info-row {
      margin-bottom: 15px;
      font-size: 16px;
    }

    .info-label {
      font-weight: bold;
      display: inline-block;
      width: 70px;
      color: #555;
    }

    .description {
      margin-top: 25px;
      line-height: 1.6;
      background: #f9fafc;
      padding: 20px;
      border-radius: 8px;
    }

    .button-group {
      margin-top: 30px;
    }

    .btn {
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 14px;
      margin-right: 10px;
      transition: 0.3s;
    }

    .btn-back {
      background-color: #95a5a6;
      color: white;
    }

    .btn-back:hover {
      background-color: #7f8c8d;
    }

    .btn-edit {
      background-color: #3498db;
      color: white;
    }

    .btn-edit:hover {
      background-color: #2980b9;
    }

    .btn-delete {
      background-color: #e74c3c;
      color: white;
    }

    .btn-delete:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<?php require_once "header.php"; ?>

<body>


  <div class="container2" style="margin-top: 250px;">
    <?php
    $idx = $_GET['idx'] ?? '';
    $sql = DB::fetchAll("SELECT * FROM products WHERE idx = '$idx'");
    foreach ($sql as $data) { ?>
      <div class="book-image">
        <img src="<?= $data['img'] ?>" alt="">
      </div>

      <div class="book-info">
        <h1><?= $data['title'] ?></h1>

        <div class="info-row">
          <span class="info-label">등록일</span><?= $data['date'] ?>
        </div>

        <div class="description">
          <?= $data['des'] ?>
        </div>
      <?php } ?>
      <div class="button-group">
        <a href="index.php" class="btn btn-back">돌아가기</a>
      </div>
      </div>
  </div>

</body>

</html>