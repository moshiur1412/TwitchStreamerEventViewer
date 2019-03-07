# Streamer Event Viewer (SEV-System)
SEV-System is the subsystem which is developed for the twitch audience to see their favorite streamer's twitch events in real time. In the evaluation of the system that has been trying to deliver the best application within the limitation of time but there was still possible to implement new features and functionality for the best attractive product. Therefore, the project live demo, repository, and screencast video are following below:

**Version**: 1.0 Release of the Twitch Streamer Events Viewer (SEV-System).

- Application Live: https://live-sev.herokuapp.com
- Repository Rources: https://github.com/vorsurm/sev-system
- Screencast video for live demo presentation:

<a href="http://www.youtube.com/watch?feature=player_embedded&v=Fw8XNQBg3KA" target="_blank" ><img src="http://img.youtube.com/vi/Fw8XNQBg3KA/0.jpg" alt="SEV-System Live Demo" width="560" height="315" border="10" /></a>

***


## Table of Contents
* [Overview](#overview)
* [Problem Domain Area](#problem-domain-area)
* [Strengths in the System](#strengths-in-the-system)
* [Weakness in the System](#weakness-in-the-system)
* [Feature List of the System](#feature-list-of-the-system)
* [Analysis and Design Specification](#analysis-and-design-specification)
* [Technology and Libray Used](#technology-and-libray-used)
* [Further Development](#further-development)
* [How to run the applicationn](#how-to-run-the-application)
* [Questions and Answers](#questions-and-answers)
* [Summary](#summary)

*** 

## Overview
This is identified that the project developed as calling name SEV-System. The system is handle any twitch users for their specific requirements such as set favorite streamer name, their embedded live streaming, recent events and chatting just like a sub-system of the Twitch TV. SEV-System is totally depends on the Twitch API, which is used by their twitch account ID, that is must be required for their next pages load. Therefore, the system is completely run error-free in that checking period. 


## Problem Domain Area
- Build a web application that helps its audience see their favorite streamer's Twitch events in real-time.
- Including live-streaming, chat feature for streamer's channel based.
- Solution provides any twitch user to login using twitch authentication.
- Also enables user to chat on their favorite channels. 


## Strengths in the System
- The application is fully responsive.
- Authenticated by the security route such as web, active and current users based.
- validation and verification with relevant error and success message.
- Highly strong Laravel framework, ORM with database design.
- Custom error messaging with custom error pages.


## Weakness in the System
- The system is not used highly graphics and best UX design.
- Any information can't modify within the single click.
- Users can't find their following twitch name in real time just like Twitch.
- The system didn't config any mailing system for notifications.


## Feature List
- login with twitch account
- User Following Channel list
- Set Favorite Steamer Name
- Streamer live steaming page with chat
- Streamer recent 10 events 
- User profile information change
- After password set using the default login form
- The user can delete their own account.


## Analysis and Design Specification
![arc](erd_diagram.jpg?raw=true "ERD_Diagram")


## Technology and Libray Used
- Laravel 5+, PHP 7+
- Laravel socialite for Twitch login
- HTTP Client for JSON API
- Bootstrap, SCSS, and default level layouts.
- MySQL for local, PgSQL for Heroku 
- jQuery, Ajax for validation and verification.


## Further Development 
- A user can follow new streamer through the system.
- Highly UX design with graphical and visual chart reports.
- Personal email processing with the mail notification system.
- Role-based with user grouping system on the channel banner.
- Refresh authentication token when it expired.
- Refeactoring coding standerd

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
$ config .env file, below description
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
* Login with twitch account
* Once on the dashboard, you can see the whole following streamers list here. 
* You can also search your favorite streamer here above searing area.
* In there below stream link you can see all details about the streamers.
* Play around the application, live video with chat and recent 10 events list of the streamers.
* you can change user details information with a password.
* After password changed, you can log in through the default login form.
* You can also delete your account form the system.

***

## Questions and Answers
### How would you deploy the above on AWS? (ideally, a rough architecture diagram will help)
![arc](aws_deploy_diagram.jpg?raw=true "Architecture")

### Where do you see bottlenecks in your proposed architecture and how would you approach scaling this app starting from 100 reqs/day to 900MM reqs/day over 6 months?

In this section, I am just tring to figure out form the aws documentation and the tring to follow the coding standard. Truly speaking that, I don't have any access AWS service but I used s3 key, secret, region, bucket and url for image storage. 

***AWS Service Purpose**
- Used auto scaling tools(config: group, min & max size and availablity zones)
- Around 19 Regions (Availabilty Zones take advantage from aws global infrastructure)
- Robust, fully featured technology infrasturecutre 
- Used AWS building blocks (lambda, Cloudfront, Elastic etc.)

***For Application Purpose***
- Applcation load balancer(session, loggin, routing and health check)
- shift some load around (cache content)
- Managed NoSQL database
- Host & aggregate level metrices, log with external sites (amazon cloudWatch)
- Service Oriented Architecture

***User > 1 Million***
- Multi-AZ
- Elastic Load Balancing between tires
- Auto Scaling
- Service Oriented Architecture (SOA)
- Serving Content smartly(S3/ColudFront)
- Caching off DB
- Moving state off tiers that auto scale

***User > 10 Million***
- More fine-tuning of the full application
- More SOA of features/fuctionality
- Going from multi-Az to multi-regin
- Possibly start to build custom solutions
- Deep analysis of the entire stack
- Build serverless whenever possible


## Summary
In the end, I would like to say, I learn very much from that project which was a totally new concept on the live streaming online channel with API integration. Therefore, It'a was very durable and helpful for me in every stage as a programmer, tester and the scrum master.

## References
- https://docs.aws.amazon.com/codedeploy/latest/userguide/welcome.html 
- https://aws.amazon.com/blogs/startups/scaling-on-aws-part-3-500k-users
- https://laravel-json-api.readthedocs.io/en/latest/features/http-clients/
- https://socialiteproviders.netlify.com/providers/twitch.html
- https://www.quora.com/What-are-the-Laravel-best-practices


