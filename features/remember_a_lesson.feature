Feature: Remember a lesson (from God)
  In order to internalize the lessons God wants me to learn
  As a believer
  I need to be able to remember and repeat the lessons learnt

  Scenario: Remembering a single lessons
    Given all the learnt lessons are removed
    When I remember the lesson "Je mag je hart ophalen en plezier hebben in het leven."
    And I repeat all lessons learnt so far
    Then I should see the lesson "Je mag je hart ophalen en plezier hebben in het leven."