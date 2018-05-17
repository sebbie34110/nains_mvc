<?php declare(strict_types=1);

namespace nains;
use nains\model\DBManager;
require ('config.php');


$params = '';

if(!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
        $controller = "Homepage";
        $params = '';
}

// Nains
if(isset($_GET['n_submit']) && !empty($_GET['n_submit'])) {
    $controller = 'Nain';
    $params = (int)$_GET['n_id'];
}

// Villes
if(isset($_GET['v_submit']) && !empty($_GET['v_submit'])) {
    $controller = 'Ville';
    $params = (int)$_GET['v_id'];
}

// Groupes
if(isset($_GET['g_submit']) && !empty($_GET['g_submit'])) {
    $controller = 'Group';
    $params = (int)$_GET['n_id'];
}

// Tavernes
if(isset($_GET['t_submit']) && !empty($_GET['t_submit'])) {
    $controller = 'Taverne';
    $params = (int)$_GET['t_id'];
}


if(!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "getView";
}

$nomController = 'nains\controller\\'.strtolower($controller).'\\'.$controller.'Controller';
try {
    if (class_exists($nomController) && method_exists($nomController, $action)) {
        $c = new $nomController();
        require('view/header.php');
        $c->$action($params);
        require('view/footer.php');
    } else {
        throw new \Exception('Class ou méthode non trouvé : '.$nomController. ' -> '.$action. '()' );
    }
} catch (\Exception $e) {
    $error = new controller\error\ErrorController();
    echo $error->errorMessage($e->getMessage());
}

