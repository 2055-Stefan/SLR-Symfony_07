<?php

namespace App\Form;

use App\Entity\Appointment;
use App\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\AppointmentType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('startsAt', DateTimeType::class)
            ->add('endsAt', DateTimeType::class)
            ->add('location', TextType::class)
               ->add('status', ChoiceType::class, [
                'choices' => [
                    'Scheduled' => 'scheduled',
                    'Confirmed' => 'confirmed',
                    'Cancelled' => 'cancelled'
                ]
            ])
            ->add('event', EntityType::class, [
                'class' => Event::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
