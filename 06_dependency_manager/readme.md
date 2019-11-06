# 06 DEPENDENCY MANAGER

Nginx setup:
```bash
sudo su -
cd /etc/nginx/sites-available/
cp $PROJECT/06_dependency_manager/06_dependency_manager .
cd /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/06_dependency_manager .
service nginx restart 
exit
```

