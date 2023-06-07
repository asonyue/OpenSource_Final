
# OpenSource_Final  

In the open source project, we are developing an interactive game web app using 3-tier architecture.  
[Progress Report](https://docs.google.com/presentation/d/1pnucE4IeUbuw6zmf1bAe1A6U_1m0hYKxIJ7IIfzFKus/edit?usp=sharing)

## Goal  

The goal is to make a sequence memory game webapp with a top 5 leaderboard.  

## Functions  

- User is prompted to press enter.
- Game starts once user presses enter on their keyboard.
- There are 4 different colored boxes in which one is randomly selected to flash once per level.
- The player starts at level 1 and levels up when he repeats the sequence correctly.
- If the player clicks incorrectly, the game will end.
- When the game ends the user will be shown a textbox with a prompt to type in his name.
- If a name is entered and the user clicks submit the name and highest level reached will be sent to a database.
- The database arranges the data by descending order of level.
- Only the first 5 data in the database is kept.
- A top five leaderboard will be shown.
- The player can choose to retry by clicking on the retry button.

# Getting Started  

## Installation Manual

 1. `sudo apt install mysql-server`
 2. `mysql --version`
 3. `sudo mysql`
 4. `SHOW VARIABLES LIKE 'validate_password';`
 5. `use mysql`
 6. `select user, plugin, host FROM mysql.user;`
 7. `ALTER USER 'root'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'newpassword';`
 8. FLUSH PRIVILEGES
 9. `\q`
 10. `sudo mysql -uroot -p`
 11. `select user, authentication_string, plugin, host FROM mysql.user;`
 12. `\q`

 1. sudo apt install phpmyadmin
 2. Choose apach2 server option
 3. Enter the MYSQL application password as 'newpassword'
 4. Reenter the password again
 5. sudo service apache2 restart
 6. sudo service apache2 status
 7. Open a browser, in the url section, please type 'localhost/phpmyadmin'
 8. In the username field, type 'root'
 9. In the password field, type 'newpassword'
 
 1. Press the Database Section button
 2. Enter the database name 'record' and press create
 3. Navigate to the SQL section in the site
 4. Copy and paste the SQL command provided by the file on the github pages 'record.sql' file

## User Manual  

Press enter to start the game. Follow the flashing boxes. Everytime you level up, one more pattern will be added.  
If you mis-click, you lose. Type in your name in the textbox. You will then be shown the top 5 leaderboard. Press the  
retry button to try again.
  
