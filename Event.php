<?php
/**
 * Load Assets files.
 */
namespace Plugin\Rating;


class Event
{
    /**
     * This method is launched before loading the controller.
     * Add JS and CSS files here.
     */
    public static function ipBeforeController()
    {
        ipAddJs('assets/script.js');
		ipAddCss('assets/style.css');
    }

}
