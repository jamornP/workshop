<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/function/function.php"; ?>
<?php
   session_start();
   date_default_timezone_set('Asia/Bangkok');
use App\Model\Auth;

$authObj = new Auth;

use App\Model\Data;

$dataObj = new Data;

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-298">
  <div class="container">
    <a class="navbar-brand" href="/workshop/pages">
      <img src="/workshop/images/logo-white.png" alt="Logo" style="display:table; margin: 0 auto; max-width:200px;">
    </a>

   
    <div class="d-flex flex-row-reverse">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/workshop/pages/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/workshop/pages/wdata.php">ข้อมูลกิจกรรม</a>
          </li>
          
          <?php
       
          if (isset($_SESSION['login']) and $_SESSION['login']) {
            if($_SESSION['role']=="student"){
              echo "
                <li class='nav-item'>
                  <a class='nav-link active' aria-current='page' href='/workshop/pages/student'>QR Code</a>
                </li>
              ";
            }
            
            echo "
            <li class='nav-item dropdown active'>
              <a class='nav-link dropdown-toggle text-success' href='#' id='navbarDropdown' role='button'
                data-bs-toggle='dropdown' aria-expanded='false'>{$_SESSION['fullname']}</a>
              <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                <li><a class='dropdown-item' href='/workshop/pages/staff'>Workshop</a></li>
                <li><a class='dropdown-item' href='/workshop/pages/auth/logout.php'>ออกจากระบบ</a></li>
              </ul>
            </li>
            
            ";
          } else { ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/workshop/pages/auth/login.php">เข้าสู่ระบบ</a>
            </li>
          <?php }
          ?>
        </ul>
      </div>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>