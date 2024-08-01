<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$userType = "";
$_SESSION['username'] = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="includes/style/style.css" rel="stylesheet"/>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="includes/photos/logo.png" alt="" width="50" height="30" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Pagrindinis</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php
                    if ($userType == "User") { ?>
                        <a href="cart.php"><img src="includes/photos/cart.png" 
                           style="width:30px; height:25px; margin-left:-20px; margin-top:10px;">
                           <sup class="supClass"><?php echo (string)$cartItemCount ?></sup>
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?Php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Naudotojo panelė</a></li>
                                <li><a class="dropdown-item" href="#">Kiti veiksmai</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="handling/logout.han.php">Atsijungti</a>
                                </li>
                            </ul>
                        </li>
                    <?php } else if ($userType == "Admin") { ?>
                        <a href="cart.php"><img src="" style="width:30px; height:25px; margin-left:-20px; margin-top:10px;"><sup class="supClass"></sup></a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?Php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="admin_panel.php?window=product">Administratoriaus panelė</a></li>
                                <li><a class="dropdown-item" href="analysis.php">Rinkos tyrimų analizė</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="handling/logout.han.php">Atsijungti</a>
                                </li>
                            </ul>
                        </li>
                        <?php } else {?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="login.php">Prisijungti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="registration.php">Registruotis</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>