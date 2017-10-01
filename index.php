<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css">
  </head>
  <body>
    
    <!-- Start Top Bar -->
    <?php include 'includes/navbar.php'; ?>
    <!-- End Top Bar -->

    <?php include 'includes/jumbotron.php'; ?>
    
    <div class="grid-container fluid">
      <div class="grid-x grid-margin-x" id="content">
        <div class="medium-8 cell">
          <?php include 'content.php'; ?>
        </div>
        <div class="medium-4 cell">
          <?php include 'includes/sidebar.php'; ?>
        </div>
      </div>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>



