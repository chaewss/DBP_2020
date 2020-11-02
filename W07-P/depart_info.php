<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

    if (mysqli_connect_error()) {
        echo "Failed to connect to MariaDB: ";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $filtered_dept_name = mysqli_real_escape_string($link, $_GET['department']);
    $filtered_number = mysqli_real_escape_string($link, $_GET['number']);

    $query = "
        SELECT first_name, last_name, dept_name
        FROM dept_emp
        INNER JOIN employees on employees.emp_no=dept_emp.emp_no
        INNER JOIN departments on departments.dept_no=dept_emp.dept_no
        WHERE departments.dept_name = \"{$filtered_dept_name}\"
        LIMIT {$filtered_number}
    ";

    $result = mysqli_query($link, $query);
    $article = '';
    while($row = mysqli_fetch_array($result)) {
        $article .= '<tr><td>';
        $article .= $row["first_name"];
        $article .= '</td><td>';
        $article .= $row["last_name"];
        $article .= '</td><td>';
        $article .= $row["dept_name"];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 부서 정보</title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 100%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
        <h2><a href="index.php">직원 관리 시스템</a> | 부서 정보</a></h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>dept_name</th>
            </tr>
            <?=$article?>
        </table>
</html>
