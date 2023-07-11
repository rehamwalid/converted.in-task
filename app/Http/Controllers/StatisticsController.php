<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Spatie\QueryBuilder\QueryBuilder;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $stats = QueryBuilder::for(Statistics::class)->defaultSort('-tasks_no')
            ->limit(10)->get();

        return view('stats-index', ['stats'=>$stats]);
    }

}
