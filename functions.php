<?php

/**
 * Add a global helper that will allow the use of sweetalert() throughout the application.
 *
 * @param string|null $message
 * @param string|null $title
 */
if (!function_exists('sweetalert')) {
    function sweetalert(string $message = null, string $title = '')
    {
        $notifier = app('wavey.sweetalert');

        if (!is_null($message)) {
            return $notifier->message($message, $title);
        }

        return $notifier;
    }
}
