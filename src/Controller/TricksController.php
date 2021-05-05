<?php

namespace App\Controller;

use App\Model\TricksManager;

class TricksController extends MyAbstractController
{
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
