<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\EventRepository;


final class UpcomingEventController extends AbstractController
{
    #[Route('/upcoming/event', name: 'app_upcoming_event')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findUpcomingEvents();


        return $this->render('upcoming_event/index.html.twig', [
            'events' => $events,
        ]);
    }
}
