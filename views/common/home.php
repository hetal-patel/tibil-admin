<?php 
require 'header.php' ;
// include '../../css/upload.css';
require '../server/session.php';
?>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" >
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="home.php">Tibil Solutions</a>

            
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <a   href="home.php">Welcome <?php echo $_SESSION['login_user']; ?></a> 

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-message">
                    <li class="divider"></li>
                    <li><a href="../server/server.php?fn=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                   
                    <li>
                        <a href="../view.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</a>
                    </li>
                     <?php  
                    if ($_SESSION['login_type'] == 1) {
                       echo "<li>
                        <a href='../upload.php'><span class='glyphicon glyphicon-upload' aria-hidden='true'></span> Upload</a>
                         </li>";
                    }
                    ?>
                    
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php require 'footer.php'; ?>