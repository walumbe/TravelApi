<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Travel;

class TourController extends Controller
{
    public function index(Travel $travel)
    {
        // $tours = Tour::where('travel_id', $travel->id)
        // ->orderBy('starting_date', 'desc')
        // ->paginate();
        $tours = $travel->tours()
        ->orderBy('starting_date', 'desc')
        ->paginate();

        return TourResource::collection($tours);
    }
}
