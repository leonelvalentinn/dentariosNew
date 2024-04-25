<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>Dentarios</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="styles/home.css" />
</head>

<body id="body">
 <?php
 include ('header.php');
 ?>
    <main>
    <div class="opinions">
            <div class="title-opinions" id="contacto">
                <h2><span>Con</span><span>tacto</span></h2>
                <div class="blue-line" data-aos="fade-left" data-aos-duration="1000"></div>
            </div>
            <div class="container-contact" style="grid-template-columns: repeat(1, 1fr) !important;">
                <div class="item-contact">
                    <form action="emailAvisoCourse.php" method="post">

                        <div class="input-container">
                            <input type="text" class="form_input" name="TitleLocation" placeholder=" " required/>
                            <label class="form_label">Ubicación</label>
                            <span class="form_line"></span>
                        </div>
                        <div class="input-container">
                            <input type="text" class="form_input" name="Direction" placeholder=" " required/>
                            <label class="form_label">Dirección </label>
                            <span class="form_line"></span>
                        </div>
                        <div class="input-container">
                            <input type="text" class="form_input" name="Link" placeholder=" " required/>
                            <label class="form_label">Link</label>
                            <span class="form_line"></span>
                        </div>
                        <div class="input-container">
                            <input type="text" class="form_input" name="Time" placeholder=" " required/>
                            <label class="form_label">Horario</label>
                            <span class="form_line"></span>
                        </div>
                        <div class="input-container">
                            <input type="email" class="form_input" name="email" placeholder=" " required/>
                            <label class="form_label">Correo</label>
                            <span class="form_line"></span>
                        </div>
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container-footer">
            <div class="item-footer" id="logo-oscuro">
                <img src="images/logo-oscuro.png" alt="" />
            </div>
            <div class="item-footer">
                <h2>Contacto</h2>
                <div class="container-date-contact">
                    <a class="item-date-contact" href="tel:5590382078" target="_blank" style="text-decoration: none;">
                        <img src="images/smartphone.png" alt="" />
                        <p>5590382078</p>
                    </a>
                    <a class="item-date-contact" href="mailto:dentariosmx@gmail.com" target="_blank" style="text-decoration: none;">
                        <img src="images/email.png" alt="" />
                        <p>dentariosmx@gmail.com</p>
                    </a>
                </div>
            </div>
            <div class="item-footer">
                <div class="menu-footer">
                    <a href="index.php">Inicio</a>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="servicios.php">Servicios</a>
                    <a href="index.php/#portafolio">Portafolio</a>
                    <a href="index.php/#contacto">Contacto</a>
                </div>
            </div>
            <div class="item-footer">
                <a href="https://wa.me/525590382078" target="_blank"><img src="images/facebook.png" alt="" /></a>
                <a href="https://www.instagram.com/dentarios.mx/" target="_blank"><img src="images/instagram2.png" alt="" /></a>
                <a href="" target="_blank"><img src="images/tiktok.png" alt="" /></a>
                <a href="https://wa.me/525590382078" target="_blank"><img src="images/whatsappx.png" alt="" /></a>
            </div>
        </div>
        <div class="container-date">
            <hr />
            <p>
                Copyright 2023 (c) | Derechos reservados por
                <a href="">Agencia de Marketing Digital Dentarios</a>
            </p>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/sliderPortfolio.js"></script>
    <script src="js/clients.js"></script>
    <script src="js/darkMode.js"></script>
</body>

</html>