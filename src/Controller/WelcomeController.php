<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

final class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_welcome')]
    public function index(TranslatorInterface $translator, LoggerInterface $logger): Response
    {
        $appName=$translator->trans('First Steps Digital');

        // tracer les visites de l'application dans le fichier de log
        $logger->info('Application starting');


        $CurentDate = new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris'));
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
            'app_name' => $appName,
            'current_date' => $CurentDate->format('d/m/Y'),
        ]);
    }
}
