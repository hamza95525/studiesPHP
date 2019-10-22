# 03 PRETTY URL

TODO:

1. Selecting view files for: '', '/', '/home', '/about', '/users', '/user/[id]'
2. Selecting view data in index.php for: '/users', '/user/[id]'
3. Partial view for menu
4. Layout file to avoid code duplication

Nginx setup:

Let's assume that PROJECT is set to current directory.

First step is to modify configuration file:

```bash
vim $PROJECT/03_pretty_url
```
And set **root** property to absolute path for **public/** directory.
When this is done:

```bash
sudo su -
cd /etc/nginx/sites-available/
cp $PROJECT/03_pretty_url/03_pretty_url .
cd /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/03_pretty_url .
service nginx restart 
exit
```
