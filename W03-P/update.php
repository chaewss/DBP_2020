<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $query = "SELECT * FROM lush_bodyspray";
  $result = mysqli_query($link, $query);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['name']}</a></li>";
  }

  $article = array(
    'name' => 'WE BELIEVE LUSH LIFE',
    'information' => '신선한 과일과 채소, 최상의 에센셜 오일, 안전한 원료를 사용하여 효과적인 제품을 만듭니다.<br>
                      최소한의 포장과 보존제를 사용하여 직접 손으로 제품을 만들며 실수를 하거나, 모든 것을 잃고서도 다시 시작할 수 있음을 믿습니다.<br>
                      동물실험을 하지 않는 회사와 거래하고 인체에 직접 테스트해 안전한 제품을 만들 수 있다고 믿습니다.<br>
                      제품이 가진 올바른 가치를 제공하고 고객이 항상 옳다는 사실을 믿습니다.<br>
                      모든 사람이 전 세계 어디든 자유롭게 이동하며, 새로운 삶의 터전을 마련할 수 있다고 믿습니다.'
  );

  if (isset($_GET['id'])) {
      $query = "SELECT * FROM lush_bodyspray WHERE id={$_GET['id']}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
      'name' => $row['name'],
      'information' => $row['information']
    );
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> LUSH bodyspray </title>
</head>
<body>
  <h1><a href="index.php"> LUSH bodyspray </a></h1>
  <ol> <?= $list ?></ol>
  <form action="process_update.php" method="POST">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <p><input type="text" name="name" placeholder="name" value="<?=$article['name']?>"></p>
    <p><textarea name="information" placeholder="information"><?=$article['information']?></textarea></p>
    <p><input type="submit"</p>
  </form>
</body>
</html>
