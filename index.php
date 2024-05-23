<!DOCTYPE html>
<html lang="en">
    <head>
      <?php include_once "layout/header.php"; ?>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once "layout/navbar.php" ?>
      <!-- nav bar -->
        <div id="layoutSidenav">
        <?php include_once "layout/sidebar.php" ?>
       <!-- side bar -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php include_once "layout/cards.php" ?>
                        <!-- cards to count of number -->
                        
                        <?php include_once "layout/table.php" ?>
                        <!-- table -->
                    </div>
                </main>
                <?php include_once "layout/footer.php" ?>
                
        <!-- footer -->
            </div>
        </div>
        <?php include_once "layout/scripts.php" ?>

    <!-- Scripts js -->
    </body>
</html>
