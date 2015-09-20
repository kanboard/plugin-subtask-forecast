<?php

namespace Plugin\SubtaskForecast;

use Core\Plugin\Base;
use Plugin\SubtaskForecast\Model\SubtaskForecast;

class Plugin extends Base
{
    public function initialize()
    {
        $container = $this->container;

        $this->hook->on('controller:calendar:user:events', function($user_id, $start, $end) use ($container) {
            $model = new SubtaskForecast($container);
            return $model->getCalendarEvents($user_id, $end);
        });
    }
}
