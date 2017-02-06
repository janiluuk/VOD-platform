# Gonzalez VOD platform #

Description
======
This project contains PHP / Yii 1.1 based platform for end-to-end video distribution.
While porting the platform to Yii2, decided to put the previous generation version available as open-source.

Project is provided as it is, pull requests are welcome. 

Features
======
- RESTful API (XML / Json output)
- Content management for movies, series or other video material.
- TVOD / SVOD model support
- Categories, Tags, Dynamic category builder
- Transcoding capabilities through Handbrake cli
- Youtube / TMDB integration
- Payment gateways (extendable example methods provided)
- Pricing management for content
- Campaign support
- User management
- User profile builder with dynamic profile fields
- Messaging support for communicating with users
- Support for managing distributors, content providers and content mapping between them.
- Statistics dashboard, API, detailed sales analytics + exporting
- File management


Requirements
======
- PHP 5.5+
- APC / Memcached extensions
- Nginx / Apache webserver
- Mysql 5+
- GeoIP datafile (free version can be used)
- Streaming server, Wowza Media Server recommended.
- Handbrake-cli 


Pros
======

- Provides insight on fully working production VOD platform. 
- Can work as a springboard for anybody wanting to quickly start their own VOD service
- Vital parts of code are documented

Cons
======
- Some classes / parts are not documented at all.
- Potential security issues.
- No test coverage.
- Most of the application is under single code structure, modules are not generally used.
