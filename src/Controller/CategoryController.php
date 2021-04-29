<?php

namespace App\Controller;

use App\Model\TricksManager;
use App\Model\CategoryManager;

class CategoryController extends AbstractController
{
    public function index(string $category): string
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll('name');
        $tricksManager = new TricksManager();
        $tricksByCategory = $tricksManager->selectTricksByCategory($category);
        return $this->twig->render(
            'Category/index.html.twig',
            ['categories' => $categories, 'tricksByCategory' => $tricksByCategory]
        );
    }
}