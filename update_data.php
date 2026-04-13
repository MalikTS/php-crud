<?php include("header.php"); ?>
<?php include("dbcon.php");  ?>

<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        require_once 'dbcon.php';

        $query = "select * from `students` where `id` = '$id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            echo "Ошибка при изменении данных" . mysqli_error($connection);
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    }

?>

<?php

    if (isset($_POST['update_student'])) {
        if (isset($_GET["id_new"])) {
            $id_new = $_GET["id_new"];
        }

        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $age = $_POST["age"];

        $query = "update `students` set `first_Name` = '$f_name', `last_Name` = '$l_name', `age` = '$age' where `id` = '$id_new'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Update error student <br>" . mysqli_error($connection));
        } else {
            header('location:index.php?update_msg=Update student successful!');
        }
    }

?>


<form action="update_data.php?id_new=<?php echo $id ?>" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name="f_name" value="<?php echo $row['first_Name'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" name="l_name" value="<?php echo $row['last_Name'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" value="<?php echo $row['age'] ?>" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" name="update_student" value="Add">
                </div>
            </div>
        </div>
    </div>
</form>


<?php include("footer.php"); ?>
