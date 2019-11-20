# 08 TDD PRACTICE

Nginx setup:
```bash
sudo su -
cd /etc/nginx/sites-available/
cp $PROJECT/08_tdd_practice/08_tdd_practice .
cd /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/08_tdd_practice .
service nginx restart 
exit
```
