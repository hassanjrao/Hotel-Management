<?php

namespace App\Traits;

trait DaysTrait
{
    public function weekDays()
    {
        return  [
            [
                'code' => 'mon',
                'name' => 'Monday',
            ],
            [
                'code' => 'tue',
                'name' => 'Tuesday',
            ],
            [
                'code' => 'wed',
                'name' => 'Wednesday',
            ],
            [
                'code' => 'thu',
                'name' => 'Thursday',
            ],
            [
                'code' => 'fri',
                'name' => 'Friday',
            ],
            [
                'code' => 'sat',
                'name' => 'Saturday',
            ],
            [
                'code' => 'sun',
                'name' => 'Sunday',
            ],
        ];
    }
}
