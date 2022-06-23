<?php
    include_once "./User.php";
    $users = User::all();
    
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./pagination/footer.css">
    <link type="text/css" rel="stylesheet" href="./pagination/simplePagination.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CURD User</title>
</head>
<body>
<div class="wrapper">
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
            <a class="nav-link mx-2 active" aria-current="page" href="">Home</a>
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
        
        <form>
              <a href="./Logout.php" class="btn btn-danger" >log out</a> <br>
        </form>
      </div>
    </div>
  </nav>

  <div class="container" style = "height: 400px">
      <div>
          <h1 style="text-align:center;"> User list </h1>

      </div>
      <?php if(isset($_SESSION['message'])){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <p>
            <?php echo($_SESSION['message']); unset($_SESSION['message']) ?>
          </p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <a href="./create.php" class="btn btn-primary" style="text-align:center;">Create</a> <br> <br>
    

      <div>
          <?php if (count($users) > 0) { ?>
              <table class="table table-bordered border-info">
                  <thead>
                  <tr>
                    <th scope="col" >#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                  </thead>  
                  <tbody>
                  <?php foreach ($users as $key => $user) { ?>
                      <tr class='user'>
                          <th scope="row"><?= $key + 1 ?></th>
                          <td ><?php echo $user['name'] ?></td>
                          <td ><?php echo $user['email'] ?></td>
                          <td class="d-flex">
                              <a href="./show.php?id=<?= $user['id'] ?>" class="btn btn-info"> Show </a>
                              <a href="./edit.php?id=<?= $user['id'] ?>" class="btn btn-warning ms-2"> Edit </a>
                              <form action="./delete.php" method="post" id="formDelete-<?=$user['id']?>">
                                  <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                  <a type="button" method ="POST"  class="btn btn-danger btn-delete text-center ms-2 deleteUser" id="<?=$user['id']?>"> Delete </a>
                              </form>
                          </td>
                      </tr>
                  <?php } ?>
                  </tbody>
              </table><br>
          <?php }else { ?>
              <h2>No Data.</h2>
          <?php } ?>
        <div  id="index-table"></div>
      </div>
  </div>
  <!-- footer -->
  <footer class="footer">
    <div class="footer__addr">
      <h1 class="footer__logo">Something</h1>
          
      <h2>Contact</h2>
      
      <address>
        5534 Somewhere In. The World 22193-10212<br>
            
        <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
      </address>
    </div>
    
    <ul class="footer__nav">
      <li class="nav__item">
        <h2 class="nav__title">Media</h2>

        <ul class="nav__ul">
          <li>
            <a href="#">Online</a>
          </li>

          <li>
            <a href="#">Print</a>
          </li>
              
          <li>
            <a href="#">Alternative Ads</a>
          </li>
        </ul>
      </li>
      
      <li class="nav__item nav__item--extra">
        <h2 class="nav__title">Technology</h2>
        
        <ul class="nav__ul nav__ul--extra">
          <li>
            <a href="#">Hardware Design</a>
          </li>
          
          <li>
            <a href="#">Software Design</a>
          </li>
          
          <li>
            <a href="#">Digital Signage</a>
          </li>
          
          <li>
            <a href="#">Automation</a>
          </li>
          
          <li>
            <a href="#">Artificial Intelligence</a>
          </li>
          
          <li>
            <a href="#">IoT</a>
          </li>
        </ul>
      </li>
      
      <li class="nav__item">
        <h2 class="nav__title">Legal</h2>
        
        <ul class="nav__ul">
          <li>
            <a href="#">Privacy Policy</a>
          </li>
          
          <li>
            <a href="#">Terms of Use</a>
          </li>
          
          <li>
            <a href="#">Sitemap</a>
          </li>
        </ul>
      </li>
    </ul>
    
    <div class="legal">
      <p>&copy; 2022 Something. All rights reserved.</p>
      
      <div class="legal__links">
      
      </div>

  </footer>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type="text/javascript" src="./pagination/jquery.simplePagination.js"></script>

<script>
 $(document).ready(function(){
  

  $(document).on('click', '.deleteUser', function(){
    var id = $(this).attr('id');


    let user = $(this);

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url:'delete.php',
          type: 'POST',
          data: {id: id},
          success:function(data){
            swal.fire({
              title: 'Success',
              icon: 'success',
              text: 'Deleted User Successfully',
            }).then(() => {
                user.closest('tr').remove();
                // window.location.reload();
            })
          }
        })
      }
    })
  })
 })

 //pagination
 $(function() {
    let items = $('.user');
    let totalItems = items.length;
    let perPage = 3;
    // sessionStorage.setItem('page', '')
   
    items.slice(perPage).hide();
    $('#index-table').pagination({
        items: totalItems,
        itemsOnPage: perPage,
        cssStyle: 'light-theme',
        hrefTextPrefix: '#page-',
        onPageClick: function(pageNumber) {
          let showFrom = perPage * (pageNumber -1)
          let showTo = showFrom + perPage;
          items.hide().slice(showFrom, showTo).show();
          //console.log($('#index-table').pagination('getCurrentPage'));
          sessionStorage.setItem('page',$('#index-table').pagination('getCurrentPage'));  
        }
    });
    
});
</script>
</body>
</html>