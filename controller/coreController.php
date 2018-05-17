<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 17/05/2018
 * Time: 10:37
 */
namespace nains\controller;

class coreController
{
    protected $className;

    public function showView($name, $variablesShoview)
    {
        // converti l'array assos en variable (utilisation ok dans ce cas mais faire attention
        // cart dur de retrouver d'où viennent les variables
        extract($variablesShoview);

        require $this->className.'/view/'.$name.'.php';
    }

}