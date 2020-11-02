<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');

    if (mysqli_connect_error()) {
        echo "Failed to connect to MariaDB: ";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $filtered_rating = mysqli_real_escape_string($link, $_GET['rating']);
    $filtered_category = mysqli_real_escape_string($link, $_GET['category']);

    $query = "SELECT f.title, f.rating, c.name
                FROM film f, film_category film_c, category c
                WHERE f.film_id = film_c.film_id
                AND film_c.category_id = c.category_id
                AND f.rating = \"{$filtered_rating}\"
                AND c.name = \"{$filtered_category}\"
    ";

    $result = mysqli_query($link, $query);
    $article = '';
    while($row = mysqli_fetch_array($result)) {
        $article .= '<tr><td>';
        $article .= $row["title"];
        $article .= '</td><td>';
        $article .= $row["rating"];
        $article .= '</td><td>';
        $article .= $row["name"];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 영화 등급 & 카테고리 검색 </title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
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
        <h2><a href="index.php">채원 DVD</a> | 영화 등급 & 카테고리 검색</a></h2>
        <table>
            <tr>
                <th>title</th>
                <th>rating</th>
                <th>category name</th>
            </tr>
            <?=$article?>
        </table>
</html>
