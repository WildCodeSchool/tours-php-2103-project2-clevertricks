<?php

namespace App\Controller;

use App\Model\CategoryManager;
use App\Model\TricksManager;

class TricksController extends AbstractController
{
    /**
     * Add a new item
     */
    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $tricks = array_map('trim', $_POST);
            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $tricksManager = new TricksManager();
            $tricksManager->insert($tricks);
            header('Location: /');
        }
        $categoryManager = new CategoryManager();
        return $this->twig->render('Tricks/add.html.twig', ['categories' => $categoryManager->selectAll()]);
    }
}
