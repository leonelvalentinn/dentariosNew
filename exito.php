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
   include('header.php');
 ?>
    <main>
    <div class="opinions">
            <div class="title-opinions" id="contacto">
                <h2><span>Correo enviado,</span><span> Nos contactaremos muy pronto.</span></h2>
                
            </div>
        </div>
       <?php 
            include('footer.php')
       ?>
    <script>
        setTimeout(function (){
            window.location.replace("index.php");
        },3000);
    </script>

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