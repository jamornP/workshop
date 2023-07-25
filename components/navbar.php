<?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/vendor/autoload.php"; ?>
<?php
use App\Model\Auth;

$authObj = new Auth;
use App\Model\Data;

$dataObj = new Data;

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-123">
  <div class="container">
    <a class="navbar-brand" href="https://www.science.kmitl.ac.th/new">
      <img src="/workshop/images/logo.png" alt="Logo" style="display:table; margin: 0 auto; max-width:200px;">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex flex-row-reverse">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/workshop/pages/index.php">Home</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dowload
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="http://sciserv01.sci.kmitl.ac.th/sci-certificate/">Certificate</a></li>
            </ul>
          </li> -->
          <?php
          session_start();
          if (isset($_SESSION['s_email'])) {
            echo $_SESSION['s_email'];
          } else { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"> member </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/workshop/pages/auth/login.php">Log in</a></li>
                <li><a class="dropdown-item" href="/workshop/pages/auth/register.php">Register</a></li>
              </ul>
            </li>
          <?php }
          ?>
        </ul>
      </div>
    </div>
  </div>
</nav>