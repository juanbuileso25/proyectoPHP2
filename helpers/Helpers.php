<?php

class Utils
{
    static public function deleteSessions($session)
    {
        $_SESSION[$session] = null;

        unset($_SESSION[$session]);
    }
}
