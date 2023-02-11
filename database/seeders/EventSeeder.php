<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

const EVENTS = [
    [
        'name' => 'Event 1',
        'slug' => 'event-1',
        'start_date' => '2023-01-01',
        'end_date' => '2023-01-31',
    ],
    [
        'name' => 'Event 2',
        'slug' => 'event-2',
        'start_date' => '2023-02-01',
        'end_date' => '2023-02-28',
    ],
    [
        'name' => 'Event 3',
        'slug' => 'event-3',
        'start_date' => '2023-03-01',
        'end_date' => '2023-03-31',
    ],
    [
        'name' => 'Event 4',
        'slug' => 'event-4',
        'start_date' => '2023-04-01',
        'end_date' => '2023-04-30',
    ],
    [
        'name' => 'Event 5',
        'slug' => 'event-5',
        'start_date' => '2023-05-01',
        'end_date' => '2023-05-31',
    ],
    [
        'name' => 'Event 6',
        'slug' => 'event-6',
        'start_date' => '2023-06-01',
        'end_date' => '2023-06-30',
    ],
    [
        'name' => 'Event 7',
        'slug' => 'event-7',
        'start_date' => '2023-07-01',
        'end_date' => '2023-07-31',
    ],
    [
        'name' => 'Event 8',
        'slug' => 'event-8',
        'start_date' => '2023-08-01',
        'end_date' => '2023-08-31',
    ],
    [
        'name' => 'Event 9',
        'slug' => 'event-9',
        'start_date' => '2023-09-01',
        'end_date' => '2023-09-30',
    ],
    [
        'name' => 'Event 10',
        'slug' => 'event-10',
        'start_date' => '2023-10-01',
        'end_date' => '2023-10-31',
    ],
    [
        'name' => 'Event 11',
        'slug' => 'event-11',
        'start_date' => '2023-11-01',
        'end_date' => '2023-11-30',
    ],
    [
        'name' => 'Event 12',
        'slug' => 'event-12',
        'start_date' => '2023-12-01',
        'end_date' => '2023-12-31',
    ],
];

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = collect(EVENTS);

        $events->each(function ($item) {
            Event::updateOrCreate(
                [
                    'slug' => $item['slug'],
                ],
                [
                    'name' => $item['name'],
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                ]
            );
        });
    }
}
