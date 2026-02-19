<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php require_once "header.php" ?>
<style>
  #library {
    width: 100%;
    height: 220vh;
  }

  .p>ul {
    display: flex;
    justify-content: space-evenly;
  }

  .p>ul>li {
    object-fit: cover;
    width: 200px;
    height: 100%;
    margin: 25px 0;
  }

  .p>ul>li>a>img {
    border-radius: 10px;
  }

  .p>ul>li>ul {
    margin: 7px 0;
  }

  .p>ul>li>ul>li:nth-child(1) {
    margin: 3px 0;
    width: 100%;
    font-size: 1.1em;
    color: #494040;
    text-align: center;
  }

  .p>ul>li>ul>li>button {
    width: 100%;
    height: 30px;
    border: 1px solid #333;
    margin: 10px 0;
    border-radius: 15px;
  }

  .p>ul>li>ul>li>button:hover {
    color: #f3f3f3;
    background-color: #494040;
    transition: ease-in-out .2s;
  }
</style>

<body>
  <div class="slideContainer">
    <ul class="slide">
      <li>
        <h2 class="title">Starlight Library</h2>
        <p>Enjoy a wide variety of books</p>
      </li>
      <li>
        <h2 class="title">A Space Where Knowledge Shines</h2>
        <p>Discover literature, self-development, and children's books all in one place</p>
      </li>
      <li>
        <h2 class="title">A Comfortable Reading Environment</h2>
        <p>Spend relaxing moments in a quiet and cozy space</p>
      </li>
      <li>
        <h2 class="title">Cultural Programs Together</h2>
        <p>Experience book clubs, author talks, and various events</p>
      </li>
      <li>
        <h2 class="title">A New World Inside Books</h2>
        <p>Endless imagination and discovery unfold with every page</p>
      </li>
      <li>
        <h2 class="title">Sharing Information and Inspiration</h2>
        <p>Fill your tomorrow with diverse knowledge</p>
      </li>
      <li>
        <h2 class="title">Grow with Books</h2>
        <p>The joy of expanding your knowledge and broadening your mind</p>
      </li>
      <li>
        <h2 class="title">Starlight Library</h2>
        <p>Enjoy a wide variety of books</p>
      </li>
    </ul>
    <div class="down"><a href="#library">&darr;</a></div>
  </div>
  <main>
    <section id="library" class="section">
      <div class="container">
        <h2 class="s_title"><span>서점</span>BOOKSTORE</h2>
        <article>
          <div class="p">
            <ul>
              <?php $sql = DB::fetchAll("SELECT * FROM products LIMIT 0,5");
              foreach ($sql as $data) { ?>
                <li>
                  <a href="view.php?idx=<?= $data['idx'] ?>"><img src="<?= $data['img'] ?>" alt="./asset/iamges/upload/num.jpg"></a>
                  <ul>
                    <li><strong><?= $data['title'] ?></strong></li>
                    <li>가격: <span class="price"><?= number_format($data['price']) . "원" ?></span></li>
                    <li>
                      대출 가능 권수:
                      <span>
                        <?= $data['rental'] == 0 ? "<span style='color:#c71717;'>대출불가</span>" : $data['rental']; ?>
                      </span>
                    </li>
                    <li><button>책 대여</button></li>
                  </ul>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="p">
            <ul>
              <?php $sql = DB::fetchAll("SELECT * FROM products LIMIT 5,5");
              foreach ($sql as $data) { ?>
                <li>
                  <a href="view.php?idx=<?= $data['idx'] ?>"><img src="<?= $data['img'] ?>" alt="./asset/iamges/upload/num.jpg"></a>
                  <ul>
                    <li><strong><?= $data['title'] ?></strong></li>
                    <li>가격: <span class="price"><?= number_format($data['price']) . "원" ?></span></li>
                    <li>
                      대출 가능 권수:
                      <span>
                        <?= $data['rental'] == 0 ? "<span style='color:#c71717;'>대출불가</span>" : $data['rental']; ?>
                      </span>
                    </li>
                    <li><button>책 대여</button></li>
                  </ul>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="p">
            <ul>
              <?php $sql = DB::fetchAll("SELECT * FROM products LIMIT 10,5");
              foreach ($sql as $data) { ?>
                <li>
                  <a href="view.php?idx=<?= $data['idx'] ?>"><img src="<?= $data['img'] ?>" alt="./asset/iamges/upload/num.jpg"></a>
                  <ul>
                    <li><strong><?= $data['title'] ?></strong></li>
                    <li>가격: <span class="price"><?= number_format($data['price']) . "원" ?></span></li>
                    <li>
                      대출 가능 권수:
                      <span>
                        <?= $data['rental'] == 0 ? "<span style='color:#c71717;'>대출불가</span>" : $data['rental']; ?>
                      </span>
                    </li>
                    <li><button>책 대여</button></li>
                  </ul>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="p">
            <ul>
              <?php $sql = DB::fetchAll("SELECT * FROM products LIMIT 15,5");
              foreach ($sql as $data) { ?>
                <li>
                  <a href="view.php?idx=<?= $data['idx'] ?>"><img src="<?= $data['img'] ?>" alt="./asset/iamges/upload/num.jpg"></a>
                  <ul>
                    <li><strong><?= $data['title'] ?></strong></li>
                    <li>가격: <span class="price"><?= number_format($data['price']) . "원" ?></span></li>
                    <li>
                      대출 가능 권수:
                      <span>
                        <?= $data['rental'] == 0 ? "<span style='color:#c71717;'>대출불가</span>" : $data['rental']; ?>
                      </span>
                    </li>
                    <li><button>책 대여</button></li>
                  </ul>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="p">
            <ul>
              <?php $sql = DB::fetchAll("SELECT * FROM products LIMIT 20,5");
              foreach ($sql as $data) { ?>
                <li>
                  <a href="view.php?idx=<?= $data['idx'] ?>"><img src="<?= $data['img'] ?>" alt="./asset/iamges/upload/num.jpg"></a>
                  <ul>
                    <li><strong><?= $data['title'] ?></strong></li>
                    <li>가격: <span class="price"><?= number_format($data['price']) . "원" ?></span></li>
                    <li>
                      대출 가능 권수:
                      <span>
                        <?= $data['rental'] == 0 ? "<span style='color:#c71717;'>대출불가</span>" : $data['rental']; ?>
                      </span>
                    </li>
                    <li><button>책 대여</button></li>
                  </ul>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="p">
            <ul>
              <?php $sql = DB::fetchAll("SELECT * FROM products LIMIT 25,5");
              foreach ($sql as $data) { ?>
                <li>
                  <a href="view.php?idx=<?= $data['idx'] ?>"><img src="<?= $data['img'] ?>" alt="./asset/iamges/upload/num.jpg"></a>
                  <ul>
                    <li><strong><?= $data['title'] ?></strong></li>
                    <li>가격: <span class="price"><?= number_format($data['price']) . "원" ?></span></li>
                    <li>
                      대출 가능 권수:
                      <span>
                        <?= $data['rental'] == 0 ? "<span style='color:#c71717;'>대출불가</span>" : $data['rental']; ?>
                      </span>
                    </li>
                    <li><button>책 대여</button></li>
                  </ul>
                </li>
              <?php } ?>
            </ul>
          </div>
        </article>
      </div>
    </section>
  </main>
</body>
<?php require_once "footer.php" ?>

</html>