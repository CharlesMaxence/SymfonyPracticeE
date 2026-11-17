<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

final class ThemesController extends AbstractController
{
    #[Route('/theme1', name: 'app_theme1')]
    public function theme1(TranslatorInterface $translator, LoggerInterface $logger): Response
    {
        $appName=$translator->trans('First Steps Digital');

        // tracer les visites de l'application dans le fichier de log
        $logger->info('Application starting');


        $CurentDate = new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris'));
        return $this->render('theme1/index.html.twig', [
            'controller_name' => 'ThemesController',
            'app_name' => $appName,
            'current_date' => $CurentDate->format('d/m/Y'),
        ]);
    }
    #[Route('/theme2', name: 'app_theme2')]
    public function theme2(TranslatorInterface $translator, LoggerInterface $logger): Response
    {
        $appName=$translator->trans('First Steps Digital');

        // tracer les visites de l'application dans le fichier de log
        $logger->info('Application starting');


        $CurentDate = new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris'));
        return $this->render('theme2/index.html.twig', [
            'controller_name' => 'ThemesController',
            'app_name' => $appName,
            'current_date' => $CurentDate->format('d/m/Y'),
        ]);
    }
}
