####################################################

# 2020_vocabulary_language

Website for learning English.
The program was created using the XAMPP software.
It hosted the database and was used to administer the set of users.

####################################################

Technologies used:
- CSS3
- JavaScript
- PHP

####################################################

Description of files and folders:
- project_php_vocabulary_learning
  - css
     - style.css -> css style sheet for the whole project

  - includes -> files executed by forms and performing side tasks
     - dbh.inc.php -> database connection
     - login.inc.php -> user login
     - logout.inc.php -> user logout
     - packageButtoms.inc.php -> loading user packages
     - packageStock.inc.php -> loading words for editing from a given package
     - singup.inc.php -> user registration

   - js -> js files
      - errors -> error control folder
        - errors.err.js -> counter for registration and login errors
      - addElem.js -> adding another field to enter a word when editing a package
      - checkPassword.js -> password validation

  - paction -> package actions (adding, removing and updating words in the database)
     - scripts -> scripts updating data in the database
       - widpackage.pa.scr.php -> script for entering a new package into the database
       - woidpackage.pa.scr.php -> script to update the package
     - pAdd.pa.php -> package editing script
     - pDelete.pa.php -> package removal script

  - footer.php -> site footer
  - game.php -> js and php script containing the flashcard application
  - header.php -> page header
  - index.php -> main page with elements needed for login
  - packageEdition.php -> displays the page with the form for editing the package
  - singup.php -> user registration page
  - userpanel.php -> displays packages of the given user and his profile
