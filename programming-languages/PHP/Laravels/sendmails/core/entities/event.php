<?php
namespace core\entities;

use App\Helpers\DataStore as DS;
use App\Helpers\Helper;
use core\entities\log;
use core\entities\Workspace;
use core\Helpers\Actions;
use core\Helpers\Auth as authHelper;
use core\helpers\ArrObject;
use core\Helpers\Querybuilder;
use core\resources\Email;
use core\resources\Payment;

class Event
{
    private $jsonFields = ['images', 'tags', 'settings'];
    private $userProfile = null;

    public function __construct($request)
    {
        $this->userProfile = $request->requestPayload['profile'];
    }
    public function all($payload)
    {
        $query = \DB::table('core_events');

        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }
        $total_count = $query->count();
        $events = QueryBuilder::mainPaginate($query, $payload);
        // $events = QueryBuilder::resolveRelations($query, $payload);
        $events = $query->get();
        // $events = QueryBuilder::clenseData($events);
        if (!$events) {
            return null;
        }
        $output = [];
        $count = count($events);
        $output['results'] = QueryBuilder::defineJsonFields(
            $events,
            $this->jsonFields
        );
        $output['properties'] = ['current_count' => $count, 'total_count' => $total_count];

        return $output;
    }

    public function getCategories($payload = [])
    {
        $output = \DB::table('core_event_categories')->get();
        return $output;
    }
    public function getUpcomingEvents($payload)
    {
        $date = Date('d/m/Y');
        $date = Actions::getSystemDateFormat($date);
        $query = \DB::table('core_events');
        if ($payload->get('category')) {
            $category = $payload->get('category');
            $query = $query->where('core_event_categories_id', $category);
        }
        $query = $query->whereRaw("STR_TO_DATE(`date`, '%d/%m/%Y') >=
             Date('" . $date . "')");
        $query = $query->leftJoin('core_event_categories', 'core_event_categories_id', '=', 'core_event_categories.id')
            ->select(
                '*',
                'core_event_categories.id as category_id',
                "core_event_categories.name as category",
                "core_events.description as description",
                "core_events.title as name",
                "core_events.id as id"
            );
        $total_count = $query->count();
        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }

        $events = QueryBuilder::mainPaginate($query, $payload);

        $events = $query->get();
        if (!$events) {
            return null;
        }
        $output = [];
        $output['results'] = QueryBuilder::defineJsonFields(
            $events,
            $this->jsonFields
        );
        $results = [];
        foreach ($output['results'] as $event) {
            $attendees = \DB::table('core_event_attendees')->where('core_events_id', $event->id)->get();

            $userIds = array_values(array_unique(collect($attendees)->lists('users_id')->toArray()));
            $attendeeProfiles = \DB::table('users')->leftJoin('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
                ->select("users.email", "users.first_name", "users.last_name", "devless_user_profile.profile_pic")
                ->whereIn('users.id', $userIds)->get();

            $event->fully_booked = ((int) $event->number_of_tickets > count($attendees)) ? null : 1;
            $event->attendees = $attendeeProfiles;
            $results[] = $event;
        }
        $current_count = count($events);
        return ['results' => $results,
            'properties' => ['current_count' => $current_count, 'total_count' => $total_count]];
    }

    public function get($payload)
    {
        $eventId = $payload->get('event_id');
        $resolveRelations = $payload->get('resolve_relations');
        $query = DS::service('core', 'events')->where('id', $eventId);
        $event = QueryBuilder::resolveRelations($query, $payload);
        $event = $query->getData();
        $event = QueryBuilder::clenseData($event);
        $event['results'] = QueryBuilder::defineJsonFields(
            $event['results'],
            $this->jsonFields
        );
        if ($resolveRelations && isset($event['results'][0]->id)) {
            $attendees = \DB::table('core_event_attendees')->where('core_events_id', $eventId)->get();
            if (isset($event['results'][0]->related)) {
                $categoryName = "";
                if (isset($event['results'][0]->related['event_categories'][0])) {
                    $categoryName = $event['results'][0]->related['event_categories'][0]->name;
                }
                $event['results'][0]->category = $categoryName;
                $event['results'][0]->attendees = $attendees;
                unset($event['results'][0]->related);
            }
        }
        return $event;
    }

    public function getAttendees($payload)
    {
        $query = DS::service('core', 'event_attendees');

        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }

        $eventId = $payload->get('event_id');
        $attendees = QueryBuilder::paginate($query, $payload);
        $attendees = QueryBuilder::resolveRelations($query, $payload);
        $attendees = $attendees->where('core_events_id', $eventId)->getData();
        $attendees = QueryBuilder::clenseData($attendees);
        if (!$attendees) {
            return null;
        }
        $attendees['results'] = QueryBuilder::defineJsonFields(
            $attendees['results'],
            $this->jsonFields
        );
        $count = 0;
        foreach ($attendees['results'] as $attendee) {
        }
        $attendee->ticket = 'NA';
        $count++;
        return $attendees;
    }

    public function getAttendeesMobile($payload)
    {
        $query = \DB::table('core_event_attendees');
        if (!$this->userProfile) {
            return null;
        }
        $profile = $this->userProfile;
        $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        $total_count = $query->where('core_events_id', $payload->get('event_id'))->count();
        $attendees = QueryBuilder::mainPaginate($query, $payload);
        $attendees = $attendees->where('core_event_attendees.core_events_id', $payload->get('event_id'))
            ->leftjoin('devless_user_profile', 'core_event_attendees.users_id', '=', 'devless_user_profile.users_id')->get();
        foreach ($attendees as $attendee) {
            $attendee->ticket = 'NA';
            $attendee->payment_token = 'NA';
            $attendee->charge = 'NA';
        }

        if (!$attendees) {
            return null;
        }
        $output = [];
        $count = count($attendees);
        $attendees = QueryBuilder::defineJsonFields(
            $attendees,
            $this->jsonFields
        );

        $attendees = array_values($attendees);
        $output['results'] = $attendees;
        $output['properties'] = ['current_count' => $count, 'total_count' => $total_count];
        return $output;
    }

    public function getTickets($payload)
    {
        $query = DS::service('core', 'event_attendees');

        if ($this->userProfile) {
            $profile = $this->userProfile;
            $query = QueryBuilder::fetchBasedOnWorkspace($query, $profile);
        }
        $userId = $this->userProfile['id'];
        $eventId = $payload->get('event_id');
        $tickets = QueryBuilder::paginate($query, $payload);
        $tickets = QueryBuilder::resolveRelations($query, $payload);
        $query = $query->where('users_id', $userId);
        if ($eventId) {
            $query = $query->where('core_events_id', $eventId);
        }
        $tickets = $query->getData();
        $tickets = QueryBuilder::clenseData($tickets);
        if (!$tickets) {
            return null;
        }
        $tickets['results'] = QueryBuilder::defineJsonFields(
            $tickets['results'],
            $this->jsonFields
        );

        return $tickets;
    }
    public function ticketRefund($payload)
    {
        //NB: currently there are no checks to see if event is past as admin is responsible for refunds
        $ticketCode = $payload->get('ticket_code');
        $record = DS::service('core', 'event_attendees')->where('ticket', $ticketCode)->getData();
        $record = $record['payload']['results'];
        if (!$record) {
            Helper::interrupt(1001, 'Sorry but your entry is not a valid ticket');
        }
        $charge = $record[0]->charge;
        $payment = new Payment();
        $refunded = $payment->refund($charge);
        $userId = $record[0]->users_id;
        $workspaceId = $record[0]->core_workspace_id;
        if (!$refunded) {
            Log::write(['code' => 'failed_event_ticket_refund', 'message' => 'Refund could not be made by the payment process for an event ticket refund', 'type' => 'error', 'workspace_id' => $workspaceId, 'users_id' => $userId]);
            Helper::interrupt(1001, 'Sorry but an automatic refund could not be done, Please reach out to your admin to resolve this');
        }
        $emailer = new Email();
        if ($event = \DB::table('core_event_attendees')
            ->join('core_events', 'core_event_attendees.core_events_id', '=', 'core_events.id')
            ->where('ticket', $ticketCode)->first()) {
            $email = $event->email;
            $title = $event->title;
            $output = \DB::table('core_event_attendees')->where('ticket', $ticketCode)->delete();
            (!$output) ? Log::write(['code' => 'failed_event_ticket_refund', 'message' => 'A users ticket has been paid a ticket refund but the record still persists please contact the system admin', 'type' => 'error', 'workspace_id' => $workspaceId, 'users_id' => $userId])
            : Log::write(['code' => 'event_ticket_refund', 'message' => 'A refund for event ticket was issued ', 'type' => 'event_ticket_refund', 'workspace_id' => $workspaceId, 'users_id' => $userId]);
        }

        $output = $emailer->send($email, 'event_notification', ['ticket' => $ticketCode, 'body' => "The ticket $ticketCode
        you purchased for the $title event has fully been refunded",
            'ticket' => $ticketCode]);
        return [];
    }

    public function ticketPurchase($payload)
    {
        $eventId = $payload->get('event_id');
        $event = $this->get((new ArrObject(['event_id' => $eventId, 'resolve_relations' => true])));
        $event = (isset($event['results'][0])) ? $event['results'][0] : Helper::interrupt(1001, 'No such event exists');

        if (\Carbon\Carbon::parse(Actions::getSystemDateFormat($event->date) . '' . $event->time)->isPast()) {
            Helper::interrupt(1001, 'Sorry but the event you are trying to book is past (' . $event->date . ' ' . $event->time . ')');
        }
        $authHelper = new authHelper();
        if ($this->userProfile) {
            $authHelper = new authHelper();
            if ($authHelper->getLoggedInUserRole() == 1 && $payload->get('client_id')) {
                $profile = (array) \DB::table('users')->where('users.id', $payload->get('client_id'))
                    ->join('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
                    ->first();
                if (!$profile) {
                    Helper::interrupt(1001, 'Sorry but there no such user was found in the system');
                }
            } else {
                $profile = $this->userProfile;
            }
            $userId = $profile['users_id'];
            $name = $profile['first_name'] . ' ' . $profile['last_name'];
            $phone_number = $profile['phone_number'];
            $email = $profile['email'];
            $payment_token = $profile['payment_token'];
        } else {
            (!$event->members_only) ? '' : Helper::interrupt(1001, 'Sorry but this is a private event,
            You need to signin or be a member to attend');
            $name = ($payload->get('name')) ? $payload->get('name') :
            Helper::interrupt(1001, 'You need to set the users `name`');
            $phone_number = ($payload->get('phone_number')) ? $payload->get('phone_number') :
            Helper::interrupt(1001, 'You need to set the users `phone_number`');
            $email = ($payload->get('email')) ? $payload->get('email') :
            Helper::interrupt(1001, 'You need to set the users `email`');
            $payment_token = ($payload->get('payment_token')) ? $payload->get('payment_token') :
            Helper::interrupt(1001, 'You need to set the users `payment_token`');

            $userId = null;
        }
        $booking_date = date("F j, Y, g:i a");
        $numberOfTickets = $payload->get('number_of_tickets');
        $email_subject = $event->email_subject;
        $email_content = $event->email_content;
        $emailer = new Email();
        if (!$event) {
            Helper::interrupt(1001, 'Sorry no such event exists');
        }
        $this->checkAvailability($event, $numberOfTickets);
        $payment = new Payment();
        $workspace = new Workspace($event->core_workspace_id);
        $eventTitle = $event->title;
        $eventPrice = $event->price;
        $currency = $workspace->get('currency');
        $charged = $payment->chargeCard($eventPrice * $numberOfTickets, $currency, $payment_token, 'Payment of ' . strtoupper($currency) . ' ' . $eventPrice . ' for ' . $numberOfTickets . ' ticket(s) to attend ' . $eventTitle, null, $payload->get('payment_token'));
        if (!$charged) {
            Log::write(['code' => 'failed_event_ticket_purchase', 'message' => 'An attempt to purchase an event ticket failed because the customers card could not be charged', 'type' => 'error', 'workspace_id' => $event->core_workspace_id, 'users_id' => $userId]);
            Helper::interrupt(1001, 'Sorry but your card could not be charged');
        }
        // dd("stp[", $userId, $profile);
        $ticket = uniqid();
        $output = \DB::table('core_event_attendees')
            ->insert(['event_date' => $event->date, 'ticket' => $ticket, 'name' => $name, 'core_workspace_id' => $event->core_workspace_id,
                'users_id' => $userId, 'core_events_id' => $eventId, 'number_of_tickets' => $numberOfTickets,
                'phone_number' => $phone_number, 'email' => $email, 'booking_date' => $booking_date,
                'payment_token' => $payment_token, 'charge' => (isset($charged->id)) ? $charged->id : null]);
        $email_sent = $emailer->send($email, 'event_notification', ['subject' => $email_subject, 'body' => $email_content, 'ticket' => $ticket]);
        $output = (!$output || !$email_sent) ? Log::write(['code' => 'failed_event_ticket_purchase', 'message' => 'An attempt to purchase an event ticket failed', 'type' => 'error', 'workspace_id' => $event->core_workspace_id, 'users_id' => $userId]) :
        Log::write(['code' => 'event_ticket_purchase', 'message' => 'A customer purchased a ticket to attend an event', 'type' => 'error', 'workspace_id' => $event->core_workspace_id, 'users_id' => $userId]);
        return $ticket;
    }
    private function checkAvailability($event, $numberOfTickets)
    {
        $numberOfAttendees = collect($event->attendees)->sum('number_of_tickets');
        $availabaleTickets = $event->number_of_tickets;
        if (($numberOfAttendees + $numberOfTickets) > $availabaleTickets) {
            $remainingTickets = $availabaleTickets - $numberOfAttendees;
            Helper::interrupt(1001, 'Sorry we have ' . $remainingTickets . ' tickets available');
        }
        return true;
    }
}
