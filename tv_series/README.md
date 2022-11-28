Developing env:
- php without framework, following mvc concepts 

To start of:
- you need php and mysql
- you need to run db scripts to create and populate database and tables (./create_populate_tbs.sql)

My approach:
- tvseries.class.php behave like a model: it's responsible for interacting with database
- dbhandler its a class for establish mysql db connection
- tvseriescontr.class.php behave like a controller: it would be responsible for updating the db
- tvseriesview.class.php behave like a view: it's responsible for presenting the data coming from the db


