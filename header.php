<?php
    include_once './session.php';
?>
<!DOCTYPE HTML>
<!--
	Strata by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Strata by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header">
				<a href="profile.php" class="image avatar">
                                    <?php
                                    //preveri, če je prijavljen
                                    if (isset($_SESSION['user_id'])) {
                                        if (!empty($_SESSION['avatar'])) {
                                            //uporabnik ima sliko
                                             echo '<img src="'.$_SESSION['avatar'].'" alt="" />';
                                        }
                                        else {
                                            //uporabnik nima slike
                                             echo '<img src="uploads/avatars/avatar.jpg" alt="" />';
                                        }
                                    }
                                    else {
                                        //uporabnik ni prijavljen
                                        echo '<img src="uploads/avatars/avatar.jpg" alt="" />';
                                    }
                                    ?>                                    
                                </a>
                                <ul>
                                    <?php
                                        if (isset($_SESSION['user_id'])) {
                                            echo '<li><a href="groups.php">Skupine</a></li>';
                                            echo '<li><a href="teams.php">Ekipe</a></li>';
                                            echo '<li><a href="tasks.php">Opravila</a></li>';
                                            echo '<li><a href="logout.php">Odjava</a></li>';
                                        }
                                        else {
                                            echo '<li><a href="login.php">Prijava</a></li>';
                                            echo '<li><a href="user_add.php">Registracija</a></li>';
                                        }
                                    ?>
                                </ul>
			</header>
                <div id="main">
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo '<div id="'.$_SESSION['type'].'">';
                        echo $_SESSION['msg'];
                        echo '</div>';
                        //ko enkrat prikažemo, spremenljivko iz seje izbrišemo
                        unset($_SESSION['msg']);                        
                    }
                    ?>