<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Attribute\Route;

final class SessionController extends AbstractController
{
    #[Route('/play', name: 'app_session_start', methods: ['GET'])]
    public function start(Session $session): Response
    {
        return $this->render('session/start.html.twig', [
            'session' => $session,
        ]);
    }
}
