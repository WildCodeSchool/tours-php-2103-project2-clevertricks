<?php

namespace App\Controller;

use App\Model\CategoryManager;

abstract class MyAbstractController extends AbstractController
{

    public function __construct()
    {
        parent::__construct();
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll('name');
        $this->twig->addGlobal('categories', $categories);
    }
}
