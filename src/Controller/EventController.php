<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EventController extends AbstractController
{
    #[Route('/events/current', name: 'events_current')]
    public function current(): Response
    {
        $events = [
            [
                'name' => 'Summer Festival',
                'date' => '2026-07-10',
                'time' => '18:00',
                'location' => 'Town Hall',
                'description' => 'Live music and food'
            ],
            [
                'name' => 'Christmas Market',
                'date' => '2026-12-01',
                'time' => '15:00',
                'location' => 'Main Square',
                'description' => 'Traditional market with food and crafts'
            ]
        ];

        return $this->render('event/current.html.twig', [
            'events' => $events,
        ]);
    }
}
