<?php

namespace App\Controller;

use App\Model\CategoryManager;

abstract class MyAbstractController extends AbstractController
{
    protected array $categories;

    public function __construct()
    {
        parent::__construct();
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll('name');
        $this->categories = $categories;
        $this->twig->addGlobal('categories', $categories);
    }
}
