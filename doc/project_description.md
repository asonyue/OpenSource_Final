
# Software architecture

## Front End (HTML, CSS, JS)

- HTML is used for the backbone of the webapp, providing the structure.
- CSS style for background gradient and positioning of the buttons.
- Javascript is used to make the sequence memory game.

## Middle Layer (PHP)

- Initialize the database connection.
- Save the username and level to the variable.
- Insert the results into the database.
- Fetch the top score from the database.
- Create a html table.
- Insert values into the table.
- Clean the database so only the first five result remains.

## Database (MySQL)

- The database will only store the first five result and delete the rest everytime the php file executes.  
- Using MySQL database.
- There are three columns in the scores table, id, name and level.
- id is the primary key that the value of it should not be null. Also, it will be auto incremented each time.
- name is used to record the username.
- level is used to track of the level of the user.
