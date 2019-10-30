# 05 DATA OBJECT

Nginx setup:
```bash
sudo su -
cd /etc/nginx/sites-available/
cp $PROJECT/05_data_objects/05_data_objects .
cd /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/05_data_objects .
service nginx restart
exit
```

### Connect to DB using PDO

```php

// Required only when used in some namespace (to fix autoloading)
use PDO;

// You can create connection objects using PDO class
// Only first parameter is required in all cases
$pdo = new PDO($dsn, $username, $password, $options);
```

### How to configure DSN (Data Source Name)

SQLite DSN details: [PDO_SQLITE DSN](http://php.net/manual/en/ref.pdo-sqlite.connection.php)

```php

// For SQLite you can provide path to storage dirctory

use Config\Directory;

$path = Directory::storage() . "db.sqlite";
$dsn = "sqlite:" . $path;
```

MySQL DSN details: [PDO_MYSQL DSN](http://php.net/manual/en/ref.pdo-mysql.connection.php)

```php

// MySQL connection is a bit more compliated and requires database user credentials
// In below example 'test' user is used (user owns a simple 'test' database) 
$dsn = "mysql:host=localhost;dbname=test";
$username = "test";
$password = "test123";
```

### Set error mode to exception - for easy debugging

```php

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Now PDOException will be thrown on e.g.: SQL errors
```

### Access database using CLI (Command Line Interface)

SQLite

```

# For SQLite it is as simple as opening single file
sqlite3 storage/db.sqlite 

# Now you should be inside SQLite CLI
# Non-SQL command start with dot '.' - for help type:
.help

# Show tables
.tables

# Create dummy table (SQL)
# HINT: If you get 'readonly database' error check file write permissinons
CREATE TABLE dummy (id INTEGER PRIMARY KEY, data TEXT NOT NULL);

# Show command that was used to create given table
.schema dummy

# Insert some data into table
INSERT INTO dummy VALUES (1, "Foo"), (2, "Bar");

# Select values from table
SELECT * FROM dummy;

# If you do not like default ouput format
.headers on
.mode column

# Drop table
DROP TABLE dummy;

# Exit from database
.quit
```

MySQL

```

# Check MySQL service
sudo service mysql status

# Connect to server running on localhost
# -u specifies user
# -p tells that we want to login using password (test123)
mysql -u test -p 

# Show available databses
show databases;

# Select database you are interested in
use test;

# Show available tables
show tables;

# Create new table
CREATE TABLE test (id INT PRIMARY KEY, value TEXT);

# Show table format
DESCRIBE test;

# Insert some values
INSERT INTO test VALUES (1, "PL"), (2, "EN");

# Select all rows
SELECT * FROM test;

# Drop table
DROP TABLE test;

# Finish session
exit
```
### Executing SQL queries using PDO

```php

// Execute query
$query = $pdo->query("SELECT * FROM dummy");

// Fetch data
$rows = $query->fetchAll();

// You can also decide what should be the format of retuned data

// For associative table (keys are the column names)
$rows = $query->fetchAll(PDO::FETCH_ASSOC); // $row['data']

// For simple objects (we can access property)
$rows = $query->fetchAll(PDO::FETCH_OBJ); // $row->data

// For numerical indicies
$rows = $query->fetchAll(PDO::FETCH_NUM); // $row[1]

// By default 
$rows = $query->fetchAll(PDO::FETCH_BOTH); // $row['data'], $row[1]

// And the most fancy one - fetch into object of specific type 
$dummies = $query->fetchAll(PDO::FETCH_CLASS, Dummy::class); // $dummy->id, $dummy->data
// remember to define used class with appropriate fields (matching column names)
class Dummy {
    public $id;
    public $data;
};
```

### Executing any SQL statement (e.g.: to create table)

```php

// SQLite example 
$pdo->exec("CREATE TABLE IF NOT EXISTS dummy (id INTEGER PRIMARY KEY, data TEXT NOT NULL)");

// MySQL example
$pdo->exec("CREATE TABLE IF NOT EXISTS test (`id` INT PRIMARY KEY, `value` TEXT)");
```

### Insert value into database

```php

// Example for table used in SQLite database

$statement = $pdo->prepare("INSERT INTO dummy VALUES (:id, :data)");
$statement->bindValue('id', 20);
$statement->bindValue('data', "XXX");
$statement->execute();

```
