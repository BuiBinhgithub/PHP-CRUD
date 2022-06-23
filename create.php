<?php
include_once "./User.php";

$errors = [];

// xu li create
if (isset($_POST['create'])) {
    $errors = validate($_POST, ['name', 'email', 'password']);
    if (count($errors) <= 0) {
        $dataCreate = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
        ];

        $userCreate = User::create($dataCreate);
        $_SESSION['message'] = 'Create success';
      
    }
} else {
    $errors = [];
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
<nav class="navbar navbar-expand-lg navbar-light bg-info p-3">
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
            <h1> Create User </h1>
        </div>
        <div>
            <form method="post" name="myForm" id='create-form'>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="text-danger">
                        <?php echo isset($errors['email']) ? $errors['email'] : "" ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                    <div id="nameHelp" class="text-danger">
                        <?php echo isset($errors['name']) ? $errors['name'] : "" ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <div id="passwordHelp" class="text-danger">
                        <?php echo isset($errors['password']) ? $errors['password'] : "" ?>
                    </div>
                </div>

                <button id="btnSubmit" type="submit" class="btn btn-primary" name="create">Create</button>
            </form>
        </div>
    </div>
<!-- <script src="//cdn.jsbs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
<script>
       
  $(document).ready( function(){

    $("#create-form").submit(function(e){
      e.preventDefault();

      var email = $('#email').val();
      var name = $('#name').val();
      var password = $('#password').val();

      if(email == '' || name == '' || password == '' )
      {
        Swal.fire(
          'Error',
          'Please fill up the Bank',
          'error'
        )
      }else{
        $.ajax({
          url: 'insert.php',
          type:'POST',
          data: $(this).serialize(),
          cache: false,
          success: function(data){
            Swal.fire(
              'Good job!',
              'created!',
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