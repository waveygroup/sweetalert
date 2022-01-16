<?php

namespace Wavey\Sweetalert;

interface SessionStore
{
    /**
     * Flash the session data.
     *
     * @param string $key
     * @param bool   $value
     *
     * @return mixed
     */
    public function flash(string $key, bool $value = true);

    /**
     * Remove Session Data.
     *
     * @param $keys
     *
     * @return mixed
     */
    public function remove($keys);
}
