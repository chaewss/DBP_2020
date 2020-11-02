<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
        $filtered_first_name = mysqli_real_escape_string($link, $_POST['first_name']);
        $filtered_last_name = mysqli_real_escape_string($link, $_POST['last_name']);
        $query = "SELECT upper(concat(first_name, ' ', last_name)) 'Actor Name', b.title, b.description
                    FROM film_actor f, actor a, film b
                    WHERE f.actor_id = a.actor_id
                    AND f.film_id = b.film_id
                    AND a.first_name = '{$filtered_first_name}'
                    AND a.last_name = '{$filtered_last_name}'
        ";
    }
    $result = mysqli_query($link, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0) { 
        header('Location: dvd_select.php');
    }
    $row = mysqli_fetch_array($result);
    $actor_name = '<h2>'.$row['Actor Name'].'</h2>';
    $dvd_info = '';
    while($row = mysqli_fetch_array($result)) {
        $dvd_info .= '<tr>';
        $dvd_info .= '<td>'.$row['title'].'</td>';
        $dvd_info .= '<td>'.$row['description'].'</td>';
        $dvd_info .= '</tr>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <title> 채원 DVD </title>
    <style>
        head, body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        h2, h3{
            text-align: center;
        }
        table{
            width: 100%;
            text-align: center;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
    <h2><a href="index.php">채원 DVD</a><a href="dvd_select.php"> | 영화 검색</a> | 배우 정보 조회</h2>
    <h2><?=$actor_name?></h2>
    <table border="1">
        <tr>
            <th>title</th>
            <th>description</th>
        </tr>
        <?=$dvd_info?>
    </table>
    
</body>
</html>