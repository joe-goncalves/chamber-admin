<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ronkonkoma Chamber | Admin</title>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
      <link href="css/plugins/timeline/timeline.css" rel="stylesheet">
      <link href="css/sb-admin.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/is_logged_in.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
      <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
      <script src="js/plugins/morris/morris.js"></script>
      <script src="js/sb-admin.js"></script>
      <script src="js/demo/dashboard-demo.js"></script>
      <script src="js/tablesorter-min.js"></script>
  </head>
  <body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Ronkonkoma Chamber | Admin</a>
      </div>
      <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="side-menu">
           <li class = "divider text-center" id = "logged_in_user"></li>
            <li>
              <a href="events.php">
              <span class="glyphicon glyphicon-calendar"></span> 
                Events
              </a>
            </li>
            <li>
              <a href="members.php">
                <span class="glyphicon glyphicon-user"></span> 
                Members
              </a>
            </li>
          </ul>
          <button type='button' id = 'admin_log_out' class='btn btn-primary btn-block hidden'>Log Out</button>
        </div>
      </div>
    </nav>