<?php declare(strict_types=1);

namespace nains\controller\tunnel;


class TunnelController extends coreController
{
    public function __construct()
    {
        $this->className = 'tunnel';
    }

    public function getView($id)
    {


        $this->showView($this->className, [

        ]);
    }
}
