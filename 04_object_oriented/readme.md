# 04 OBJECT ORIENTED

Nginx setup:
```bash
sudo su -
cd /etc/nginx/sites-available/
cp $PROJECT/04_object_oriented/04_object_oriented .
cd /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/04_object_oriented .
service nginx restart 
exit
```
