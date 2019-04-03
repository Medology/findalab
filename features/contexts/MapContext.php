<?php namespace features\contexts;

use Behat\FlexibleMink\PseudoInterface\MinkContextInterface;
use Behat\Mink\Element\NodeElement;
use Behat\Mink\Exception\ExpectationException;
use Exception;

/**
 * Behat context for testing findalab map content.
 */
trait MapContext
{
    // Implements
    use MapContextInterface;
    // Depends.
    use MinkContextInterface;

    /**
     * {@inheritdoc}
     * @Then there are :number pins on the map
     * @Then there is a pin on the map
     * @Then there is 1 pin on the map
     * @Then there should be :number pins on the map
     * @Then there should be a pin on the map
     * @Then there should be 1 pin on the map
     */
    public function assertPinsOnMap($number = 1)
    {
        // This rather awkward xpath expression finds all the pins on the map.
        $xpathString = '//*[contains(@class, "findalab__map__embed")]//img[contains(@src, "lab-marker-icon")]';

        $pins = $this->getSession()->getPage()->findAll('xpath', $xpathString);
        if (count($pins) != ($number * 2)) {
            throw new ExpectationException("Expected $number pins, but found " . count($pins) . ', instead.', $this->getSession());
        }
    }

    /**
     * {@inheritdoc}
     *
     * @When /^I click on the "(?P<title>[^"]*)" marker/
     */
    public function clickMarkerByTitle($title)
    {
        $this->waitFor(function () use ($title) {
            /** @var NodeElement $marker */
            $marker = $this->getSession()->getPage()->find('css', 'div[title="' . $title . '"]');

            if (!$marker) {
                throw new Exception("Marker \"$title\" not found on map");
            }

            $marker->click();
        });
    }

    /**
     * {@inheritdoc}
     *
     * @Then /^"(?P<title>[^"]*)" should (?:|(?P<not>not ))be in the viewport of search result$/
     */
    public function assertLabResultVisible($title, $not = null)
    {
        $labTitles = $this->getSession()->getPage()->findAll('css', '[data-findalab-result-title]');

        /** @var NodeElement $labTitle */
        foreach ($labTitles as $labTitle) {
            if ($labTitle->getText() == $title) {
                if ($not && $labTitle->isVisible()) {
                    throw new Exception("Lab \"$title\" should not be visible");
                }
                if (!$not && !$labTitle->isVisible()) {
                    throw new Exception("Lab \"$title\" should be visible");
                }

                return true;
            }
        }

        throw new Exception("Lab \"$title\" not exist in the search result.");
    }

    /**
     * {@inheritdoc}
     *
     * @Then the findalab map should be zoomed to at least level :level
     */
    public function assertMapZoom($level)
    {
        //@TODO This relies on certain test pages assigning the findalab object to a window variable. Can this be fixed?
        $zoom = $this->getSession()->evaluateScript(
            /* @lang JavaScript */'return window.labfinder.settings.googleMaps.map.getZoom()'
        );

        if ($zoom < $level) {
            throw new Exception("Expected zoom of $level or greater, but got $zoom");
        }
    }

    /**
     * Sets the filter for the lab hours.
     *
     * @param string $label The lab hours option to select.
     *
     * @throws ExpectationException When the lab hours option is not found.
     *
     * @When I set the lab hours to :hours
     */
    public function setLabHours($label)
    {
        /** @var NodeElement $label */
        $label = $this->getSession()->getPage()->find('xpath', "//label[text()=\"$label\"]");
        if (is_null($label)) {
            throw new ExpectationException('The lab hours option was not found on the page.', $this->getSession());
        }

        $label->click();
    }
}
