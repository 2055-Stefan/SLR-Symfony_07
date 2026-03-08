<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Repository\AppointmentRepository;
use App\Repository\NotificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StatisticsController extends AbstractController
{
    #[Route('/statistics', name: 'app_statistics')]
    public function index(
        EventRepository $eventRepository,
        AppointmentRepository $appointmentRepository,
        NotificationRepository $notificationRepository
    ): Response {

        $eventCount = $eventRepository->countAllEvents();
        $appointmentCount = $appointmentRepository->countAppointments();
        $notificationCount = $notificationRepository->countNotifications();

        return $this->render('statistics/index.html.twig', [
            'events' => $eventCount,
            'appointments' => $appointmentCount,
            'notifications' => $notificationCount
        ]);
    }
}