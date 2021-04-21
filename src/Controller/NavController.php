<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\CategoryManager;

class NavController extends AbstractController
{
    public function nav()
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll('name');
        return $this->twig->render('Home/nav.html.twig', ['categories' => $categories]);
    }
}
