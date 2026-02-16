<?php

namespace App\Controller;

use App\Service\EventService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EventController extends AbstractController
{
    public function current(EventService $eventService): Response
    {
        return $this->render('event/current.html.twig', [
            'events' => $eventService->getCurrentEvents(),
        ]);
    }

    #[Route('/events', name: 'events_overview')]
    public function overview(EventService $eventService): Response
    {
        return $this->render('event/overview.html.twig', [
            'events' => $eventService->getUpcomingEvents(),
        ]);
    }

    #[Route('/events/detail/{id}', name: 'events_detail')]
    public function detail(int $id, EventService $eventService): Response
    {
        $event = $eventService->getEventById($id);
        
        if ($event === null) {
            throw $this->createNotFoundException('Event not found');
        }

        return $this->render('event/detail.html.twig', [
            'event' => $event,
        ]);
    }
}
