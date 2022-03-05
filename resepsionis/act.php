<?php 

    require_once '../connection.php';

    if (isset($_GET['act']) && isset($_GET['id'])) {
        if ($_GET['act'] == 'set_payed') {
           $sql = "UPDATE orders SET payed_status = '" . 1 . "' WHERE id = " . $_GET['id'];

           $result = $conn->query($sql);

           if ($result) {
               header('Location: resepsionis_panel.php?resp=success');
           }

        }
    }

?>