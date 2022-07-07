# Ceta Tea Brewing Coding Test - Cetea!

This is a CodeIgniter4 application. Make sure your env has the necessary PHP7.4 deps installed (e.g. intl, mbstring). You'll also need sqlite3 installed.

## Which files contain Paul's work?

- app/Config/Routes.php
- app/Config/Database.php
- app/Controllers/Home.php
- app/Database/Tea.db
- app/Models/PeopleModel.php
- app/Views/main.php
- app/Views/templates/header.php

## Oops I broke the DB

It's just a sqlite3 db.

- `$ cd app/Database`
- `$ sqlite3 tea.db`
- `sqlite> CREATE TABLE people (name TEXT NOT NULL PRIMARY KEY, alreadyMadeTea BOOLEAN);`

## Why CI4?

I decided to use this as a chance to learn some CodeIngiter4. Things have improved since I last touched it in 2009...

## If I'd had more time...

I'd have plugged Twig into the view pipeline, I'm wary of using PHP for templating (ironic because PHP was invented to do templating, but today it is a general purpose language with a lot of available rope). There'd be functional tests on the controller endpoints, and some Selenium for the UI.
