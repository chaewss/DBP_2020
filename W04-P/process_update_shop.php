<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'time' => mysqli_real_escape_string($link, $_POST['time']),
    'phone' => mysqli_real_escape_string($link, $_POST['phone'])
  );

  $query = "
    UPDATE shop
      SET
        name = '{$filtered['name']}',
        time = '{$filtered['time']}',
        phone = '{$filtered['phone']}'
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      header('Location:shop.php?id='.$filtered['id']);
  }
