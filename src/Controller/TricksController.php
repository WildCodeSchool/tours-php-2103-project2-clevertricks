<?php

namespace App\Controller;

use App\Model\TricksManager;

class TricksController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $tricksManager = new TricksManager();
        $tricks = $tricksManager->selectAll('title');

        return $this->twig->render('tricks/index.html.twig', ['tricks' => $tricks]);
    }


    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $tricksManager = new TricksManager();
        $tricks = $tricksManager->selectOneById($id);

        return $this->twig->render('tricks/show.html.twig', ['tricks' => $tricks]);
    }
}
