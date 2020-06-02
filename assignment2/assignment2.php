<?php
    $data = array(3, 0, 2, 5, -1, 4, 1);
    $i = 1;
    for ($i = 0; $i < count($data); $i++) {
        for ($x = $i + 1; $x < count($data); $x++) {
            if ($data[$x] <= $data[$i]) {
                $temp = $data[$x];
                $data[$x] = $data[$i];
                $data[$i] = $temp;
            }
        }
    }
    // sort($data);
    foreach ($data as $val) {
        echo $val . "<br>";
    }

?>