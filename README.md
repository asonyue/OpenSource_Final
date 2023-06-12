
# OpenSource_Final  

## Goal 

- In the open source project, we are developing an interactive game web app using 3-tier architecture.
- HTML, CSS, JS as the 1st tier; PHP as the middle tier; MYSQL as the 3rd tier.
- The goal is to make a sequence memory game webapp with a top 5 leaderboard.  

## Functions

- This is a memory game that you can play with anyone. You need to memorize all the patterns of the 4 color blocks
since the game start, as long as you press the correct sequence of blocks, you can keep playing to gain a high level
to compete with your friends, family members and colleagues in your free time.

# Getting Started  

## Installation Manual

##### Apache2 Server
- `sudo apt install apache2`
- Navigate to the directory `cd var/www/html`
- Create a folder under this directory e.g game
- Move the files all from the src folder provided from github, excluding the src folder itself into the directory.
- `service apache2 reload`

##### Mysql Server
- `sudo apt install mysql-server`
- `mysql --version`
- `sudo mysql`
- `SHOW VARIABLES LIKE 'validate_password';`
- `use mysql`
- `select user, plugin, host FROM mysql.user;`
- `ALTER USER 'root'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'newpassword';`
- FLUSH PRIVILEGES
- `\q`
- `sudo mysql -uroot -p`
- `select user, authentication_string, plugin, host FROM mysql.user;`
- `\q`

##### Phpmyadmin
- `sudo apt install phpmyadmin`
- Choose apach2 server option
- Enter the MYSQL application password as 'newpassword'
- Enter the password again
- `sudo service apache2 restart`
- `sudo service apache2 status`
- Open a browser, in the url section, please type 'localhost/phpmyadmin'
- In the username field, type 'root'
- In the password field, type 'newpassword'
- Press the Database Section button
- Enter the database name 'record' and press create
- Navigate to the SQL section in the site
- Copy and paste the SQL command provided by the file on the github pages 'record.sql' file

## User Manual (Player Instructions)
- User is prompted to press enter from their keyboard that game will be started.
- There are 4 different colored boxes in which one is randomly selected to flash once per level.
- The player starts at level 1 and levels up when he repeats the sequence correctly.
- If the player clicks incorrectly, the game will end.
- When the game ends the user will be shown a textbox with a prompt to type in his name.
- If a name is entered and the user clicks submit the name and highest level reached will be sent to a database.
- The database arranges the data by descending order of level.
- Only the first 5 data in the database is kept.
- A top five leaderboard will be shown.
- The player can choose to retry by clicking on the retry button.

# Progress

- [Progress Report 1](https://docs.google.com/presentation/d/1pnucE4IeUbuw6zmf1bAe1A6U_1m0hYKxIJ7IIfzFKus/edit?usp=sharing)
- [Progress Report 2](https://docs.google.com/presentation/d/1iZW16ctSKo_PPZF3NEzpBi6CLAMlOW3ueUZQg2FF61E/edit?usp=sharing)

