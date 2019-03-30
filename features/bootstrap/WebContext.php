<?php

/**
 * This file is part of the Find A Lab Project.
 *
 * Copyright © 2016-2019 FPK Services, LLC.
 * All rights are reserved.
 */
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\FlexibleMink\Context\FlexibleContext;
use Behat\FlexibleMink\Context\StoreContext;
use Behat\FlexibleMink\PseudoInterface\MinkContextInterface;
use Behat\Mink\Element\NodeElement;
use Behat\Mink\Exception\ExpectationException;
use features\contexts\MapContext;
use features\contexts\MapResultsContext;

/**
 * Defines application features from the context of a Web Page.
 */
class WebContext extends FlexibleContext implements Context, SnippetAcceptingContext
{
    use MapContext;
    use MapResultsContext;
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
}
