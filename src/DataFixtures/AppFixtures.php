<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Appointment;
use App\Entity\Notification;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $statuses = ['scheduled', 'confirmed', 'cancelled'];
        $types = ['info', 'reminder', 'warning'];

        // =====================================================
        // =================== EVENT 1 ==========================
        // =====================================================

        $event1 = (new Event())
            ->setName('Citizen Information Evening')
            ->setStartsAt(new \DateTimeImmutable('+1 days 18:00'))
            ->setLocation('Town Hall - Main Auditorium')
            ->setDescription('An information evening for citizens about upcoming city projects and infrastructure developments.');
        $manager->persist($event1);

        // Appointment 1.1
        $appointment11 = (new Appointment())
            ->setTitle('Presentation: New City Park Project')
            ->setStartsAt(new \DateTimeImmutable('+1 days 18:30'))
            ->setEndsAt(new \DateTimeImmutable('+1 days 19:30'))
            ->setLocation('Main Auditorium')
            ->setStatus($statuses[array_rand($statuses)])
            ->setEvent($event1);
        $manager->persist($appointment11);

        $notification111 = (new Notification())
            ->setMessage('Reminder: The presentation starts in 30 minutes.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('reminder')
            ->setAppointment($appointment11);
        $manager->persist($notification111);

        $notification112 = (new Notification())
            ->setMessage('Please bring your questions regarding the park project.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('info')
            ->setAppointment($appointment11);
        $manager->persist($notification112);

        // Appointment 1.2
        $appointment12 = (new Appointment())
            ->setTitle('Q&A Session with City Council')
            ->setStartsAt(new \DateTimeImmutable('+1 days 19:45'))
            ->setEndsAt(new \DateTimeImmutable('+1 days 20:30'))
            ->setLocation('Main Auditorium')
            ->setStatus($statuses[array_rand($statuses)])
            ->setEvent($event1);
        $manager->persist($appointment12);

        $notification121 = (new Notification())
            ->setMessage('The Q&A session will begin shortly.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('reminder')
            ->setAppointment($appointment12);
        $manager->persist($notification121);

        $notification122 = (new Notification())
            ->setMessage('Please respect speaking time limits.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('warning')
            ->setAppointment($appointment12);
        $manager->persist($notification122);


        // =====================================================
        // =================== EVENT 2 ==========================
        // =====================================================

        $event2 = (new Event())
            ->setName('Health Awareness Day')
            ->setStartsAt(new \DateTimeImmutable('+2 days 10:00'))
            ->setLocation('Community Health Center')
            ->setDescription('A public health awareness event offering free check-ups and consultations.');
        $manager->persist($event2);

        $appointment21 = (new Appointment())
            ->setTitle('Free Blood Pressure Check')
            ->setStartsAt(new \DateTimeImmutable('+2 days 10:30'))
            ->setEndsAt(new \DateTimeImmutable('+2 days 12:00'))
            ->setLocation('Room A1')
            ->setStatus($statuses[array_rand($statuses)])
            ->setEvent($event2);
        $manager->persist($appointment21);

        $notification211 = (new Notification())
            ->setMessage('Please arrive 10 minutes early for registration.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('info')
            ->setAppointment($appointment21);
        $manager->persist($notification211);

        $notification212 = (new Notification())
            ->setMessage('Bring your health insurance card.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('reminder')
            ->setAppointment($appointment21);
        $manager->persist($notification212);

        $appointment22 = (new Appointment())
            ->setTitle('Nutrition Consultation')
            ->setStartsAt(new \DateTimeImmutable('+2 days 13:00'))
            ->setEndsAt(new \DateTimeImmutable('+2 days 15:00'))
            ->setLocation('Room B2')
            ->setStatus($statuses[array_rand($statuses)])
            ->setEvent($event2);
        $manager->persist($appointment22);

        $notification221 = (new Notification())
            ->setMessage('Consultation slots are limited.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('warning')
            ->setAppointment($appointment22);
        $manager->persist($notification221);

        $notification222 = (new Notification())
            ->setMessage('Healthy snack samples will be provided.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('info')
            ->setAppointment($appointment22);
        $manager->persist($notification222);


        // =====================================================
        // =================== EVENT 3 ==========================
        // =====================================================

        $event3 = (new Event())
            ->setName('Local Business Networking Night')
            ->setStartsAt(new \DateTimeImmutable('+3 days 17:00'))
            ->setLocation('Business Center')
            ->setDescription('An evening for local entrepreneurs to connect and present their businesses.');
        $manager->persist($event3);

        $appointment31 = (new Appointment())
            ->setTitle('Startup Pitch Session')
            ->setStartsAt(new \DateTimeImmutable('+3 days 17:30'))
            ->setEndsAt(new \DateTimeImmutable('+3 days 18:30'))
            ->setLocation('Conference Room 1')
            ->setStatus($statuses[array_rand($statuses)])
            ->setEvent($event3);
        $manager->persist($appointment31);

        $notification311 = (new Notification())
            ->setMessage('Each pitch is limited to 5 minutes.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('warning')
            ->setAppointment($appointment31);
        $manager->persist($notification311);

        $notification312 = (new Notification())
            ->setMessage('Projector and presentation tools are available.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('info')
            ->setAppointment($appointment31);
        $manager->persist($notification312);

        $appointment32 = (new Appointment())
            ->setTitle('Open Networking Session')
            ->setStartsAt(new \DateTimeImmutable('+3 days 18:45'))
            ->setEndsAt(new \DateTimeImmutable('+3 days 20:00'))
            ->setLocation('Lobby Area')
            ->setStatus($statuses[array_rand($statuses)])
            ->setEvent($event3);
        $manager->persist($appointment32);

        $notification321 = (new Notification())
            ->setMessage('Exchange business cards with participants.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('reminder')
            ->setAppointment($appointment32);
        $manager->persist($notification321);

        $notification322 = (new Notification())
            ->setMessage('Refreshments are available at the bar.')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setType('info')
            ->setAppointment($appointment32);
        $manager->persist($notification322);

        $manager->flush();
    }
}