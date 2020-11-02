<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'information' => mysqli_real_escape_string($link, $_POST['information'])
  );
  $query = "
    UPDATE lush_bodyspray
      SET
        name = '{$filtered['name']}',
        information = '{$filtered['information']}'
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
