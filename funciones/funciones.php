<?php
if (isset($_POST['correoIni']) && isset($_POST['contraIni'])) {
    $correo = $_POST['correoIni'];
    $contra = $_POST['contraIni'];
    $servername = "localhost";
    $username = "root";
    $dbname = "abfinal";
    $password = "9455";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id FROM usuarios WHERE correo = '$correo' AND contrasenia = '$contra'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row['id'];
        }
    } else {
        echo "false";
    }
}
if (isset($_POST['correo']) && isset($_POST['contra'])) {
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];
    $servername = "localhost";
    $username = "root";
    $dbname = "abfinal";
    $password = "9455";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "false";
    } else {
        $sql = "INSERT INTO usuarios (correo, contrasenia) VALUES ('$correo', '$contra')";
        if ($conn->query($sql) === TRUE) {
            echo "true";
        } else {
            echo "false";
        }
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $servername = "localhost";
    $username = "root";
    $dbname = "abfinal";
    $password = "9455";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to delete a record
    $sql = "DELETE FROM usuarios WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "True";
    } else {
        echo "False";
    }

    $conn->close();
}
if (isset($_POST['actualizado'])) {
    $nuevo = $_POST['actualizado'];
    $id = $_POST['idmod'];
    $servername = "localhost";
    $username = "root";
    $dbname = "abfinal";
    $password = "9455";


    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE usuarios SET correo='$nuevo' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
        echo "false";
    }

    $conn->close();
}
function mostrarUsu()
{
    $servername = "localhost";
    $username = "root";
    $password = "9455";
    $dbname = "abfinal";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id,correo FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table style='margin-top:3%;'>";
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr style='border:solid 2px orange'>";
            echo "<td style='border:solid 2px orange;text-align:center'>" . $row['correo'] . "</td><td style='border:solid 2px orange;text-align:center'><button onclick='borrar($id)'>Borrar</button></td><td style='border:solid 2px orange;text-align:center'><button onclick='modificar($id)'>Modificar</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay usuarios registrados en este momento";
    }
    $conn->close();
}
function mostrarMensajes()
{
    $servername = "localhost";
    $username = "root";
    $password = "9455";
    $dbname = "abfinal";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT m.id,u.correo,m.mensaje FROM mensajes m INNER JOIN usuarios u ON u.id = m.id_usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row['correo'] . ": " . $row['mensaje']."<br>";
        }
    } else {
    }
    $conn->close();
}
if (isset($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
    $servername = "localhost";
    $username = "root";
    $password = "9455";
    $dbname = "abfinal";
    if($mensaje == "" || $mensaje ==" "){
        header("location:../pages/foro.php");
    }else{
        $id = $_COOKIE['id'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO mensajes (id_usuario, mensaje) VALUES ($id, '$mensaje')";
        if ($conn->query($sql) === TRUE) {
           header("location:../pages/foro.php");
        } else {
            echo "Algo ha fallado";
        }
        $conn->close();
    }
}
function mostrarTienda(){
    $servername = "localhost";
    $username = "root";
    $password = "9455";
    $dbname = "abfinal";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT nombre,imagen,precio,id FROM productos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<section style='display: flex; flex-wrap: wrap;'>";
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="card" style="width: 18rem; margin: 10px;">
                <img src="' . $row["imagen"] . '" class="card-img-top" alt="'. $row["nombre"] . '">
                <div class="card-body">
                    <h5 class="card-title">' . $row["nombre"] . '</h5>
                    <p class="card-text">' . $row["precio"] . '€</p>
                    <button style="background-color:#FF7000" class="btn btn-primary" onclick="agregarAlCarrito(\'' . $row['nombre'] . '\', ' . $row['precio'] . ')">Añadir al carrito</button>
                </div>
            </div>';
        }
        echo "</section>";        
    } else {
        echo "No hay usuarios registrados en este momento";
    }
    $conn->close();
}

