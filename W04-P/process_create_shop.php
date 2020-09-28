<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $filtered = array(
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'time' => mysqli_real_escape_string($link, $_POST['time']),
    'phone' => mysqli_real_escape_string($link, $_POST['phone'])
  );
  $query = "
  INSERT INTO shop
  (name, time, phone)
  VALUES (
    '{$filtered['name']}',
    '{$filtered['time']}',
    '{$filtered['phone']}'
  )";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      header('Location: shop.php');
  }
