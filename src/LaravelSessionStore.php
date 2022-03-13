<?php

namespace Wavey\Sweetalert;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{
    private Store $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash the given message.
     *
     * @param string $key
     *
     * @return void
     */
    public function flash(string $key, $value = true)
    {
        $this->session->flash($key, $value);
    }

    public function remove($keys)
    {
        $this->session->forget($keys);
    }
}
