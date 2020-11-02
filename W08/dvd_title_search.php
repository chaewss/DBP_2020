<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if (isset($_POST['title'])) {
        $filtered_title = mysqli_real_escape_string($link, $_POST['title']);
        $query = "SELECT upper(concat(first_name, ' ', last_name)) 'Actor Name', b.description
                    FROM film_actor f, actor a, film b
                    WHERE f.actor_id = a.actor_id
                    AND f.film_id = b.film_id
                    AND b.title='{$filtered_title}'
        ";
    }
    $result = mysqli_query($link, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0) { 
        header('Location: dvd_select.php');
    }
    $row = mysqli_fetch_array($result);
    $description = '<h3>'.$row['description'].'</h3>';
    $dvd_info = '';
    while($row = mysqli_fetch_array($result)) {
        $dvd_info .= '<tr>';
        $dvd_info .= '<td>'.$row['Actor Name'].'</td>';
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
            width: 50%;
            margin: auto;
            text-align: center;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
    <h2><a href="index.php">채원 DVD</a></a><a href="dvd_select.php"> | 영화 검색</a> | 영화 정보 조회</h2>
    <h2><?=$filtered_title?></h2>
    <?=$description?>
    <table border="1">
        <tr>
            <th>Actor on the Film</th>
        </tr>
        <?=$dvd_info?>
    </table>
    
</body>
</html>