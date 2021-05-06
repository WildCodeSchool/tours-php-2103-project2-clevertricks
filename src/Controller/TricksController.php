<?php

namespace App\Controller;

use App\Model\TricksManager;

class TricksController extends MyAbstractController
{
    /**
     * Add a new trick with at least one associated category
     */
    public function add(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $trick = [];
            if (empty($_POST['title'])) {
                $errors[] = "Titre obligatoire";
            } else {
                $trick['title'] = trim($_POST['title']);
            }
            if (empty($_POST['content'])) {
                $errors[] = "Contenu obligatoire";
            } else {
                $trick['content'] = trim($_POST['content']);
            }
            if (empty($_POST['category_id'])) {
                $errors[] = "Catégorie(s) requise(s)";
            } else {
                foreach ($_POST['category_id'] as $id) {
                    foreach ($this->categories as $category) {
                        if ($id == $category['id']) {
                            $trick['category_id'][] = $id;
                        }
                    }
                }
            }
            if (empty($errors)) {
                // if validation is ok, insert and redirection
                $tricksManager = new TricksManager();
                $tricksManager->insert($trick);
                header('Location: /');
            }
        }
        return $this->twig->render('Tricks/add.html.twig', ['errors' => $errors]);
    }

    /**
     * Show informations for a specific trick
     */
    public function show(int $id): string
    {
        $tricksManager = new TricksManager();
        $trick = $tricksManager->selectOneById($id);

        return $this->twig->render('Tricks/show.html.twig', ['trick' => $trick]);
    }
}
