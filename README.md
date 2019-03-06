# Streamer Event Viewer (SEV-System)
SEV-System is the subsystem which is developed for the twitch audience to see their favorite streamer's twitch events in real time. In the evaluation of the system that has been trying to deliver the best application within the limitation of time but there was still possible to implement new features and functionality for the best attractive product. Therefore, the project live demo, repository and screencast URL are following below:

- Application URL: https://live-sev.herokuapp.com
- Repository URL: https://github.com/vorsurm/sev-system
- ScreenCast Vido For Live Demo Presentation:
- https://www.useloom.com/share/6b0db87707df438cb6e18f62c939888c

**Version**: 1.0 Release of the Twitch Streamer Events Viewer (SEV-System).

***


## Table of Contents
* [Overview](#overview)
* [Problem Domain Area](#problem-domain-area)
* [Strengths of the System](#strengths-of-the-system)
* [Weakness of the System](#weakness-of-the-system)
* [Feature List of the System](#feature-list-of-the-system)
* [Analysis and Design](#analysis-and-design)
* [Technology and Libray Used](#technology-and-libray-used)
* [Further Development](#further-development)
* [How to run the applicationn](#how-to-run-the-application)
* [Questions and Answers](#questions-and-answers)
* [Learning Area](#learning-area)

*** 

## Overview
This is identified that the project is developed as SEV-System. It handles a twitch user for a specific subpart of the twitch system. The system totally depends on the API based. The system only used twitch account holder by their account ID, which is must require the next page load and their streamer and channel list shown their page. Therefore, the system is completely run within the error-free in that checking period. 


## Problem Domain Area
- When I was started, I don't have any twitch account, lack of details knowledge about the twitch sites.
- The event I didn't know who is streamer and what is the event list of that streamer.
- After finding that requirement list I wasted many times.
- Now, I am working on the python and Android apps so, in that time the PHP takes a few time for working area.


## Strengths of the System
- The application is fully responsive.
- Authenticated by the security route such as web, active and current users based.
- validation and verification with relevant error and success message.
- Highly strong Laravel framework, ORM with database design.
- Custom error messaging with custom error pages.


## Weakness of the System
- The system is not used highly graphics and best UX design.
- Any information can't modify within the single click.
- Users can't find their following twitch name in real time just like Twitch.
- The system doesn't config any mailing system.


## Feature List
- login with twitch account
- User Following Streamer list
- Set Favorite Steamer Name
- Streamer Live steaming 
- Streamer live chat
- Streamer recent 10 events 
- User profile information change
- After password set using the default login form
- The user can delete the account.


## Analysis and Design
![arc](erd_diagram.jpg?raw=true "ERD_Diagram")


## Technology and Libray Used
- Laravel 5+, PHP 7+
- Laravel socialite for Twitch login
- HTTP Client for JSON API
- Bootstrap, SCSS, and default level layouts.
- MySQL for local, PgSQL for Heroku 


## Further Development 
- A user following the new streamer list through the system.
- Highly UX design with graphical and visual chart reports.
- Personal email processing with the mail notification system.
- Role-based with user grouping system on the channel banner.

***

## How to run the application

### Run on development environment:
* Open terminal window with your dev area
* Then run this below comments
```sh
$ git clone https://github.com/vorsurm/sev-system.git

$ cd sev-system
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ config .env file below description
$ php artisan migrate
$ php artisan serve
$ It`s open a browser window with http://localhost:8000/login

```

### Configure environment variables
* Add .env file at root level
```

MySQL Config:
==============
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sev_system
DB_USERNAME=username
DB_PASSWORD=password

Twitch oAuth Config.
====================
# https://glass.twitch.tv/console/apps/create
TWITCH_KEY=dev.twitch.key
TWITCH_SECRET=dev.twitch.secret
TWITCH_REDIRECT_URI=http://localhost:8000/social/handle/twitch


```

* Browser opens up and runs with URL: `http://localhost:8000/login`
* Login with Twitch account
* Once on the dashboard, you can see the whole following streamers list here. 
* You can also search your favorite streamer here above searing area.
* In there below stream link you can see all details about the streamers.
* Play around the application, live video with chat and recent 10 events list of the streamers.
* you can change user details information with a password.
* After password changed, you can log in through the default login form.
* You can also delete your account form the system.

***

## Questions and Answers
* How would you deploy the above on AWS? (ideally, a rough architecture diagram will help)
* We can take two different approaches. one is going with MERN stack app deployment on AWS using Nginx server and MongoDB on Ec2 instance and connect it to load balancer for autoscaling
* the Second approach is going serverless using AWS lambda functions and DynamoDB. (This changes overall architecture and code) 
![arc](aws_deploy_diagram.jpg?raw=true "Architecture")
*  Where do you see bottlenecks in your proposed architecture and how would you approach scaling this app starting from 100 reqs/sec to 900MM reqs/sec over 6 months?

* Currently it is deployed on Heroku server with MongoDB hosted on mLab. As the number of users grows, we should definitely plan for scaling the server to handle more traffic using auto-scaling solutions given by AWS and Docker. 
* Create a Dockerfile
* Build docker image
* Run a docker container
* Create Amazon ECR (Elastic Container Registry) and uploading the node.js app image to it
* Creating a new task definition
* create an EC2 cluster
* Create an Amazon Elastic container service to run it so that app is always live. 


## Learning Area
In the end, I would like to say, I learn very much from that project which was a totally new concept on the live streaming online channel with API integration. Therefore, It'a was very durable and helpful for me in every stage as a programmer, tester and the scrum master.


