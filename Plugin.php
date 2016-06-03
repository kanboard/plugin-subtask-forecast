<?php

namespace Kanboard\Plugin\SubtaskForecast;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\SubtaskForecast\Model\SubtaskForecast;

class Plugin extends Base
{
    public function initialize()
    {
        $container = $this->container;

        $this->hook->on('controller:calendar:user:events', function ($user_id, $start, $end) use ($container) {
            $model = new SubtaskForecast($container);
            return $model->getCalendarEvents($user_id, $end);
        });
    }

    public function getPluginName()
    {
        return 'Subtask Forecast';
    }

    public function getPluginDescription()
    {
        return t('This plugin display estimates of subtasks in the user calendar.');
    }

    public function getPluginAuthor()
    {
        return 'Frédéric Guillot';
    }

    public function getPluginVersion()
    {
        return '1.0.2';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/kanboard/plugin-subtask-forecast';
    }
}
