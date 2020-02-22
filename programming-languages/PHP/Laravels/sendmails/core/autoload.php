<?php

spl_autoload_register(function ($class) {
    //Endpoints
    require_once '../resources/views/service_views/core/endpoints/customers.php';
    require_once '../resources/views/service_views/core/endpoints/options.php';
    require_once '../resources/views/service_views/core/endpoints/admin.php';
    require_once '../resources/views/service_views/core/endpoints/auth.php';
    require_once '../resources/views/service_views/core/endpoints/rooms.php';
    require_once '../resources/views/service_views/core/endpoints/restaurants.php';
    require_once '../resources/views/service_views/core/endpoints/eatries.php';
    require_once '../resources/views/service_views/core/endpoints/wellness.php';
    require_once '../resources/views/service_views/core/endpoints/events.php';
    require_once '../resources/views/service_views/core/endpoints/general.php';
    require_once '../resources/views/service_views/core/endpoints/logs.php';

    //Users
    require_once '../resources/views/service_views/core/users/customers.php';
    require_once '../resources/views/service_views/core/users/admin.php';

    //Helpers
    require_once '../resources/views/service_views/core/helpers/request.php';
    require_once '../resources/views/service_views/core/helpers/response.php';
    require_once '../resources/views/service_views/core/helpers/arrObject.php';
    require_once '../resources/views/service_views/core/helpers/auth.php';
    require_once '../resources/views/service_views/core/helpers/queryBuilder.php';
    require_once '../resources/views/service_views/core/helpers/actions.php';

    //Entities
    require_once '../resources/views/service_views/core/entities/options.php';
    require_once '../resources/views/service_views/core/entities/auth.php';
    require_once '../resources/views/service_views/core/entities/workspace.php';
    require_once '../resources/views/service_views/core/entities/membership.php';
    require_once '../resources/views/service_views/core/entities/room.php';
    require_once '../resources/views/service_views/core/entities/restaurant.php';
    require_once '../resources/views/service_views/core/entities/eatry.php';
    require_once '../resources/views/service_views/core/entities/wellness.php';
    require_once '../resources/views/service_views/core/entities/event.php';
    require_once '../resources/views/service_views/core/entities/bookings.php';
    require_once '../resources/views/service_views/core/entities/log.php';
    require_once '../resources/views/service_views/core/entities/general.php';

    //resources
    require_once '../resources/views/service_views/core/resources/email.php';
    require_once '../resources/views/service_views/core/resources/payment.php';
    require_once '../resources/views/service_views/core/resources/pusher.php';
});
