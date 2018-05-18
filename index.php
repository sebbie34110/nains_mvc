<?php declare(strict_types=1);

namespace nains;

require ('config.php');


$params = '';

if(!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "getView";
}

if(!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = "Homepage";
}

if (!empty($_GET)) {

    if (!empty($_GET['controller']) && !empty($_GET['action'])) {

        switch ($_GET['controller']) {
            case 'Nain':
                $controller = 'Nain';
                $params = (int)$_GET['n_id'];
                break;

            case 'Ville':
                $controller = 'Ville';
                $params = (int)$_GET['v_id'];
                break;

            case 'Group':
                $controller = 'Group';
                $params = (int)$_GET['g_id'];
                break;

            case 'Taverne':
                $controller = 'Taverne';
                $params = (int)$_GET['t_id'];
                break;

            default:
                $controller = "Homepage";
                $params = '';
        }
    }
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

