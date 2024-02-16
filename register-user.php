<?php
session_start();


//credenciales de acceso a la base datos

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'clients';

// conexión a la base de datos

$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {

    // si se encuentra error en la conexión

    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

// Se valida si se ha enviado información, con la función isset()

if (!isset($_POST['username'], $_POST['password'], $_POST['name'], $_POST['email'])) {

    // si no hay datos muestra error y re direccionar

    echo('Error');
}

// evitar inyección sql
// parámetros de enlace de la cadena s
$name = $_POST['name'];
$user = $_POST['username'];
$pass = $_POST['password'];
$mail = $_POST['email'];

if ($stmt = $conn->prepare('INSERT INTO clients (name, username, password, email) VALUES ("'.$name.'", "'.$user.'", "'.$pass.'", "'.$mail.'")')) {

  
  // Execute the query using the data we just defined
  // The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
  if ($stmt->execute()) {
    header('Location: login.php');
  } else {
    echo "Unable to create record";
  }
}
$stmt->close();
