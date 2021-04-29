<?php

namespace App\Controller;

use App\Model\TricksManager;

class tricksController extends AbstractController
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
            $id = $tricksManager->insert($tricks);
            header('Location:/tricks/add/' . $id);
        }

        return $this->twig->render('Tricks/add.html.twig');
    }
}