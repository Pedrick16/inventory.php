
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Scoops4U |  </title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Scoops4u</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../users/list-users-account.php">Users List</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../product-list-admin/classic.php">Classic</a></li>
            <li><a class="dropdown-item" href="../product-list-admin/special.php">Special</a></li>
            <li><a class="dropdown-item" href="../product-list-admin/deluxe.php">Deluxe</a></li>
            <li><a class="dropdown-item" href="../product-list-admin/nosugar.php">No sugar</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventory
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../inventory/classic.php">Classic</a></li>
            <li><a class="dropdown-item" href="../inventory/special.php">Special</a></li>
            <li><a class="dropdown-item" href="../inventory/deluxe.php">Deluxe</a></li>
            <li><a class="dropdown-item" href="../inventory/nosugar.php">No sugar</a></li>
          </ul>
        </li>
        

        <li class="nav-item">
          <a class="nav-link" href="#">POS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reports</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="">Theme</a></li>
            <li><a class="dropdown-item" href="">Archive Account</a></li>
            <li><a class="dropdown-item" href="">Retrieve Account</a></li>
            <li><a class="dropdown-item" href="">Change Password</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Admin
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../index.php">Logout</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- <div class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="../resellers/listresellers.php" class="navbar-brand">Reseller List</a>
           
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../productlist/classic.php">Classic</a></li>
            <li><a class="dropdown-item" href="../productlist/special.php">Special</a></li>
            <li><a class="dropdown-item" href="../productlist/deluxe.php">Deluxe</a></li>
            <li><a class="dropdown-item" href="../productlist/nosugar.php">No sugar</a></li>
          </ul>
        </li>
            <a href="" class="navbar-brand">Inventory</a>
            <a href="" class="navbar-brand">Transaction</a>
            <a href="" class="navbar-brand">Reports</a>
            <a href="" class="navbar-brand">POS</a>
            <a href="../users/login.php" class="navbar-brand"> Logout</a>
        </div>
    </div> -->
    <!-- <div class="container">
        <div class="row mt-2">
            <div class="col-lg-12">
                {% block content %} {% endblock %}

            </div>
        </div>
    </div> -->
    



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>