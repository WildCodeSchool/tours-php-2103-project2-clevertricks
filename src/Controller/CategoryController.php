<?php

namespace App\Controller;

use App\Model\TricksManager;

class CategoryController extends MyAbstractController
{
    public function index(string $category): string
    {
        $tricksManager = new TricksManager();
        $tricksByCategory = $tricksManager->selectTricksByCategory($category);
        return $this->twig->render(
            'Category/index.html.twig',
            ['tricksByCategory' => $tricksByCategory]
        );
    }
}
