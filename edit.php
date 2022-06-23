<?php
include_once "./User.php";

$id = null;
$user =  null;
if ($_GET['id']) {
    $id = $_GET['id'];
    $user = User::find($id);
} else {
    header("location:./index.php");
}
$errors = [];

// xu li update
if (isset($_POST['edit'])) {
    $errors = validate($_POST, ['name', 'email', 'password']);
    if (count($errors) <= 0) {
        $dataUpdate = [
            'id' => $user['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
        ];


        $userCreate = User::update($dataUpdate);
        $_SESSION['message'] = 'Update success';
        $errors = [];
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create User</title>
</head>

<body>
<nav class="navbar-nav me-auto mb-2 mb-lg-0 navbar navbar-expand-lg navbar-light bg-info p-3">
  <div class="container-fluid">
    <i class="fs-4 fab fa-bootstrap"></i>
    <a class="navbar-brand p-2" href="#">CRUD-PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link mx-2 active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Company
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Blog</a></li>
            <li><a class="dropdown-item" href="#">About Us</a></li>
            <li><a class="dropdown-item" href="#">Contact us</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
        <li class="nav-item mx-2">
          <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-google-plus-square"></i></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-facebook-square"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
        <div>
            <h1> Edit User </h1>
        </div>
        <div>
            <form method="post" id='editForm'>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" id="femail" aria-describedby="emailHelp">
                    <div id="emailHelp" class="text-danger">
                        <?php echo isset($errors['email']) ? $errors['email'] : "" ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" name="name" value=" <?= $user['name'] ?>" class="form-control" id="fname">
                    <div id="emailHelp" class="text-danger">
                        <?php echo isset($errors['name']) ? $errors['name'] : "" ?>
                    </div>
                </div>

                <button type="submit" id="btn-update" class="btn btn-primary updateUser" name="edit" data-userId='<?= $id ?>'>Update</button>
                <a href="./index.php" class="btn btn-primary">Back to List</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
      $(document).ready(function(){
        $("#editForm").submit(function(e){
          e.preventDefault();

        var fEmail = $('#femail').val();
        var fName = $('#fname').val();

        if(fEmail == '' || fName == '')
        {
          Swal.fire(
            'Error',
            'Please fill up the Bank',
            'error'
          )
        }else{
          let userId = $('#btn-update').attr('data-userId'); 
          console.log(userId);
          $.ajax({
            url: 'update.php',
            type:'POST',
            data: $(this).serialize() + '&id='+ userId,
            cache: false,
            success: function(data){
              Swal.fire(
                'Good job!',
                'Updated!',
                'success'
              ).then(() => {
                window.location.href = './index.php';
              })
            }
          })
        }
      })
    })

    </script>
</body>

</html>