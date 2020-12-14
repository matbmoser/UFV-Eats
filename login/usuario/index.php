<?php
$username = "";
include("../../assets/mod/session.php");
include("../../assets/mod/token.php");


// A partir de aquí puedes usar la variable $_GET con la URL limpia
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Template · Bootstrap</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/6d67b863f5.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="../../assets/bt/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../assets/bt/js/bootstrap.min.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <?php
            if ($username != "") {
                echo "<span style='color:white'>Welcome <strong>" . $username . "</strong>!</span>";
            } else {
                echo "<a class='nav-link'  href='../index.php?result=00270cf63f93c307e7e9d2cc7e639fa50aca58eeb64be3266a798c9c19535219'><span style='color:white'><strong>Log in</strong></span></a>";
            }
            ?>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link"
               href="../index.php?result=00270cf63f93c307e7e9d2cc7e639fa50aca58eeb64be3266a798c9c19535219">Sign out</a>
        </li>
    </ul>
</header>
<div class="p-0 container-fluid">
    <nav>
        <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab"
               aria-controls="nav-home" aria-selected="true">Home</a>
            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab"
               aria-controls="nav-profile" aria-selected="false">Profile</a>
            <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab"
               aria-controls="nav-contact" aria-selected="false">Contact</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">1</div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">2.</div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3</div>
    </div>
</div>
<script src="../../assets/js/smooth-scroll.js"></script>
<script src="../../assets/js/jarallax.min.js"></script>
<script src="../../assets/js/parallax.js"></script>
<script>
    var tabEl = document.querySelector('a[data-bs-toggle="tab"]')
    tabEl.addEventListener('shown.bs.tab', function (event) {
        event.target // newly activated tab
        event.relatedTarget // previous active tab
    })
</script>
</body>
</html>
