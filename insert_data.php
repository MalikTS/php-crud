<?php

    require_once 'dbcon.php';

    if ($_POST["add_student"]) {
        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $age = $_POST["age"];

        if ($f_name == "" || empty($f_name)) {
            header('location:index.php?message=Name cannot be empty!');
        } else {
            $query = "insert into `students` (`first_name`, `last_name`, `age`) values ('$f_name', '$l_name', '$age')";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Add error student" . mysqli_error($connection));
            } else {
                header('location:index.php?insert_msg=Add student successful!');
            }
        }
    }

?>
