



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniNest NSBM</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/slider-styles.css?v=<?php echo time(); ?>">
</head>

<body>

    
    <nav>
    <div class="nav__logo"><img src="assets/logo.png" alt="logo" /></div>
        <ul class="nav__links">
            <li class="link"><a href="#home_section">Home</a></li>
            <li class="link"><a href="#footer_section">Contact</a></li>
            <li class="link"><a href="addUser.php">Add User</a></li>
            <li class="link"><a href="viewUsers.php">View Users</a></li>
        </ul>
    </nav>
 



    <header class="section__container header__container">
        <div class="header__content">
            <span class="bg__blur"></span>
            <span class="bg__blur header__blur"></span>
            <h4>Transform Your Digital Presence</h4>
            <h1><span>Welcome to </span>AXCERTRO</h1>
            <p>
            Login as an Admin here to access user detais!
            </p>
            <a href="addUser.php"><button class="btn">Add User</button></a>
            <a href="viewUsers.php"><button class="btn">View Users</button></a>
        </div>
    </header>





    <?php include ("footer.php")?>




    <script src="<?php echo 'assets/js/main.js?v=' . filemtime('assets/js/main.js'); ?>"></script>





</body>

</html>