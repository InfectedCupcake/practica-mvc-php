<?php
$maxlifetime = 3; //Maximo tiempo de vida  de la session
$secure = true; //
$http_only = true; //
$samesite = "lax"; //
$host = $_SERVER['HTTP_HOST']; //

session_set_cookie_params([
    'lifetime' => $maxlifetime,
    'path' => './',
    'domain' => $host,
    'secure' => $secure,
    'httponly' => $http_only,
    'samesite' => $samesite,
]);

session_start([
    //'cookie_lifetime' => 60*60*4,

]);


function checkSession(): bool
{
    return isset($_SESSION["idUsuario"]) && $_SESSION["idUsuario"] != null;
}

//Trabajando varaibles de entorno

$env = parse_ini_file(".env");
//print_r($env);

foreach ($env as $key => $value) {
    $_ENV[$key] = $value;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    $request_url = $_SERVER['REQUEST_URI'];
    $request_method = $_SERVER['REQUEST_METHOD'];

    //echo $request_url;
    $request_comp = parse_url($request_url);

    // if (count($request_comp) > 0) {
    //     //$query_params = $request_comp['query'];
    //     parse_str($request_comp['query'], $query_params);
    //     $params = json_encode($query_params);
    // }


    $path_comp = explode('/', (ltrim($request_comp['path'], '/')));
    $path_co = json_encode($path_comp);


    // echo "
    //     <br>
    //     <h2>Recurso Solisitado: {$request_comp['path']} </h2>
    //     <h3>Query Paramans: {$params}</h3> 
    //     <h3>Comp URL: {$path_co}</h3> 
    // ";

    require_once("./app.controller.php")
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>