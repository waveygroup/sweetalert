<?php

if (!function_exists('sweetalert')) {
    function sweetalert($message = null, $title = '')
    {
        $notifier = app('wavey.sweetalert');

        if (!is_null($message)) {
            return $notifier->message($message, $title);
        }

        return $notifier;
    }
}
