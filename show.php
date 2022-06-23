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

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Show User</title>
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
          <a class="nav-link mx-2 active" aria-current="page" href="#">Home</a>
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

        </div>
        <?php if ($user) { ?>
            <h3>User Information</h3>
            <h3>Name : <?= $user['name'] ?></h3>
            <h3>Email : <?= $user['email'] ?></h3>
        <?php } else { ?>
            <h1>User Not Found.</h1>
        <?php } ?>
        <a href="./index.php" class="btn btn-primary">Back to List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>