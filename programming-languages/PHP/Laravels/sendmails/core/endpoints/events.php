<?php
namespace core\endpoints;

use core\entities\event;
use core\helpers\auth;
use core\helpers\ArrObject;
use core\helpers\request;
use core\helpers\response;

trait events
{
    /**
     * List events belonging to a space.
     * @param
     * @ACL protected
     */
    public function getAllEvents($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to list events', null);
        $event = new Event($request);
        $events = $event->all($payload);
        $count = count($events);
        if ($count >= 0) {
            if ($count == 0) {
                $events = null;
            }
            $response->setResponse(1000, 'Got list of events successfully', $events);
        }

        return $response->getResponse();
    }

    /**
     * Get a particular event.
     * @param
     * @ACL protected
     */
    public function getAnEvent($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch event', []);
        $event = new Event($request);
        $event = $event->get($payload);
        $count = count($event);
        if ($count >= 0) {
            if ($count == 0) {
                $event = null;
            }
            $response->setResponse(1000, 'Got event successfully', $event);
        }

        return $response->getResponse();
    }

    /**
     * Get events belonging to a user.
     * @param
     * @ACL protected
     */
    public function getMyTickets($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch event', []);
        $event = new Event($request);
        $tickets = $event->getTickets($payload);
        $count = count($tickets['results']);
        if ($count >= 0) {
            if ($count == 0) {
                $tickets = null;
            }
            $response->setResponse(1000, 'Got tickets successfully', $tickets);
        }

        return $response->getResponse();
    }

    /**
     * Get attendees for an event.
     * @param
     * @ACL protected
     */
    public function getAttendees($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch attendees', []);
        $event = new Event($request);
        $attendees = $event->getAttendees($payload);
        $count = count($attendees);
        if ($count >= 0) {
            if ($count == 0) {
                $attendees = null;
            }
            $response->setResponse(1000, 'Got attendees successfully', $attendees);
        }

        return $response->getResponse();
    }

    /**
     * Get event categories.
     * @param
     * @ACL protected
     */
    public function getEventCategories()
    {
        $payload = new ArrObject($payload = []);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch categories', []);
        $event = new Event($request);
        $categories = $event->getCategories($payload);
        $count = count($categories);
        if ($count > 0) {
            if ($count == 0) {
                $categories = null;
            }
            $count = count($categories);
            $response->setResponse(1000, 'Got categories successfully',
                ['results' => $categories, 'properties' => ['current_count' => $count, 'total_count' => $count]]);
        }

        return $response->getResponse();
    }

    /**
     * Get attendees for an event (mobile).
     * @param
     * @ACL protected
     */
    public function getAttendeesMobile($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch attendees', []);
        $event = new Event($request);
        $attendees = $event->getAttendeesMobile($payload);
        $count = count($attendees);
        if ($count >= 0) {
            if ($count == 0) {
                $attendees = null;
            }
            $response->setResponse(1000, 'Got attendees successfully', $attendees);
        }

        return $response->getResponse();
    }

    /**
     * buy a ticket.
     * @param
     * @ACL public
     */
    public function attendAnEvent($payload)
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to purchase tickets', null);
        $event = new Event($request);
        $output = $event->ticketPurchase($payload);
        if ($output >= 0) {
            $response->setResponse(1000, 'Tickets purchased successfully', $output);
        }

        return $response->getResponse();
    }

    /**
     * ticket refund.
     * @param
     * @ACL protected
     */
    public function ticketRefund($payload)
    {
        $auth = new Auth();
        $auth->guardAndAllow(['allowedRoles' => [1]]);
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to refund tickets', null);
        $event = new Event($request);
        $output = $event->ticketRefund($payload);
        if ($output >= 0) {
            $response->setResponse(1000, 'Ticket refunded successfully', $output);
        }

        return $response->getResponse();
    }

    /**
     * ticket refund.
     * @param
     * @ACL public
     */
    public function getUpcomingEvents($payload = [])
    {
        $payload = new ArrObject($payload);
        $request = new Request($payload);
        $response = new Response(1001, 'Failed to fetch events', null);
        $event = new Event($request);
        $output = $event->getUpcomingEvents($payload);
        if (count($output['results']) > 0) {
            $response->setResponse(1000, 'fetched events successfully', $output);
        }

        return $response->getResponse();
    }
}
