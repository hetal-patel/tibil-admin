<?php 
require 'common/header.php' ;
require 'server/server.php';
    require 'server/session.php';
upload();
?>

<div id="wrapper">
    <?php require 'common/sidebar.php'; ?>
    <div id="page-wrapper">

        <div class="row p-top">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Upload file
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form  action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Heading</label>
                                        <input class="form-control" placeholder=" Heading" name="head">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" name="descrip" placeholder="Description"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>File input</label>
                                        <input type="file" name="f1" accept=".jepg, .png, .zip, .jpg, .gif">
                                    </div>

                                    <button type="submit" name="submit1" class="btn btn-default">Submit </button>

                                </form>
                                <?php  

                                if (isset($_SESSION['flash2'])) {
                                    echo "<h4>".$_SESSION['flash2']."</h4>";
                                    unset($_SESSION['flash2']);
                                } 
                                ?>
                            </div>
                            <!-- /.col-sm-8 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-sm-9 -->
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php require 'common/footer.php'; ?>