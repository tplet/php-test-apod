# Installation

To use the application, it is necessary to configure the NASA API key. To do this, set the "api_key" option in the config/packages/apod.yaml file.

It is also necessary to define the Google API keys in the .env file (see https://console.cloud.google.com/apis/credentials to define an APP and retrieve the associated keys).

# Fetch picture and cron

The retrieval of the NASA data is done through a command line :
php bin/console nasa:apod:build

This command can be run daily by setting up a CRON task.

# Main language and framework

* PHP 7.4
* Symfony 5.2

# Architecture and technologies

The architecture used follows a hexagonal model. That is to say, by separating the parts :
- user / view: Twigs views, controllers
- business: ApodService for example
- server: ApodApiService or MediaRepository

## Nasa/Apod bundle
A bundle is dedicated to the retrieval, storage and playback of media information from NASA's APOD API.
It is thus possible to take this bundle and reuse it. 
Dependencies :
* guzzlehttp/guzzle
* doctrine/doctrine-bundle
* symfony/framework-bundle
* symfony/console
* symfony/yaml

## Fetching media

Retrieving a media (image or video), from the command line (described above) follows the following process:
1. Query the database to retrieve the media for the specified day (today by default). This is done using a repository which centralises the queries. An intermediate layer could also have been used to avoid the dependency of this layer on doctrine.
2. If no media is found, the API is called to retrieve it (use of Guzzle to make requests to the API).
2a. The retrieved media is constructed from a DTO object factory
3. The found craft is transformed into compatible media for storage via a factory.
4. The media is saved to a database.

## Reading media

The reading of a media, from the interface, follows the following process:
1. Query the database to retrieve the most recent image-type job.
2. Generation of the display. If no media was found, a special message is displayed, otherwise the media is displayed.

## Authentication
Authentication is done through Google.
For this, the following dependencies are used:
* knpuniversity/oauth2-client-bundle
* league/oauth2-google
* symfony/security-bundle

A google API key is to be defined in the .env file.
The config/packages/security.yaml file defines the routes for which restrictions must be applied. This is the case for routes starting with "/restricted".


