<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_test";

    $lucky_codes = array();
    $add_points = array();
    $user = array();

    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }





    //ข้อ1.1
    echo "1.1<br>-";

    $sql = "SELECT COUNT(id) as total FROM users";
    $result = $conn->query($sql);

    echo $result->fetch_assoc()["total"]."<br>";





    //ข้อ1.2
    echo "1.2<br>-";

    // $sql = "SELECT COUNT( DISTINCT user_id ) as total FROM lucky_codes";
    $sql = "SELECT DISTINCT user_id FROM lucky_codes";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $lucky_codes[] = $row["user_id"];
    
    // echo $result->fetch_assoc()["total"]."<br>";    
    echo count($lucky_codes)."<br>";





    //ข้อ1.3
    echo "1.3<br>-";

    // $sql = "SELECT COUNT( DISTINCT user_id ) as total FROM add_points";
    $sql = "SELECT DISTINCT user_id FROM add_points";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $add_points[] = $row["user_id"];

    // echo $result->fetch_assoc()["total"]."<br>";
    echo count($add_points)."<br>";





    //ข้อ1.4
    echo "1.4<br>-";

    // $sql = "SELECT COUNT(add_points.user_id) AS total FROM add_points INNER JOIN lucky_codes ON add_points.user_id = lucky_codes.user_id";
    // $result = $conn->query($sql);

    $user = array_intersect($add_points,$lucky_codes);

    // echo $result->fetch_assoc()["total"]."<br>";
    echo count($user)."<br>";





    //ข้อ1.5
    echo "1.5<br>-";

    $active_user = count($lucky_codes) - count($user) + count($add_points);
    echo $active_user;





    $conn->close();
?>