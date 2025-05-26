<?php

namespace App\Helpers;

class GeneralHelper
{
    /**
     * Get the current date and time in 'Y-m-d H:i:s' format.
     */
    public static function getCurrentDateTime()
    {
        return date('Y-m-d H:i:s');
    }

    /**
     * Get the current date in 'Y-m-d' format.
     */
    public static function formatDate($date, $format = 'Y-m-d')
    {
        return date($format, strtotime($date));
    }

    /**
     * Get the current time in 'H:i:s' format.
     */
    public static function generateRandomString($length = 10)
    {
        return bin2hex(random_bytes($length / 2));
    }

    /**
     * Print the given data in a formatted manner using print_r.
     *
     * @param mixed $data The data to be printed.
     */
    function pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    /**
     * Print the given data in a formatted manner using print_r and then die.
     * 
     * Note: This function seems to be intended to work like "pre and die" but 
     * it's currently identical to the pre function. Consider adding a die or exit statement.
     *
     * @param mixed $data The data to be printed.
     */
    public static function pred($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}