
# Software architecture

## Front End

- HTML is used for the backbone of the webapp, providing the structure.
- CSS style for background gradient and positioning of the buttons.
- Javascript is used to make the sequence memory game.

## Middle Layer (PHP)

1. Initialize the database connection.
2. Save the username and level to the variable.
3. Insert the results into the database.
4. Fetch the top score from the database.
5. Create a html table.
6. Insert values into the table.
7. Clean the database so only the first five result remains.

## Database (MySQL)

- The database will only store the first five result and delete the rest everytime the php file executes.