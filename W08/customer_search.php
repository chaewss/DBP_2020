<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
        $filtered_first_name = mysqli_real_escape_string($link, $_POST['first_name']);
        $filtered_last_name = mysqli_real_escape_string($link, $_POST['last_name']);
        $query = "SELECT upper(concat(first_name, ' ', last_name)) 'Customer Name', a.address, city.city, coun.country
                    FROM customer cus, address a, city city, country coun
                    WHERE cus.address_id = a.address_id
                    AND a.city_id = city.city_id
                    AND city.country_id = coun.country_id
                    AND cus.first_name = '{$filtered_first_name}'
                    AND cus.last_name = '{$filtered_last_name}'
        ";
    } 
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);
    if ($count == 0) { 
        header('Location: customer_info.php');
    }
    $row = mysqli_fetch_array($result);
    $cus_info = '';
    $cus_info .= '<tr>';
    $cus_info .= '<td>'.$row['Customer Name'].'</td>';
    $cus_info .= '<td>'.$row['address'].'</td>';
    $cus_info .= '<td>'.$row['city'].'</td>';
    $cus_info .= '<td>'.$row['country'].'</td>';
    $cus_info .= '</tr>';
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
        h2{
            text-align: center;
        }
        h3{
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
    <h2><a href="index.php">채원 DVD</a><a href="customer_info.php">| 고객 검색</a>| 고객 이름 조회</h2>
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