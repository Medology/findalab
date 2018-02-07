Feature: Currently Open Lab
  In order to know that a lab is currently open
  As an end user
  I need to see a open now text and allow users to see the hours.

  Scenario: User is alerted when there are no results
    Given I am on "/24-hour-lab.php"
     When I fill in "Enter your zip" with "77054"
      And I press "Search"
     Then I should see the following lab in the results:
       | 201 KINGWOOD MEDICAL DR #A100 |
       | KINGWOOD, TX 77339            |
      And I should see "Open Now"
     When I follow "Show Hours"
     Then there should be a table on the page with the following information:
       | Monday    | 0:00 AM - 11:59 PM |
       | Tuesday   | 0:00 AM - 11:59 PM |
       | Wednesday | 0:00 AM - 11:59 PM |
       | Thursday  | 0:00 AM - 11:59 PM |
       | Friday    | 0:00 AM - 11:59 PM |
       | Saturday  | 0:00 AM - 11:59 PM |
       | Sunday    | 0:00 AM - 11:59 PM |
