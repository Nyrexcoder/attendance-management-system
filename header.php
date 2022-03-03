<?php    date_default_timezone_set('Asia/Calcutta');      ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custome.css" rel="stylesheet" />
        <!-- bootstrap icons link  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <!-- jquery table css cdn  -->
        <link rel="stylesheet" href="https:///cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

<!------ Include the above in your HEAD tag ---------->

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-success" style="color:white;">Working Pannel</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="attendance.php">Attendance</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="patty_cash.php">Patty Cash</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="make_invoice.php">Make Invoice</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="add_employee.php">Add Employee</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="attendance_report.php">Attendance Report</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="petty_cash_report.php">Patty Cash Report</a>

                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-success" id="sidebarToggle"><i class="bi bi-list"></i></button>
                        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="container">
                                <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Refresh" id="refresh_btn" style="position:absolute;right:15px;bottom:6px;"><i class="bi bi-arrow-clockwise"></i></button>

                            </div>
                        </div>
                    </div>
                </nav>