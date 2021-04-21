<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>PHP Console</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">PHP Console</a>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Consola de PHP</h1>
            <p class="lead">Esto es una consola</p>
        </div>
    </div>

    <div class="container">
        <?php
        include('automotores/auto.php');
        include('automatizacion/auto.php');
        include('connection.php');
        ?>

        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-dark text-white">
                    <h4>Base de Datos</h4>
                    <?php
                    $persons = $conn->query('SELECT * from persons');
                    foreach ( $persons as $fila) {
                        echo "Nombre: ".$fila["firstName"]." Apellido: ".$fila["lastName"]."<br>";
                    }
                    $conn = null;
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-info text-white">
                    <h4>NamesSpaces</h4>

                    <?php
                    $automotor = new automatizacion\Auto("Fiat", 4, 4);
                    $automatizador = new automotores\Auto("Bot Social", 10, "Jueves 10 mayo de 2020");

                    echo $automotor->getAuto();
                    echo $automatizador->getAuto();

                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php include('person.php'); ?>
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-dark text-white">
                    <h4>Include</h4>

                    <?php
                    $person = new Person("Jimmy", "Herrera");
                    echo $person->greetings();

                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="p-3 m-2 bg-info text-white">
                    <h4>Ejercicio Formularios</h4>
                    <form class="form-inline" method="POST" action="#">

                        <div class="form-group mx-sm-1 mb-2">
                            <input type="number" class="form-control" id="n1" name="n1">
                        </div>
                        <div class="form-group mx-sm-1 mb-2">
                            <input type="number" class="form-control" id="n2" name="n2">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Sumar</button>
                    </form>

                </div>
            </div>
            <div class="col-6">
                <div class="p-3 m-2 bg-success text-white">
                    <h4>Formulario</h4>
                    <?php
                    if (isset($_POST['n1']) && isset($_POST['n2'])) {
                        $result = $_POST['n1'] + $_POST['n2'];
                        echo "El resultado de la suma es: " . $result;
                    } else {
                        echo "Esperando números";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="p-3 m-2 bg-info text-white">
                    <h4>Formularios</h4>
                    <form class="form-inline" method="POST" action="#">

                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" id="saludo" name="saludo" placeholder="Di algo...">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Confirmar</button>
                    </form>

                </div>
            </div>
            <div class="col-6">
                <div class="p-3 m-2 bg-success text-white">
                    <h4>Formulario</h4>
                    <?php
                    if (isset($_POST['saludo'])) {
                        echo $_POST['saludo'];
                    } else {
                        echo "Esperando Saludo";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-dark text-white">
                    <h4>Calculadora</h4>
                    <?php
                    class Calculadora
                    {
                        public static function sumar($num1, $num2)
                        {
                            return $num1 + $num2;
                        }
                        public static function restar($num1, $num2)
                        {
                            return $num1 - $num2;
                        }
                        public function multiplicar($num1, $num2)
                        {
                            return $num1 * $num2;
                        }
                    }

                    echo "El resultado de la suma es: " . Calculadora::sumar(2, 5) . "<br>";
                    echo "El resultado de la resta es: " . Calculadora::restar(10, 5) . "<br>"

                    /*$sum = new Calculadora();
                        $res = new Calculadora();
                        echo "El resultado de la suma es: ".$sum->sumar(2,5)."<br>";
                        echo "El resultado de la resta es: ".$res->restar(10,5)."<br>";*/
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-info text-white">
                    <h4>Herencia</h4>
                    <?php
                    class Mascotas
                    {
                        public $nombre;
                        public $patas;

                        function __construct($nombre, $patas)
                        {
                            $this->nombre = $nombre;
                            $this->patas = $patas;
                        }

                        function eat()
                        {
                            return "Estoy comiendo";
                        }
                    }

                    class Perro extends Mascotas
                    {
                        function run()
                        {
                            return "Estoy corriendo";
                        }
                    }

                    $max = new Perro("Max", 4);

                    echo $max->run();
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-success text-white">
                    <h4>POO</h4>
                    <?php
                    class Mascota
                    {
                        public $nombre;
                        public $tipo;
                        public $patas;

                        function __construct($nombre, $tipo, $patas)
                        {
                            $this->nombre = $nombre;
                            $this->tipo = $tipo;
                            $this->patas = $patas;
                        }

                        public function getDesc()
                        {
                            if ($this->patas == 0) {
                                return "Tu mascota es un " . $this->tipo . " y se llama " . $this->nombre . " y no tiene patas. <br>";
                            } else {
                                return "Tu mascota es un " . $this->tipo . " y se llama " . $this->nombre . " y tiene " . $this->patas . " patas. <br>";
                            }
                        }
                    }

                    $perro = new Mascota("Max", "perro", 4);
                    $gato = new Mascota("Cariño", "gato", 4);
                    $pez = new Mascota("Nemo", "pez", 0);

                    echo $perro->getDesc();
                    echo $gato->getDesc();
                    echo $pez->getDesc();

                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-warning text-white">
                    <h4>Funciones</h4>
                    <?php
                    function calculate($sign, $numero, $numero2)
                    {
                        switch ($sign) {
                            case "+":
                                return $numero + $numero2;
                                break;
                            case "-":
                                return $numero - $numero2;
                                break;

                            default:
                                return 0;
                        }
                    }

                    $result = calculate("+", 3, 3);

                    echo "El resultado es: " . $result;
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="p-3 m-2 bg-primary text-white">
                    <h3>Clase: Break</h3>
                    <?php
                    $names = array("Jimmy", "Kevin", "Bonet", "Anderson", "Alex");

                    foreach ($names as $name) {
                        if ($name == "Anderson") {
                            break;
                        }
                        echo $name . "<br>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3 m-2 bg-primary text-white">
                    <h3>Clase: Continue</h3>
                    <?php
                    $names = array("Jimmy", "Kevin", "Bonet", "Anderson", "Alex");

                    foreach ($names as $name) {
                        if ($name == "Bonet") {
                            continue;
                        }
                        echo $name . "<br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="p-3 m-2 bg-primary text-white">
                    <h3>Clase: Arrays</h3>
                    <?php
                    $nums = array(1, 3, 4, 5, 7);

                    for ($i = 0; $i < count($nums); $i++) {
                        echo $nums[$i] . "<br>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 m-2 bg-success text-white">
                    <h3>Clase: Arrays</h3>
                    <?php
                    $names = array("Jimmy", "Kevin", "Bonet", "Anderson", "Alex");

                    for ($i = 0; $i < count($names); $i++) {
                        echo $names[$i] . "<br>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 m-2 bg-info text-white">
                    <h3>Clase:ForEach</h3>
                    <?php
                    $names = array("Jimmy", "Kevin", "Bonet", "Anderson", "Alex");

                    foreach ($names as $name) {
                        echo $name . "<br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="p-3 m-2 bg-success text-white">
                    <h3>Clase: Bucle While</h3>
                    <?php
                    $num = 0;

                    while ($num <= 5) {
                        echo "El número es: " . $num . "<br>";
                        $num++;
                    }
                    ?>
                </div>
            </div>

            <div class="col-6">
                <div class="p-3 m-2 bg-warning text-white">
                    <h3>Clase: Bucle For</h3>
                    <?php

                    for ($i = 0; $i <= 5; $i++) {
                        echo "El número es: " . $i . "<br>";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-primary text-white">
                    <h3>Clase: Condicional Switch</h3>
                    <?php
                    $num = 5;

                    switch ($num) {
                        case 1:
                            echo "La calificación es muy baja";
                            break;
                        case 4:
                            echo "La calificación sigue siendo baja";
                            break;
                        case 6:
                            echo "La calificación es mediocre";
                            break;
                        case 8:
                            echo "La calificación es buena";
                            break;
                        case 10:
                            echo "La calificación es excelente";
                            break;
                        default:
                            echo "La calificacion no es válida";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-primary text-white">
                    <h3>Clase: Condicional If</h3>
                    <?php
                    $name = "Jimmy";
                    $year = 1990;

                    if ($name == "Jimmy" && $year == 1990) {
                        echo "Eres el indicado: " . $name;
                    } else if ($name == "Aron" && $year < 2020) {
                        echo "Podrías ser el indicado";
                    } else {
                        echo "No eres el indicado";
                    }

                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-info text-white">
                    <h3>Clase: Operadores</h3>
                    <?php
                    $num1 = 5;
                    $num2 = 2;

                    echo "La suma de los números es: " . ($num1 + $num2) . "<br>";
                    echo "La resta de los números es: " . ($num1 * $num2) . "<br>";
                    echo "La multiplicación de los números es: " . ($num1 * $num2) . "<br>";
                    echo "La división de los números es: " . ($num1 / $num2) . "<br>";
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="p-3 m-2 bg-primary text-white">
                    <h3>Clase: Variables y tipos de datos</h3>
                    <?php
                    $name = "Jimmy";
                    $isOld = true;
                    $year = 1990;
                    $kms = 1.5;
                    echo "Hola " . $name . " naciste en el año " . $year . " y estas a " . $kms . " kilometros";
                    echo "La variable name es de tipo " . gettype($name);
                    ?>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>