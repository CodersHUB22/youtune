<?php
header('Content-Type: application/json');

$headerHTML = '
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" aria-label="YouTune">
                    <img src="img/logo.png" alt="Logo" height="100">
                </a>
                <ul class="navbar-nav d-lg-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link menu-bar" id="mobileDropdown" role="button" aria-expanded="false" onclick="toggleMobileMenu()">
                            <i class="fas fa-bars"></i>
                        </a>
                        <ul class="dropdown-menu" id="mobileMenu" aria-labelledby="mobileDropdown">
                            <li><a class="dropdown-item" id="homeMobile">Home</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav d-none d-lg-block">
                    <li class="nav-item">
                        <a class="nav-link active" id="homeDesktop">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
';

echo json_encode(['headerHTML' => $headerHTML]);
?>