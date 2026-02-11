<?php

namespace App\Service;

final class EventService
{
    private array $events = [
        1 => [
            'id' => 1,
            'name' => 'Summer Festival',
            'date' => '2026-07-10',
            'time' => '18:00',
            'location' => 'Town Hall',
            'description' => 'Live music and food',
        ],
        2 => [
            'id' => 2,
            'name' => 'Christmas Market',
            'date' => '2026-12-01',
            'time' => '15:00',
            'location' => 'Main Square',
            'description' => 'Traditional market with food and crafts',
        ],
        3 => [
            'id' => 3,
            'name' => 'Sports Day',
            'date' => '2026-09-05',
            'time' => '10:00',
            'location' => 'Sports Center',
            'description' => 'Local teams, games, and activities.',
        ],
    ];

    // US 2
    public function getCurrentEvents(): array
    {
        return array_values(array_slice($this->events, 0, 2, true));
    }

    // US 3
    public function getUpcomingEvents(): array
    {
        return array_values($this->events);
    }

    public function getEventById(int $id): ?array
    {
        return $this->events[$id] ?? null;
    }
}
