<?php
namespace core\entities;

use App\Helpers\Helper;
use core\Helpers\Querybuilder;

class Bookings
{
    protected $userProfile;
    public function __construct($request = [])
    {
        if (count($request)) {
            $this->userProfile = $request->requestPayload['profile'];
        }
    }

    public function getAllBookings($payload)
    {
        $date = $payload->get('date');
        $workspaceId = $payload->get('workspace_id');
        if (!$date || !$workspaceId) {
            Helper::interrupt(1001, 'You need to set both the `date` and `workspace_id`');
        }
        $roomBookings = \DB::table('core_room_bookings')->where('when', 'like', "%{$date}%")
            ->where('core_workspace_id', $workspaceId)->get();
        $wellness = \DB::table('core_wellness_bookings')->where('date', 'like', "%{$date}%")->where('core_workspace_id', $workspaceId)->get();
        $reservations = \DB::table('core_restaurant_reservations')->where('date', 'like', "%{$date}%")->where('core_workspace_id', $workspaceId)->get();
        // $wellness = QueryBuilder::defineJsonFields($wellness, ['slots', 'images']);
        //  ->join('core_rooms', 'core_rooms.id', '=', 'core_room_bookings.core_rooms_id')->get();

        return [
            'roomBookings' => $roomBookings,
            'wellness' => $wellness,
            'restaurantReservations' => $reservations,
        ];
    }

    public function getUsersBookingSchedules($payload)
    {
        if (!$this->userProfile) {
            return false;
        }
        $userId = $this->userProfile['id'];
        $fromDate = $payload->get('from_date');
        $specificDate = $payload->get('specific_date');
        $date = Date('d/m/Y');

        $date = ($specificDate) ? $specificDate : $date;
        $date = ($fromDate) ? $fromDate : $date;

        $reverseDate = (function () use ($date) {
            $split = explode('/', $date);
            return $split[2] . '-' . $split[1] . '-' . $split[0];
        });
        $date = $reverseDate();
        $condition = ($specificDate && !$fromDate) ? '=' : '>=';
        $jsonFields = [
            'images',
            'amenities',
            'slots',
        ];
        $uniqueEvents = [];
        $events = \DB::table('core_event_attendees')->where('users_id', $userId)
            ->leftJoin('core_events', 'core_events.id', '=', 'core_event_attendees.core_events_id')
            ->leftJoin('core_event_categories', 'core_events.core_event_categories_id', '=', 'core_event_categories.id')
            ->select(
                '*',
                'core_events.id',
                "core_events.title as name",
                'core_events.images',
                "core_events.description as description",
                'core_events.date',
                'core_events.time',
                'core_events.venue',
                'core_event_attendees.ticket',
                'core_event_categories.id as category_id',
                "core_event_categories.name as category"

            )
            ->whereRaw("STR_TO_DATE(`event_date`, '%d/%m/%Y') $condition  Date('" . $date . "')")->get();

        $setEventIds = [];
        foreach ($events as $event) {
            if (!in_array($event->id, $setEventIds)) {
                $uniqueEvents[] = $event;
                $setEventIds[] = $event->id;
            }
        }
        $events = $uniqueEvents;
        $eventWithAttendence = [];
        foreach ($events as $event) {
            $attendees = \DB::table('core_event_attendees')->where('core_events_id', $event->id)->get();

            $userIds = array_values(array_unique(collect($attendees)->lists('users_id')->toArray()));
            $attendeeProfiles = \DB::table('users')->leftJoin('devless_user_profile', 'users.id', '=', 'devless_user_profile.users_id')
                ->select("users.email", "users.first_name", "users.last_name", "devless_user_profile.profile_pic")
                ->whereIn('users.id', $userIds)->get();

            $event->fully_booked = ((int) $event->number_of_tickets > count($attendees)) ? null : 1;
            $event->attendees = $attendeeProfiles;
            $eventWithAttendence[] = $event;
        }
        $events = $eventWithAttendence;
        $roomBookings = \DB::table('core_room_bookings')->where('core_room_bookings.users_id', $userId)
            ->leftJoin('core_rooms', 'core_rooms.id', '=', 'core_room_bookings.core_rooms_id')
            ->leftJoin(
                'core_room_categories',
                'core_rooms.core_room_categories_id',
                '=',
                'core_room_categories.id'
            )
            ->select(
                '*',
                'core_rooms.id as id',
                'core_room_categories.name as category',
                'core_rooms.description as description',
                'core_rooms.name as name'
            )
            ->whereRaw("STR_TO_DATE(`when`, '%d/%m/%Y') $condition Date('" . $date . "')")->get();

        $wellness = \DB::table('core_wellness_bookings')->where('core_wellness_bookings.users_id', $userId)
            ->leftJoin('core_wellness_sessions', 'core_wellness_sessions.id', '=', 'core_wellness_bookings.core_wellness_sessions_id')
            ->select('*', 'core_wellness_sessions.id as id', 'core_wellness_sessions.description as description')

            ->whereRaw("STR_TO_DATE(`date`, '%d/%m/%Y') $condition Date('" . $date . "')")->get();

        $reservations = \DB::table('core_restaurant_reservations')->where('core_restaurant_reservations.users_id', $userId)
            ->leftJoin('core_restaurant', 'core_restaurant.id', '=', 'core_restaurant_reservations.core_restaurant_id')
            ->select('*', 'core_restaurant.id as id', 'core_restaurant.description as description')

            ->whereRaw("STR_TO_DATE(`date`, '%d/%m/%Y') $condition Date('" . $date . "')")->get();

        $eatries = \DB::table('core_eatry_orders')->where('core_eatry_orders.users_id', $userId)
            ->leftJoin('core_eatry', 'core_eatry.id', '=', 'core_eatry_orders.core_eatry_id')
            ->leftJoin('core_eatry_specials', 'core_eatry_specials.id', '=', 'core_eatry.core_eatry_specials_id')
            ->select(
                '*',
                'core_eatry.id as id',
                'core_eatry.description as description',
                'core_eatry.name as name',
                \DB::Raw("DATE_FORMAT(from_unixtime(core_eatry_orders.timestamp),'%d/%m/%Y') as date")
            )

            ->whereRaw("DATE_FORMAT(FROM_UNIXTIME(core_eatry_orders.timestamp),'%Y-%m-%d') $condition Date('" . $date . "')")
            ->get();
        $events = QueryBuilder::defineJsonFields(
            $events,
            $jsonFields
        );

        $roomBookings = QueryBuilder::defineJsonFields(
            $roomBookings,
            $jsonFields
        );

        $wellness = QueryBuilder::defineJsonFields(
            $wellness,
            $jsonFields
        );

        $reservations = QueryBuilder::defineJsonFields(
            $reservations,
            $jsonFields
        );

        $eatries = QueryBuilder::defineJsonFields(
            $eatries,
            $jsonFields
        );

        return [
            'event_bookings' => $events,
            'room_bookings' => $roomBookings,
            'wellness_sessions' => $wellness,
            'restaurant_reservations' => $reservations,
            'eatries' => $eatries,

        ];
    }
}
