<?php
    include_once "./Admin.php"; 
    if(isset($_POST['send'])){
        $res = [
            'username' => $_POST['username'],
            'password' => md5($_POST['password'])
        ];
        $login = Admin::login($res);
        if(count($login) > 0){
            $_SESSION['username'] = $_POST['username'];
            // header("location:./w3-template/subindex.php");
            header("location:./index.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="text-center">Login here</blockquote>
                        <form action = "login.php" method = "POST">
                            <div class="form-group">
                                <label for="" class="m-0 p-0 small text-muted">username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="m-0 p-0 small text-muted">password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="send" class="btn w-100 btn-block mt-4 btn-success ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>