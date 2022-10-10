<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# School Management System (Laravel).

## Objective:
- School Management System is the system that manages students, teachers, classes, subjects, and many more. Here, the user can use the features of CRUD and manage students, teachers, subjects, and classes. Now talking about all the main functions of the system that is the feature to add, edit, delete, and view students, teachers, and classes. While adding a student, the user must provide full name, select gender, date of birth, select class, enrollment date, and parent's phone numbers. Additionally, students, teachers, classes, and subjects all have a unique and auto-generated number.
      This sort of system may be used by middle and high schools to handle information in a methodical manner.

## :signal_strength: Project Platform and Programing Languages: 
  Laravel PHP Framework; A PHP framework includes libraries for commonly used functions, reducing the amount of original code that developers must write from scratch.
  Laravel is a free, open-source PHP web framework built by Taylor Otwell and based on Symfony. 

  It is designed for building online applications that follow the model–view–controller (MVC) architectural pattern.

  As For the Database MySQL will be used which is a relational database management system that is free and open source.

  IDE Tool used for this project is PhpStorm.

## :floppy_disk: Setup

* Clone the repo `https://github.com/OmarKadish/school-managament-system-laravel.git`

* Install dependencies with this code line...
Run `composer install`

* Make sure you have your key generated. If not! Generate it with this command..
`php artisan key:generate`

* Run migration and seeds
`php artisan migrate:fresh --seed`

* To start the development environment
Run `php artisan serve`

## :floppy_disk: Developer notes:

We used the <a href="https://github.com/nnjeim/world/" target="_blank">World</a> repo; A Laravel package which provides a list of the countries, states, cities, timezones, currencies and languages. But as a way of change and to work with Ajax insead of using api we used an XMLHttpRequest to list all countries and fill the other dropbox with the states according to the selected country. 



## System Interfaces: 
These interfaces will be actual interfaces through which the user will perform the desired tasks.
* Login System: maintaining the login information of a manager after validating the Email and Password. The Registering System is halted thus only the system managers can create new admin account in the system.
* Classrooms Management Interface: Allows the managers to use the full CRUD features like adding new class and manage it.
* Teachers Management Interface: Allows the managers to use the full CRUD features like adding new teacher, manage his information, as well as upload profile photo.
* Students Management Interface: Allows the managers to use the full CRUD features like adding new students, defining their class, and managing their profiles.
* Subjects Management Interface: Allows the managers to use the full CRUD features for subjects, define subjects class, and assign a teacher for it.
* Users Management Interface: Allows the managers to add new manager accounts or delete an exciting account that is no longer needed.

## :camera: Preview
#### Login Page
  ![image](https://user-images.githubusercontent.com/74814002/189502588-aaeba389-c599-449b-b23b-c4cece8d4f21.png)

#### Dashboard Page
  ![image](https://user-images.githubusercontent.com/74814002/189502602-3b497a67-f620-47b8-9e12-e8b26af401db.png)

#### Create Instance Sample Page
![image](https://user-images.githubusercontent.com/74814002/189502625-9532f029-fbd2-42ee-8f07-0083fd9dc31a.png)

#### List Instances Sample Page
![image](https://user-images.githubusercontent.com/74814002/189502787-09a2b41c-4b42-4039-9609-1141913b475b.png)

## :file_folder: License

* This project is licensed under the terms of the MIT license.

## :envelope: About me

* Repo created by [Omar Kadish](https://github.com/OmarKadish), My portfolio: [Omar](https://omarkadish.wordpress.com/)

Hope it will help.
Good Luck.

