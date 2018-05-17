<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 17/05/2018
 * Time: 09:29
 */

namespace nains\controller\error;

class ErrorController
{
    public function errorMessage($message)
    {
        return "There was an error: " . $message;
    }

}