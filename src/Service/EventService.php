<?php

namespace App\Service;

class EventService
{
    public function getCurrentEvents(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Summer Festival',
                'date' => '2026-07-10',
                'time' => '18:00',
                'location' => 'Town Hall',
                'description' => 'Live music and food'
            ]
        ];
    }
}
