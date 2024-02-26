<?php

session_start();

if (!isset($_SESSION['loggedin'])) {

    header('Location: index.php');
    exit;
}


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'clients';

// conexion a la base de datos

$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {

    // si se encuentra error en la conexión

    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

$stmt = $conexion->prepare('SELECT password, email, clinic, plan FROM clients WHERE id = ?');





$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $clinic, $plan);
$stmt->fetch();
$stmt->close();

$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {

    // si se encuentra error en la conexión

    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

$stmt = $conexion->prepare('SELECT * FROM plans');


$stmt->execute();
$resultSet = $stmt->get_result();
$row = $resultSet->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$i = 0;

//Ejecutamos para obtener el paquete contratado por el cliente en caso de no tener no se muestra
if ($plan == 0) {
  $planName = ' ';
} else {
  $conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
  if (mysqli_connect_error()) {
    // si se encuentra error en la conexión
    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
  }
  $stmt = $conexion->prepare('SELECT name FROM plans WHERE id = "'.$plan.'"');
  $stmt->execute();
  $stmt->bind_result($planName);
  $stmt->fetch();
  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="body">
  <?php
    include('header.php');
  ?>
  <div class="content">

      <h2 style="color: white;">Información del Usuario</h2>
      <div class="container-info">
          <table>
              <tr>
                  <td>Usuario:</td>
                  <td><?= $_SESSION['name'] ?></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><?= $email ?></td>
              </tr>
              <tr>
                <td>Clínica:</td>
                <td><?= $clinic ?></td>
              </tr>
              <tr>
                <td>Paquete contratado:</td>
                <td><?= $planName ?></td>
              </tr>
          </table>
      </div>
    <section class="container-info">
      <div class="subscriptions">
      <?php 
        foreach ($row as $item) {
          $i++;
          echo '<div class="plan">
                  <div class="inner">
                    <span class="pricing">';
                echo '<span>$'.$item['price'].'<small>/ m</small>
                </span>
                </span>';
          echo '<p class="title">'.$item['name'].'</p>';
          echo '<p class="info">'.$item['details'].'</p>';
          echo '<ul class="features">';
          $str_arr = preg_split ("/\,/", $item['includes']);  
          for ($j=0; $j < count($str_arr); $j++) { 
            echo '<li>
            <span class="icon">
              <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none"></path>
                <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
              </svg>
            </span>
            <span>';
            print_r($str_arr[$j]);
            echo '</span>
            </li>';
          }
          echo '</ul>
                <div class="action">
                  <a class="button" href="checkout.html?id='.$item['id'].'">
                    Elegir Plan
                  </a>
                  </div>
                </div>
              </div>';
          }
      ?>
      </div>

    </section>
  </div>
  <script src="js/darkMode.js"></script>
  <script src="js/main.js"></script>
  <script src="js/menu.js"></script>
</body>

</html>