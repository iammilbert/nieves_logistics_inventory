<?php 
include '../config.php';

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT expenses_file FROM expenses WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    while($info = mysqli_fetch_array($result)){
        ?>

        <embed type="application/pdf" src="expensesFiles/<?php echo $info['expenses_file']; ?>" width="100%" height="100%"></embed>

        <?php
    }
}

?>



