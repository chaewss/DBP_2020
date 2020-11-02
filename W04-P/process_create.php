<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $filtered = array(
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'information' => mysqli_real_escape_string($link, $_POST['information']),
    'shop_id' => mysqli_real_escape_string($link, $_POST['shop_id'])
  );
  $query = "
  INSERT INTO lush_bodyspray
  (name, information, created, shop_id)
  VALUES (
    '{$filtered['name']}',
    '{$filtered['information']}',
    now(),
    '{$filtered['shop_id']}'
  )";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
