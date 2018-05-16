<?php declare(strict_types=1);

namespace nains;
use nains\model\DBManager;

require ('config.php');

require('view/header.php');


$db = DBManager::getInstance();

require('view/footer.php');