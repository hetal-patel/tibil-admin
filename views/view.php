<?php 

require 'common/header.php' ;
require 'server/server.php';
    require 'server/session.php';
?>

<div id="wrapper">

  <?php require 'common/sidebar.php'; ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">View</h1>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>File Name</th>
                    <th>File Type</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php   view(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require 'common/footer.php'; ?>
</div>