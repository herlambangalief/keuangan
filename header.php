<?php
    session_start();
      if (!isset($_SESSION['login'])) {
        echo "<script type='text/javascript'>location.href='login.php'</script>";
      }

      else{
        if (isset($_SESSION['username'])) {
            $username   = $_SESSION['username'];
            $email      = $_SESSION['email'];
            $id_user    = $_SESSION['id_user'];
            require 'koneksi.php';
        }
      }

    
?>

<div class="app-header header-shadow">
            <div class="app-header__logo">
                <h3>Admin</h3>
                    
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <a href="logout.php">
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </a>
            </div>    
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php echo $_SESSION['username']; ?>
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <a href="logout.php" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white pe-7s-power pr-1 pl-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>