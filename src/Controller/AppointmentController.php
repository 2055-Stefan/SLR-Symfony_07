<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Repository\AppointmentRepository;
use App\Entity\UserActivity;



final class AppointmentController extends AbstractController
{
    #[Route('/appointments', name: 'appointments_list')]
    public function list(Request $request, AppointmentRepository $repository): Response {

        $appointments = $repository->findAll();

        return $this->render('appointment/list.html.twig', [
            'appointments' => $appointments
        ]);
    }


    #[Route('/appointment/new', name: 'appointment_new')]
    public function index(Request $request, EntityManagerInterface $em): Response {

        $appointment = new Appointment();
        
        $form = $this->createForm(AppointmentType::class, $appointment);

        $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($appointment);

            $activity = new UserActivity();
            $activity->setAction("Appointment created");

            $em->persist($activity);

            $em->flush();

            return $this->redirectToRoute('app_portal');
        }


        return $this->render('appointment/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/appointments/search', name: 'appointments_search')]
    public function appointments(AppointmentRepository $repository, Request $request): Response
    {
        $status = $request->query->get('status');
        $eventId = $request->query->get('eventId');
        if ($status == "cancelled" || $status == "scheduled" || $status == "confirmed" ) {
            $appointments = $repository->findByStatus($status);
        }
        if($status == ""){
            $appointments = $repository->findAll();
        }
        if($eventId == 1) {
             $appointments = $repository->findByEvent($eventId);
        }

        return $this->render('appointment/list.html.twig', [
            'appointments' => $appointments
        ]);
    }

    #[Route('/appointment/{id}/edit', name: 'appointment_edit')]
    public function edit(Appointment $appointment, Request $request, EntityManagerInterface $em): Response {

        $form = $this->createForm(AppointmentType::class, $appointment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $activity = new UserActivity();
            $activity->setAction("Appointment updated");

            $em->persist($activity);

            $em->flush();

            return $this->redirectToRoute('appointments_list');
        }

        return $this->render('appointment/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/appointment/{id}/delete', name: 'appointment_delete', methods: ['POST'])]
    public function delete(Appointment $appointment, EntityManagerInterface $em): Response {
    
        $em->remove($appointment);

        $activity = new UserActivity();
        $activity->setAction("Appointment deleted");

        $em->persist($activity);

        $em->flush();

        return $this->redirectToRoute('appointments_list');
    }
}
