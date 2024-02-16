<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);  

// confirmar sesion

session_start();


if (!isset($_SESSION['loggedin'])) {
  $closeSession = "";
} else {
  $closeSession = '<a href="closeSession.php">Cerrar Sesión</a>';
}

?>
<header>
        <hr />
        <div class="container-header">
            <div class="logo-header">
                <img src="" alt="" id="logo" />
            </div>
            <div class="container-menu" id="menu">
                <nav class="menu">
                    <a href="index.php">Inicio</a>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="servicios.php">Servicios</a>
                    <a href="#testimonios">Testimonios</a>
                    <a href="https://academy.dentarios.com.mx" target="_blank">Academy</a>
                    <?= $closeSession ?>
                    <button id="modo">
                        <img src="images/luna.png" alt="" id="moon" />
                        <img src="images/sun.png" alt="" id="sun" />
                    </button>
                </nav>
            </div>
            <div class="bars-menu">
                <div class="icon-menu" id="icon-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
