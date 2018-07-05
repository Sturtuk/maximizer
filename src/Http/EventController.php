<?php

namespace Sturt\Maximizer\LaravelSlackEvents\Http;

use Illuminate\Http\Request;
use \Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Event;
use Sturt\Maximizer\LaravelSlackEvents\EventCreator;
use Sturt\Maximizer\LaravelSlackEvents\Events\Base\SlackEvent;

/**
 * Class EventController
 *
 * @package Sturt\Maximizer\LaravelSlackEvents
 */
class EventController extends Controller
{
    /**
     * EventController constructor.
     */
    public function __construct()
    {
        $this->middleware(EventMiddleware::class);
    }

    /**
     * Fire slack event
     *
     * @param Request $request
     * @param EventCreator $events
     * @return SlackEvent
     */
    public function fire(Request $request, EventCreator $events)
    {
        $event = $events->make($request->input('event.type'));
        $event->setFromRequest($request);
        Event::fire($event);

        return response('Event received', 200);
    }
}
