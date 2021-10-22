# Eskimi SSP Task

## Introduction
This application is used to create a simple application for managing advertising campaigns. 


## Table of Contents
1. <a href="#technology-stack">Technology Stack</a>
2. <a href="#application-features">Application Features</a>
3. <a href="#api-endpoints">API Endpoints</a>
4. <a href="#setup">Setup</a>
5. <a href="#author">Author</a>
6. <a href="#license">License</a>


## Technology Stack
  - [PHP](https://nodejs.org/)
  - [Laravel](https://expressjs.com/)
  - [MySQL](https://www.postgresql.org/)
  - [Sail](https://www.npmjs.com/package/express-validator)
  ### Testing tools
  - [PHPUnit](https://babeljs.io) 

## Application Features
* User can create and edit an advertising campaign;
* User can see all created advertising campaigns: name, date, daily budget, total budget, and a creative preview button on a single web page
* Users can see a creative preview button that shows advertising campaign’s uploaded creatives in a popup (same page);
* Users can navigate from campaign create/edit to campaign listing page and the other way around.

## API Endpoints
Method | Route | Description
--- | --- | ---
`GET` | `/campaigns` | Fetch all advertising campaigns
`POST` | `/campaigns` | Create an advertising campaign
`PUT` | `/campaigns/:id` | Update an advertising campaign
`GET` | `/campaigns/:id` | Fetch a single advertising campaign info

## Setup
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

  ### Dependencies
  - [Docker](https://docs.docker.com/desktop/mac/install/)
 
  ### Getting Started
  - Install and setup docker
  - Open terminal and run the following commands
    ```
    $ git clone https://github.com/steelze/eskimi.git
    $ cd eskimi
    $ docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v $(pwd):/var/www/html \
        -w /var/www/html \
        laravelsail/php74-composer:latest \
        composer install --ignore-platform-reqs
    ```
  - Duplicate and save .env.example as .env and fill in environment variables and run migration
    ```
### Run The Service
    ```
    $ ./vendor/bin/sail up -d #start application
    $ ./vendor/bin/sail artisan migrate #run migration
    $ ./vendor/bin/sail down #stop application
    ```

  ### Testing
  ```
  $ ./vendor/bin/sail test
  ```
  If correctly setup, all tests should pass
  
## Author
Odunayo Ileri Ogungbure

## License
ISC
