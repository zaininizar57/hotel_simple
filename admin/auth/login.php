<?php 

    require_once '../../connection.php';

    if (isset($_POST['login'])) {

        $data = array([]);

        $data['username'] = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $data['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        
        $error = '';

        foreach ($data as $key => $dt) {
            
            if ($dt == '') {
                $error .= $key . ' tidak boleh kosong,';
            }
            
        }

        var_dump($error);
        
        if (strlen($error) > 0) {
            header('Location: ?error_login=' . $error);
        }else {
            
            $sql = "SELECT * FROM users WHERE nama_lengkap = '" . $data['username'] . "' AND role_id = 1";
            $result = $conn->query($sql);
            if (strlen(mysqli_error($conn)) > 0) {
                header('Location: ?error_login=error:500');
            }else if(mysqli_num_rows($result) < 1){
                header('Location: ?error_login=admin tidak di temukan');
            }else{

                $result = $result->fetch_assoc();

                $password = $result['password'];

                if (password_verify($data['password'], $password)) {
                    session_start();
                    $_SESSION['auth'] = $result;
                    var_dump($_SESSION['auth']);
                    header('Location: ../admin_panel.php');
                }

            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Admin | Login</title>
</head>

<body>


    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="flex-column align-items-center row d-flex justify-content-center py-4 px-4">
            <?php 
                    
                    if (isset($_GET['error_login'])) {
                        ?>

            <div class="px-4 py-2 rounded shadow" style="width: 32rem; background-color: #ff8589;">

                <?php
                            $error_login = $_GET['error_login'];
        
                            $error_messages = explode(',', $error_login);
        
                            foreach($error_messages as $err){
                                echo '<div class="text-white capitalize" style="font-size: 12px;">' . $err . '</div>';
                            }
        
                            echo '<script>
                                    isOpenModalRegister = true;
                                </script>';
        
                            ?>
            </div>

            <?php
        
                        }
                    
                    ?>
            <div class="card p-0" style="width: 32rem;">
                <div class="card-header text-center">
                    Admin | Login
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button name="login" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/bootstrap.min.js"></script>

</body>

</html>