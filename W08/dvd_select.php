<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    $query = "SELECT upper(concat(first_name, ' ', last_name)) 'Actor Name' FROM actor LIMIT 30";
    $result = mysqli_query($link, $query);
    $dvd_actor_info = '';
    while($row = mysqli_fetch_array($result)) {
        $dvd_actor_info .= '<tr>';
        $dvd_actor_info .= '<td>'.$row['Actor Name'].'</td>';
        $dvd_actor_info .= '</tr>';
    }

    $query = "SELECT title FROM film LIMIT 30";
    $result = mysqli_query($link, $query);
    $dvd_title_info = '';
    while($row = mysqli_fetch_array($result)) {
        $dvd_title_info .= '<tr>';
        $dvd_title_info .= '<td>'.$row['title'].'</td>';
        $dvd_title_info .= '</tr>';
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
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
    <h2><a href="index.php">영화 검색</a> | 배우별 영화 조회</h2>
    <form action="dvd_actor_search.php" method="POST">
        배우 출연 영화 검색(배우 이름 입력)
        <input type="text" name="first_name" placeholder="first_name">
        <input type="text" name="last_name" placeholder="last_name">
        <input type="submit" value="Search">
    </form>
    <form action="dvd_title_search.php" method="POST">
        영화 출연 배우 검색(영화 입력)
        <input type="text" name="title" placeholder="title">
        <input type="submit" value="Search">
    </form>
    <br>
    <div style="width:30%; float:left;">
        <table border="1">
            <tr>
                <th>Actor Name</th>
            </tr>
            <?=$dvd_actor_info?>
        </table>
    </div>
    <div style="width:70%; float:right;">
        <table border="1">
            <tr>
                <th>title</th>
            </tr>
            <?=$dvd_title_info?>
        </table>
    </div>
    
    
    
</body>
</html>