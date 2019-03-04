# Streamer Event Viewer (SEV):
This is a building web application which will help to audience see their favorite streamer's Twitch events in real-time. 
Web application to see their favorite streamer's content with Twitch API oAuth login. Here is the live SVS system demo Application URL: https://live-sev.herokuapp.com

**Version**: 1.0 release of the twitch-streamer-events-viewer application built using React, Redux, Express Server and MongoDB.
***

## Table of Contents
* [Contributor](#contributor)
* [Overview](#overview)
* [Problem Domain](#problem-domain)
* [Feature List](#feature-list)
* [Future improvements](#future-improvements)
* [Technologies Used](#technologies-used)
* [How to run application](#How-to-run-application)
* [Tests](#tests)
* [Contact](#Contact)

## Contributor
* Md. Moshiur Rahman https://github.com/vorsurm 
***

## Overview
Solution provides any twitch user to login using twitch authentication UI and stream their favorite streamer live channel. Also enables user to chat on their favorite channels. 
***

## Problem Domain
Build a web application that helps its audience see their favorite streamer's Twitch events in real-time including chat feature using twitch account login

## Feature List

- [x] Backend Site:

- Login with twitch api
- Users Streamer following list 
- Streamer Searching box

- [x] Frontend Design:

- Bootstrap
- Laravel default blade view
- Server sends back user basic data to react app and redux store saves it in local storage as long as session is active
- [x] Material UI: 
- Mobile first design
- [x] Responsive layout 
***
## Future improvements
-  Refactoring
-  Cloud integration or AWS deployment
-  User Experience
-  Better UI experience 
***
### Technologies Used
* Laravel
* HTML, CSS3
* Bootstrap
* 
***

## How to run application

### Configure environment variables
* Add .env file at root level
```
Server:
=======
PORT = xxxx
SESSION_SECRET=''
TWITCH_CLIENT_ID = ''
TWITCH_SECRET = ''
CALLBACK_URL = http://localhost:8000/callback
MONGODB_URI = mongodb://localhost/Twitch
CLIENT_URL = http://localhost:8000


```

### Run on development environment:
* Open terminal window and run mongod service
* Open another terminal window and run below commands
```sh
$ git clone https://github.com/vorsurm/sev-system.git

$ cd sev-system
$ composer install
$ config .env file
$ php artisan migrate
$ php artisan serve
$ It`s open a browser window with http://localhost:8000

```
* Browser opens up and runs with URL : `http://localhost:8000`
* Login with Twitch account
* Once on dashboard, you can see the whole following streamers list here. 
* You can also search your feavorite streamer here above searing area.
* Wait for the content to be loaded
* In there below steram link you can see all deatils about the streamers
* Play around application, live chat and recent events list of the streamers.
* click on logout button to signout of application

* For mobile support: Open browser developer tools and select mobile icon to switch between different device resolutions.

### Run on production environment:
* https://live-sev.herokuapp.com/
* Login with Twitch account
* Once on dashboard, enter streamer name and click submit. 
* Wait for the content to be loaded
* videos and chat support
* Play around application
* click on logout button to signout of application
***
## Tests
* Postponed for future.
***
## Contact
* Please don't hesitate to reach out to moshiur.rah2016@gmail.com if you have any questions or issues while running this application. 
***


## Questions & Answers
* How would you deploy the above on AWS? (ideally a rough architecture diagram will help)
* We can take two diffeent approaches. one is going with MERN stack app deployment on AWS using Nginx server and MongoDB on Ec2 instance and connect it to load balancer for auto scaling
* Second approach is going serverless using AWS lambda functions and DynamoDB. (This changes overall architecture and code) 
![arc](aws_deploy_diagram.jpg?raw=true "Architecture")
*  Where do you see bottlenecks in your proposed architecture and how would you approach scaling this app starting from 100 reqs/sec to 900MM reqs/sec over 6 months?

* Currently it is deployed on Heroku server with mongodb hosted on mLab. As the number of users grow, we should definately plan for scaling the server to handle more traffic using auto scaling solutions given by AWS and Docker. 
* Create a Dockerfile
* Build docker image
* Run a docker container
* Create Amazon ECR (Elastic Container Registry) and uploading the node.js app image to it
* Creating a new task definition
* create a EC2 cluster
* Create a Amazon Elastic container service to run it so that app is always live. 


