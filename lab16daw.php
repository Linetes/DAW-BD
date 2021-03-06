<?php
session_start();
require_once("modelo.php");
include("partials/_header.html");
function insert_fruit() {

    $name = htmlspecialchars($_POST['nameFruit']);
    $units = htmlspecialchars($_POST['unitsFruit']);
    $quantity = htmlspecialchars($_POST['quantityFruit']);
    $price = htmlspecialchars($_POST['priceFruit']);
    $country = htmlspecialchars($_POST['countryFruit']);

    //validacion de datos
    if(strlen($name) > 0 && strlen($units) > 0 && strlen($quantity) > 0 && strlen($price)) {
        if(is_numeric($quantity) && is_numeric($price)){
            if(insertFruit($name, $units, $quantity, $price, $country)){
                return true;
            } else{
                return false;
            }
        }
    }
}

function delete_fruit() {

    $name3 = htmlspecialchars($_POST['nameFruit3']);

    if(delete_by_name($name3)){
        return true;
    } else{
        return false;
    }
}

function update_fruit() {
    $name2 = htmlspecialchars($_POST['nameFruit2']);
    $units2 = htmlspecialchars($_POST['unitsFruit2']);
    $quantity2 = htmlspecialchars($_POST['quantityFruit2']);
    $price2 = htmlspecialchars($_POST['priceFruit2']);
    $country2 = htmlspecialchars($_POST['countryFruit2']);

    //validacion de datos
    if(strlen($name2) > 0 && strlen($units2) > 0 && strlen($quantity2) > 0 && strlen($price2)) {
        if(is_numeric($quantity2) && is_numeric($price2)){
            if(update_by_name($name2, $units2, $quantity2, $price2, $country2)){
                return true;
            } else{
                return false;
            }
        }
    }
}
?>

  <!-- Body -->
  <body>

    <!-- Título -->
    <header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                        <h1 class="display-4">Lab 16: php y manipulación de registros de la base de datos</h1>
                        <h3> Para este Lab usaré la página login.php</h3>
                </div>
            </div>
        </div>
    </header>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Ejercicios con Fruit</h1>
            <div class="alert alert-light" role="alert">
                <div class="row">
                    <div class="col">
                        <h1>Insertar Fruta</h1>
                        <form action="lab16daw.php" method="POST">
                            <label for="nameFruit">Name</label>
                            <div class="input-group mb-3">
                                <input placeholder="Pera" class="form-control" name="nameFruit" type="text" class="validate" required>
                            </div>
                            <label for="unitsFruit">Units</label>
                            <div class="input-group mb-3">
                                <input placeholder="4" class="form-control" name="unitsFruit" type="text" class="validate" required>
                            </div>
                            <label for="quantityFruit">Quantity</label>
                            <div class="input-group mb-3">
                                <input placeholder="11" class="form-control" name="quantityFruit" type="text" class="validate" required>
                            </div>
                            <label for="priceFruit">Price</label>
                            <div class="input-group mb-3">
                                <input placeholder="11" class="form-control" name="priceFruit" type="text" class="validate" required>
                            </div>
                            <label for="countryFruit">Country</label>
                            <div class="input-group mb-3">
                                <input placeholder="Mexico" class="form-control" name="countryFruit" type="text" class="validate" required>
                            </div>

                            <button type="button-centered" class="btn btn-primary btn-lg">Submit</button>
                        </form>
                        <br>
                        <h1>Modificar Fruta</h1>
                        <form action="lab16daw.php" method="POST">
                            <label for="nameFruit2">Name</label>
                            <div class="input-group mb-3">
                                <input placeholder="Pera" class="form-control" name="nameFruit2" type="text" class="validate" required>
                            </div>
                            <label for="unitsFruit2">Units</label>
                            <div class="input-group mb-3">
                                <input placeholder="4" class="form-control" name="unitsFruit2" type="text" class="validate" required>
                            </div>
                            <label for="quantityFruit2">Quantity</label>
                            <div class="input-group mb-3">
                                <input placeholder="11" class="form-control" name="quantityFruit2" type="text" class="validate" required>
                            </div>
                            <label for="priceFruit2">Price</label>
                            <div class="input-group mb-3">
                                <input placeholder="11" class="form-control" name="priceFruit2" type="text" class="validate" required>
                            </div>
                            <label for="countryFruit2">Country</label>
                            <div class="input-group mb-3">
                                <input placeholder="Mexico" class="form-control" name="countryFruit2" type="text" class="validate" required>
                            </div>

                            <button type="button-centered" class="btn btn-primary btn-lg">Submit</button>
                        </form>
                        <br>
                        <h1>Borrar Fruta</h1>
                        <form action="lab16daw.php" method="POST">
                            <label for="nameFruit3">Name</label>
                            <div class="input-group mb-3">
                                <input placeholder="Pera" class="form-control" name="nameFruit3" type="text" class="validate" required>
                            </div>

                            <button type="button-centered" class="btn btn-primary btn-lg">Submit</button>
                        </form>
                        <?php
                            insert_fruit();
                            delete_fruit();
                            update_fruit();
                        ?>
                    </div>
                    <div class="col">
                        <h1>Base de Datos</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Units</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Country</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php getFruits();?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Artículo -->
    <section class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">¿Por qué es una buena práctica separar el modelo del controlador?</div>
                    <div class="card-body">
                        <p>Open Data Base Conectivity, es util para poder accesar a los datos todo el tiempo y no sólo que se guarden los datos en la sesión.</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">¿Qué es SQL injection y cómo se puede prevenir?</div>
                    <div class="card-body">
                      <p>
                          Cuando ponen código de SQL en las formas, pueden poner un código que borre la base de datos.
                          <br>
                          Con SQLi, se usa una función que agarre la inyección.
                          <br>
                          $stmt = $dbConnection->prepare('SELECT * FROM employees WHERE name = ?');
                          $stmt->bind_param('s', $name); // 's' specifies the variable type => 'string'

                          $stmt->execute();

                          $result = $stmt->get_result();
                          while ($row = $result->fetch_assoc()) {
                          // do something with $row
                          }
                      </p>
                    </div>
                  </div>
                </div>
              </div>

          <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-4">Bibliografía:</h1>
                <p class="lead">PeeHaa .(2018). How can I prevent SQL injection in PHP? . Stack Overflow. Obtenido en: https://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php</p>
              </div>
          </div>
        </div>
      </div>
    </section>
  </body>
<?php
  include("partials/_footer.html");
?>
