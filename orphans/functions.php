<?php
include("../db.php");

function fill_adopt_form($f_name, $l_name,$email, $ID_Number,$phone)
{
    $stmt = $conn->prepare('INSERT INTO adoption (f_name, l_name, email, ID_Number,phone)  VALUES( ?,?,?,?,?)');
    $stmt->execute([$f_name, $l_name,$email, $ID_Number,$phone]);

    ?>
    <script>
        toastr.success('Added successfull');
    </script>
    <?php
}

?>