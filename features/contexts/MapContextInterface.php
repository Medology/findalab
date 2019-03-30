<?php namespace features\contexts;

/*
 * This file is part of the Find A Lab Project.
 *
 * Copyright © 2016-2019 FPK Services, LLC.
 * All rights are reserved.
 */

use Behat\Mink\Exception\ExpectationException;
use Exception;

/**
 * Behat context for testing findalab map content.
 */
trait MapContextInterface
{
    /**
     * Asserts that there are a certain number of pins on the google map displayed on the page.
     *
     * @param  int                  $number The number of pins to check for. Defaults to 1.
     * @throws ExpectationException if there are more or less than $number of pins
     */
    abstract public function assertPinsOnMap($number = 1);

    /**
     * Clicks on the marker by its title.
     *
     * @param  string    $title The title of the marker
     * @throws Exception When marker not found
     */
    abstract public function clickMarkerByTitle($title);

    /**
     * Assert if the lab with title appears in the view port of search result.
     *
     * @param  null|string $not   If the lab should appear.
     * @param  string      $title The title of the lab.
     * @throws Exception   When Lab is not found in the search result.
     * @return bool
     */
    abstract public function assertLabResultVisible($not, $title);

    /**
     * Assert if the map is zoomed to a particular level.
     *
     * @param  int       $level The expected minimum zoom level of the map.
     * @throws Exception if the map is not zoomed in to at least the given level.
     */
    abstract public function assertMapZoom($level);
}
