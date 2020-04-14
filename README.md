###############################################################################################

# 2020_vocabulary_language

Witryna do nauki języka angielskiego.
Program powstał z wykorzystaniem oprogramowania XAMPP. 
Hostowana była na nim baza danych oraz służył do administrowania zbiorem użytkowników.

###############################################################################################

Wykorzystane technologie:
- CSS3
- JavaScript
- PHP

###############################################################################################

Opis plików i folderów:
- project_php_vocabulary_learning
  - css
     - style.css -> arkusz styli css całego projektu

  - includes ->pliki wykonywane przez formularze i wykonujące poboczne zadania
     - dbh.inc.php -> połączenie z bazą danych
     - login.inc.php -> logowanie użytkowanika
     - logout.inc.php -> wylogowanie użytkownika
     - packageButtoms.inc.php -> ładowanie pakietów użytkownika
     - packageStock.inc.php -> ładowanie słowek do edycji z danego pakietu
     - singup.inc.php -> rejestracja użytkowika

   - js -> pliki js
      - errors -> folder kontroli błędów
        - errors.err.js -> kontrala błędów przy rejestracji i logowaniu    
      - addElem.js -> dodawanie kolejnego pola do wspisywania słowa przy edycji pakietu 
      - checkPassword.js -> sprawdzanie poprawności hasła

  - paction -> akcje pakietów (dodawanie, usuwanie i aktualizowanie słówek w bazie)
     - scripts -> skrypty aktualizujące dane w bazie
       - widpackage.pa.scr.php -> skrypt do wpisywanie do bazy nowego pakietu
       - woidpackage.pa.scr.php -> skrypt do aktualizowania pakietu
     - pAdd.pa.php -> skrypt do edycji pakietu
     - pDelete.pa.php -> skrypt do usuwania pakietu

  - footer.php -> stopka witryny
  - game.php -> skrypt js i php zawierającego aplikację do fiszek 
  - header.php -> nagłówek strony
  - index.php -> główna strona z elementami potrzebnymi do logowania
  - packageEdition.php -> wyswietla stronę z formularzem do edycji pakietu
  - singup.php -> strona do rejestracji użytkowików
  - userpanel.php -> wyświetla pakiety danego użytkownika i jego profil

##############################################################################################
