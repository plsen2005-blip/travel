<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/dashboard.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/style.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/media.css');?>">
    <title>Travel Agency Website</title>
</head>

<body>

<header>
        <nav>
            <h4>
                MR.Travel
            </h4>
            <ul id="menu_bx">
                <li><a href="<?= base_url('/');?>">Discover</a></li>
                <li><a href="<?= base_url('/order');?>">Bookings</a></li>
                <li><a href="#">Special Deals</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="<?= base_url('/Dashboard');?>">Dashboard</a></li>

                <?php
                if (empty($this->session->userdata('userdata')))
                    {
                    echo 
'
                    <li class="li_btn"><a href="#" id="loginBtn">Login</a></li>
                    <li class="li_btn"><a href="#" id="signupBtn">Register</a></li>
                    ';
                } else {
                    echo '
                    <li><a href=" '. base_url("Dashboard").'">Dashboard</a></li>
                    <li><a href="#" id="userStatus">
                    <i class="bi bi-person" style="margin-right:5px;"></i> Hello, '

                    .  $this->session->userdata('userdata')['name'] .

                    '
                    </a></li>
                    <li class="li_btn"><a href="#" id="logoutBtn">Logout</a></li>
                    ';
                }
                
                ?>
            </ul>
            <i class="bi bi-three-dots"></i>
        </nav>