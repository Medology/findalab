Feature: Find Collection Centers
  In order to visit a collection center
  As a customer
  I have to be able to search for collection centers

  Scenario: Find a select collection center
    When I am on "/simple.php"
     And I fill in "Enter your zip" with "77057"
     And I press "Search"
    Then I should see "23816 Hwy 59 North"

  Scenario: Buttons are disabled
   Given I am on "/disabled-buttons.php"
     And I fill in "Enter your zip" with "77057"
     And I press "Search"
    Then I should see "23816 Hwy 59 North"
     And I should not see "Choose Location"
