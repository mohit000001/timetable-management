# timetable-management

# Into
This is a timetable management app. it is a home project developed in core PHP just for my learning purpose.
I developed this project in 2018. Now in 2022, I'm pushing this project in GitHub to show my previous learning items. Also, the project was built in 2018, and it is not comfortable with the latest PHP and MySQL versions. to solve this issue I have dockerized this app using docker so that anyone can run this project with less effort than setting up the ENV items. All other details are as follows.  

# Features
- Admin panel
- Teacher panel
- Login system
- Subject (add, update, del) functionality 
- Time-table seaching based on different criteria

# Technologies 
 - PHP (5.3)
 - MySQL
 - Docker 

# How to run 
- Download and setup docker on your machine
- Navigate to the root folder of the project 
- and Hit "docker-compose up" (it will download PHP and MySQL and PHPMyAdmin images and will take some time)
- Site is accessible at "http://localhost:8000" and for phpMyadmin "http://localhost:8080"

# Change config as per your requirements
- Please change port, db username/password and other config in docker-compose.yml file (can be found in root dir)
