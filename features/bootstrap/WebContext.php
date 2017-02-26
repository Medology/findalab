<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\FlexibleMink\Context\FlexibleContext;
use Behat\FlexibleMink\Context\StoreContext;
use Behat\FlexibleMink\PseudoInterface\MinkContextInterface;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Element\NodeElement;
use Behat\Mink\Exception\ExpectationException;
use Behat\Mink\Exception\UnsupportedDriverActionException;
use features\contexts\MapContext;

/**
 * Defines application features from the context of a Web Page.
 */
class WebContext extends FlexibleContext implements Context, SnippetAcceptingContext
{
    use MapContext;
    use MinkContextInterface;
    use StoreContext;

    /**
     * Asserts that a field with a specified exists on the page.
     *
     * @Then there should be a field with the value of :value
     */
    public function assertFieldExistsValue($value)
    {
        $this->waitFor(function () use ($value) {
            /** @var NodeElement[] $fields */
            $fields = $this->getSession()->getPage()->findAll('xpath', '//input');

            foreach ($fields as $field) {
                if ($field->getValue() == $value) {
                    return true;
                }
            }

            throw new ExpectationException(
                "An input with the value of $value was not found on the page.",
                $this->getSession()
            );
        });
    }

    /**
     * Waits the seconds specified.
     *
     * @param int $seconds The seconds to wait.
     *
     * @When I wait :seconds seconds
     */
    public function waitSeconds($seconds)
    {
        sleep($seconds);
    }

    /**
     * Check the radio button.
     *
     * @param string $label The label of the radio button.
     * @When I check radio :label
     */
    public function checkRadio($label)
    {
        $this->fixStepArgument($label);

        $radioButton = $this->waitFor(function () use ($label) {
            /** @var NodeElement[] $radioButtons */
            $radioButtons = $this->getSession()->getPage()->findAll('named', ['radio', $label]);

            if (!$radioButtons) {
                throw new ExpectationException('Radio Button was not found on the page', $this->getSession());
            }

            $radioButtons = array_filter($radioButtons, function (NodeElement $radio) {
                return $radio->isVisible();
            });

            if (!$radioButtons) {
                throw new ExpectationException('No Visible Radio Button was found on the page', $this->getSession());
            }

            usort($radioButtons, [$this, 'compareElementsByCoords']);

            return $radioButtons[0];
        });

        $radioButton->click();
    }

    /**
     * Compares two Elements and determines which is "first".
     *
     * This is for use with usort (and similar) functions, for sorting a list of
     * NodeElements by their coordinates. The typical use case is to determine
     * the order of elements on a page as a viewer would perceive them.
     *
     * @param  NodeElement                      $a one of the two NodeElements to compare.
     * @param  NodeElement                      $b the other NodeElement to compare.
     * @throws UnsupportedDriverActionException If the current driver does not support getXpathBoundingClientRect.
     * @return int
     */
    protected function compareElementsByCoords(NodeElement $a, NodeElement $b)
    {
        /** @var Selenium2Driver $driver */
        $driver = $this->getSession()->getDriver();
        if (!($driver instanceof Selenium2Driver)) {
            throw new UnsupportedDriverActionException('Resetting the driver is not supported by %s', $driver);
        }

        $aRect = $driver->getXpathBoundingClientRect($a->getXpath());
        $bRect = $driver->getXpathBoundingClientRect($b->getXpath());

        if ($aRect['top'] == $bRect['top']) {
            return 0;
        }

        return ($aRect['top'] < $bRect['top']) ? -1 : 1;
    }
}
