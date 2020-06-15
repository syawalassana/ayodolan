<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    public function index(){
        $data_event= EventResource::collection(Event::all());
        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $data_event,
            'massage' => 'Data Event Kota',
        ]);
    }
}
