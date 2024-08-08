Feature: Remember a lesson (from God)
  In order to internalize the lessons God is learning me
  As a born-again Christian and disciple of Jesus Christ
  I need to be able keep a lesson in my heart and put it in front of my sight

  Scenario: Remembering a single lessons
    Given all the learnt lessons are removed
    When I remember the lesson "Je mag je hart ophalen en plezier hebben in het leven."
    And I repeat all lessons learnt so far
    Then I should see the lesson "Je mag je hart ophalen en plezier hebben in het leven."