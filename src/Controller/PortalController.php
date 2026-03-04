<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\EventRepository;


final class PortalController extends AbstractController
{
    #[Route('/portal', name: 'app_portal')]
    public function index(EventRepository $eventRepository): Response
    {   

        $events = $eventRepository->findAll();

        return $this->render('portal/index.html.twig', [
                    'events' => $events
        ]);
    }
}
