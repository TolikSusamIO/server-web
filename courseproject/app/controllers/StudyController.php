<?php

namespace App\controllers;

use App\core\Controller;

class StudyController extends Controller
{
    public function calculatorForm(): void
    {
        $this->view('study/calculator', [
            'title' => 'Калькулятор времени на учебу',
        ]);
    }

    public function calculate(): void
    {
        $days = (int)($_POST['days'] ?? 0);
        $minutesPerDay = $_POST['minutes'] ?? [];

        $totalMinutes = 0;
        $details = [];

        for ($i = 0; $i < $days; $i++) {
            $m = (int)($minutesPerDay[$i] ?? 0);
            $totalMinutes += $m;
            $details[] = $m;
        }

        $hours = intdiv($totalMinutes, 60);
        $restMinutes = $totalMinutes % 60;

        $this->view('study/calculator', [
            'title' => 'Калькулятор времени на учебу',
            'days' => $days,
            'details' => $details,
            'totalMinutes' => $totalMinutes,
            'hours' => $hours,
            'restMinutes' => $restMinutes,
        ]);
    }
}
