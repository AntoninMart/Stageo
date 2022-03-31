 <?php
require_once './functions/auth.php';
 ?>
 <header class="d-flex flex-wrap justify-content-center py-4 mb-6 border-bottom">
  <nav class="navbar navbar-light navbar-expand-lg bg-light fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Stageo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Managements</a>
              <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                <li><a class="dropdown-item" href="/companies.php">Companies</a></li><!-- all -->
                <li><a class="dropdown-item" href="/offers.php">Offers</a></li><!-- all -->
                <?php if($_SESSION['role']==='admin'): ?><li><a class="dropdown-item" href="/pilots.php">Pilots</a></li><?php endif ?><!-- Admin -->
                <?php if($_SESSION['role']==='admin' || $_SESSION['role']==='pilot'): ?><li><a class="dropdown-item" href="#">Delegates</a></li><?php endif ?><!-- Admin pilote  -->
                <?php if($_SESSION['role']==='admin' || $_SESSION['role']==='pilot'): ?><li><a class="dropdown-item" href="/students.php">Students</a></li><?php endif ?><!-- Admin pilote -->
                <li><a class="dropdown-item" href="#">Applications</a></li><!-- all  -->
              </ul>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <ul class="navbar-nav">
            <?php if(connect()): ?>
              <li class="nav-item"><button class="btn btn-outline-primary ms-4" type="button" disabled><?php echo($_SESSION['role']); ?></button></li>
            <?php endif ?>  
          </ul>
          <ul class="navbar-nav">
            <?php if(connect()): ?>
              <li class="nav-item"><button class="btn btn-primary ms-4" type="submit"><a class="text-Light text-decoration-none" href="/logout.php">Disconnect</a></button></li>
            <?php endif ?>  
          </ul>
        </div>
      </div>
    </div>
  </nav>
 </header>