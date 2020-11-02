<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <title> 채원 DVD </title>
    <style>
    * { 
        font-family: Consolas, monospace;
        text-align: center;
    }
    </style>
</head>
<body>
<!-- http://192.168.112.130/W07/index.php  -->
<!-- http://192.168.112.130/W08/index.php  -->
    <h1> 채원 DVD </h1>
    <a> (1) 영화 검색 </a>
    <input type="button" value="Search" onClick="location.href='dvd_select.php'"><br>
    <br>
    <form action="film_info.php" method="GET">
        (2) 영화 등급, 카테고리 <br>
        <select name="rating">
            <option value="PG">PG</option>
            <option value="G">G</option>
            <option value="NC-17">NC-17</option>
            <option value="PG-13">PG-13</option>
            <option value="R">R</option>
        </select>
        <select name="category">
            <option value="Action">Action</option>
            <option value="Animation">Animation</option>
            <option value="Children">Children</option>
            <option value="Classics">Classics</option>
            <option value="Comedy">Comedy</option>
            <option value="Documentary">Documentary</option>
            <option value="Drama">Drama</option>
            <option value="Family">Family</option>
            <option value="Foreign">Foreign</option>
            <option value="Games">Games</option>
            <option value="Horror">Horror</option>
            <option value="Music">Music</option>
            <option value="New">New</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Sports">Sports</option>
            <option value="Travel">Travel</option>
        </select>
        <input type="submit" value="Search">
    </form>
    <br>
    <a> (3) 고객 정보 </a>
    <input type="button" value="Search" onClick="location.href='customer_info.php'"><br>
    
</body>
</html>