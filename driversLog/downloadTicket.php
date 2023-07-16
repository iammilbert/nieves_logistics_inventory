<?php 
include '../config.php';

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT ticket FROM ticket WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    while($info = mysqli_fetch_array($result)){
        ?>

        <embed type="application/pdf" src="tickets/<?php echo $info['ticket']; ?>" width="100%" height="100%"></embed>

        <?php
    }
}

?>



