<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $query = "SELECT * FROM shop";
  $result = mysqli_query($link, $query);
  $shop_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'name' => htmlspecialchars($row['name']),
      'time' => htmlspecialchars($row['time']),
      'phone' => htmlspecialchars($row['phone'])
    );
      $shop_info .= '<tr>';
      $shop_info .= '<td>'.$filtered['id'].'</td>';
      $shop_info .= '<td>'.$filtered['name'].'</td>';
      $shop_info .= '<td>'.$filtered['time'].'</td>';
      $shop_info .= '<td>'.$filtered['phone'].'</td>';
      $shop_info .= '<td><a href="shop.php?id='.$filtered['id'].'">update</a></td>';
      $shop_info .= '<td>
        <form action="process_delete_shop.php" method="post">
          <input type="hidden" name="id" value="'.$filtered['id'].'">
          <input type="submit" value="delete">
        </form></td>
      ';
      $shop_info .= '</tr>';
  };

  $escaped = array(
    'name' => '',
    'time' => '',
    'phone' => ''
  );

  $label_submit = 'Create shop';
  $form_action = 'process_create_shop.php';
  $form_id = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      settype($filtered_id, 'integer');
      $query = "SELECT * FROM shop WHERE id = {$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $escaped['name'] = htmlspecialchars($row['name']);
      $escaped['time'] = htmlspecialchars($row['time']);
      $escaped['phone'] = htmlspecialchars($row['phone']);

      $label_submit = "Update shop";
      $form_action = 'process_update_shop.php';
      $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
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
  <p><a href="index.php">lush_bodyspray</a></p>
  <table border="1">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>time</th>
      <th>phone</th>
      <th>update</th>
    </tr>
    <tr>
      <?=$shop_info?>
    </tr>
  </table>
  <br>
  <form action="<?=$form_action?>" method="post">
    <?=$form_id?>
    <lable for="fname">name:</lable><br>
    <input type="text" id="name" name="name" placeholder="name" value="<?=$escaped['name']?>"><br>
    <lable for="dname">time:</lable><br>
    <input type="text" id="time" name="time" placeholder="time" value="<?=$escaped['time']?>"><br>
    <lable for="lname">phone:</lable><br>
    <input type="text" id="phone" name="phone" placeholder="phone" value="<?=$escaped['phone']?>"><br><br>
    <input type="submit" value="<?=$label_submit?>">
  </form>
</body>
</html>
