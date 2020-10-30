<?php
/**
 * User: jtodd
 * Date: 2020-10-29
 * Time: 19:01
 */

namespace App\Console\Commands;


use App\Models\Usage;
use Illuminate\Console\Command;

class Import extends Command
{
    protected $signature = 'import';

    public function handle()
    {
        $usageFilePath = app()->storagePath() . '/usage.json';
        $data = json_decode(file_get_contents($usageFilePath));
        $today = time();
        foreach ($data->usageMonths as $month) {
            $begin = strtotime($month->startDate);
            $end = strtotime($month->endDate);
            if ($today >= $begin && $today <= $end) {
                $usage = [
                    'day' => date('d', $today),
                    'month' => date('m', $today),
                    'year' => date('Y', $today),
                    'total' => $month->totalUsage,
                    'allowable' => $month->allowableUsage,
                    'remaining' => $month->allowableUsage - $month->totalUsage,
                    'delta' => $month->totalUsage,
                ];

                $lastDay = Usage::where('day', '<', $usage['day'])
                    ->where([
                        'month' => $usage['month'],
                        'year' => $usage['year'],
                    ])
                    ->orderBy('day', 'desc')
                    ->first();
                if ($lastDay !== null) {
                    $usage['delta'] -= $lastDay->total;
                }
                Usage::create($usage);
            }
        }
    }
}
