# Goal: Why?

The goal of this application is: The ability to internalize a lesson that God is teaching me either through His Word,
through His Holy Spirit giving me thoughts, through a sermon of a reborn Christian, through life itself, a (Christian)
song I've heard, feedback from family, etc.

# Plan: How?

Remembering His lessons helps me act upon them on a daily basis. Remembering comes through repeating. I can only remember
a single lesson each day. Otherwise, it would be too much for me. When I see the lesson repeated throughout the day, I
can meditate on what God is learning me. Therefore, the workflow of this application would be:

- I want to add a single lesson (that is: a single memorable sentence) that God is learning me.
    - The lesson is always based upon something God has said to me personally. It has a source. I need to be able to link
    - the lesson to that source.
- I want to see (with my eyes) that lesson throughout the day.
- I want to repeat the lessons that God has learnt me in the past.

# Timeline: When?

- [ ] The MVP is a (PHP) CLI application. The only functionality would be: keep a lesson in my heart ("Keep them in the center of your heart")
  and putting a lesson in front of my sight ("Do not let them escape from your sight"). The storage would be a simple text file on a defined location.
  Adding lessons is as simple as appending lines (with a daily timestamp) to that file. Repeating it would be as simple as reading the lines from the file.
  - [x] Add a CLI command to write a lesson in my heart.
    - [ ] Append the lesson to a text file on a defined location.
  - [ ] Add a CLI command to put the daily lesson in front of my sight.
    - [ ] Read the last line of the text file above.
  - [ ] Add a CLI command to put the learnt lessons in front of my sight.
    - [ ] Read all the lines of the text file above.
  - [ ] Build the application using Docker with FrankenPHP.
  - [ ] Rename CLI commands so that they reflect to intention of the functionality and not the CRUD-dy technical operation names.
  - [ ] Remove all the functionality that is not needed at this moment.
    - [ ] Removing all learnt lessons: There's no reason, apart from testing, to have this functionality. It's too CRUD-dy.
- [x] Use personal PHPStorm, GitKraken en mail account.
- [x] Make a simple working version with Docker.
- [x] Using Github for public repository storage and deployment.
- [x] Include a README.md to start working with the application.
- [x] Add the ability to read a lesson God has learnt me.
- [x] Add the ability to add a lesson that God wants me to learn.
- [x] Make the tests function like real-world (user) scenario's.
    - [x] Use Gherkin in combination with different contexts to have real-world scenario tests.
    - [ ] Use specific PHPUnit test classes to cover _edge cases_.
- [ ] Add remote code coverage over the PHP CLI with xDebug.
- [ ] Buy a licence for GitKraken.
- [ ] Using Tailwind for the front-end CSS.