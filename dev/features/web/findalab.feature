Feature: Find Collection Centers
  In order to visit a collection center
  As a customer
  I have to be able to search for collection centers

  Scenario: Find a select collection center
   Given I am on "/simple.php"
     And I fill in "Fill in the zippaty codes" with "77057"
     And I press "Find Simple"
    Then I should see "23816 Hwy 59 North"


  Scenario: Buttons are disabled
   Given I am on "/disabled-buttons.php"
     And I fill in "Fill in the zippaty codes" with "77057"
     And I press "Find Simple"
    Then I should see "23816 Hwy 59 North"
     And I should not see "Choose Location"
