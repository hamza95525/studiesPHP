# 07 TESTING

Nginx setup:
```bash
sudo su -
cd /etc/nginx/sites-available/
cp $PROJECT/07_testing/07_testing .
cd /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/07_testing .
service nginx restart 
exit
```

# Q&A for already done steps

### 1. How to add Codeception as development dependency?

```bash
composer require codeception/codeception --dev
```

### 2. How to bootstrap codeception tests?

```bash
vendor/bin/codecept bootstrap
```

### 3. How to run tests?

```bash
# all
vendor/bin/codecept run

# or specific suite
vendor/bin/codecept run unit
vendor/bin/codecept run functional
vendor/bin/codecept run acceptance
```

### 4. How to add unit test?

```bash
vendor/bin/codecept generate:test unit Dummy
# creates tests/unit/DummyTest.php

vendor/bin/codecept generate:cest unit Dummy
# creates tests/unit/DummyCest.php  

vendor/bin/codecept generate:cept unit Dummy
# creates tests/unit/DummyCept.php
```

### 5. Add test for class inside some namespace

```bash
vendor/bin/codecept generate:cest unit Container_RingBuffer
# Why 'cest' type - I think it best fits UT
```

### 6. Add acceptance test

```bash
vendor/bin/codecept generate:cept acceptance Homepage
# Again - 'cept' looks better in acceptance tests
```

### 7. How to set URL for acceptance tests?

Edit file **tests/acceptance.suite.yml**

```yaml
modules:
    enabled:
        - PhpBrowser:
            url: http://localhost:8007 # <-- fixed address here
        - \Helper\Acceptance
```

### 8. Configure for database testing

Edit file [tests/acceptance.suite.yml](tests/acceptance.suite.yml)

```yaml
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: http://localhost:8007
        - \Helper\Acceptance
        - Db: # <-- added this section
            dsn: 'mysql:host=localhost;dbname=test'
            user: 'test'
            password: 'test123'
```

### 9. How to generate database dump?

```bash
mysqldump -u test test -p > tests/_data/dump.sql
```

### 10. How to use dump to initialize DB state?

Edit file [tests/acceptance.suite.yml](tests/acceptance.suite.yml)

```yaml
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: http://localhost:8007
        - \Helper\Acceptance
        - Db:
            dsn: 'mysql:host=localhost;dbname=test'
            user: 'test'
            password: 'test123'
            populate: true # <-- added this
            cleanup: true # <-- added this
            dump: tests/_data/dump.sql # <-- added this
```

### 11. How to switch to WebDriver?

```yaml
actor: AcceptanceTester
modules:
    enabled:
#        - PhpBrowser:
#            url: http://localhost:8007
        - WebDriver:
            url: http://localhost:8007
            browser: chrome
        - \Helper\Acceptance
        - Db:
            dsn: 'mysql:host=localhost;dbname=test'
            user: 'test'
            password: 'test123'
            populate: true
            cleanup: true
            dump: tests/_data/dump.sql
```

### 12. How to run Selenium?

Open new terminal window and execute:

```bash
cd Selenium/
java -jar selenium-server-standalone-3.141.59.jar
```

## What to do?

1) Copy this project to your repository

2) Fix unit test by implementing Container\RingBuffer and String\Editor classes

3) Fix acceptance test by adding appropriate controllers/views/models etc.

4) Commit all your changes to **src/** and **view** directories

When grading projects, directories **src/** and **view/** from your repository will be copied and all test will be executed.
Any other changes will be ignored! Make sure that you change only that directories!

There are two points to get if all test are green.
If there is single test case failing you can still get one point.

There is also one bonus point for exceptionally clean/pretty code!

