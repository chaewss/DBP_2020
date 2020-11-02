<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    $query = "SELECT upper(concat(first_name, ' ', last_name)) 'Customer Name', a.address, city.city, coun.country
                FROM customer cus, address a, city city, country coun
                WHERE cus.address_id = a.address_id
                AND a.city_id = city.city_id
                AND city.country_id = coun.country_id
                LIMIT 30
    ";
    $result = mysqli_query($link, $query);
    $cus_info = '';
    while($row = mysqli_fetch_array($result)) {
        $cus_info .= '<tr>';
        $cus_info .= '<td>'.$row['Customer Name'].'</td>';
        $cus_info .= '<td>'.$row['address'].'</td>';
        $cus_info .= '<td>'.$row['city'].'</td>';
        $cus_info .= '<td>'.$row['country'].'</td>';
        $cus_info .= '</tr>';
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
    <h2><a href="index.php">영화 검색</a> | 고객 검색</h2>
    <form action="customer_search.php" method="POST">
        고객 이름 검색
        <input type="text" name="first_name" placeholder="first_name">
        <input type="text" name="last_name" placeholder="last_name">
        <input type="submit" value="Search">
    </form>
    <br>
    <table>
            <tr>
                <th>Customer Name</th>
                <th>address</th>
                <th>city</th>
                <th>country</th>
            </tr>
            <?=$cus_info?>
        </table>
    
    
    
</body>
</html>