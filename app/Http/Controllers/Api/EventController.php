<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $e = Event::whereDate('tgl_mulai', '<=', Carbon::now())->whereDate('tgl_selesai', '>=', Carbon::now())->orderBy('created_at', 'DESC')->get();

        $data_event = EventResource::collection($e);

        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $data_event,
            'massage' => 'Data Event Kota',
        ]);
    }
}
