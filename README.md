# Hybrid App for Statistical Indicators Visualization

This Hybrid App was developed during an internship at the Haut Commissariat au plan between May and July 2021. It uses Vue JS and Ionic Framework for frontend development, which allows users to visualize statistical indicators on their mobile devices. The app is powered by a backend API built with NodeJS and ExpressJS, which connects to a MySQL database, the admin panel is a PHP script and it serves to add categories , indicators and sections that are displayed within the app. 

# Features

Clean UI with easy-access to different sections of the app.
Dashboard with statistical indicators displayed in charts and graphs.
Admin panel for managing the content of the app.

# Architecture

The application architecture was designed using UML diagrams to ensure a clean and modular codebase. The front-end is built with VueJS and Ionic Framework, which provides a fast and responsive user interface. The backend is built with NodeJS and ExpressJS, which provides a scalable and efficient API to communicate with the MySQL database. PHP script is used for server-side data processing for the admin panel.

# Deployment

The app can be deployed as a native app for iOS and Android using the Ionic Framework, or as a web app using any modern web browser. The backend API can be deployed on any server that supports NodeJS and MySQL.

# Installation 

Note: Before running the project, make sure that you have installed Node.js and the Ionic CLI on your machine.

1 - clone the repository.
2 - Upload the SQL dump file hcp.sql to your SQL database , updated ./php-node/config/db.php with your SQL database informations:
    $connection=mysqli_connect("localhost", "root", "", "hcp");
 
3 - Upload the PHP script located in php-node to your host.
4 - test the script in your web browser , use admin-admin as user-pass.
5 - navigate to the NodeJS Folder part of the project and Install dependencies using 'npm install' command.
6 - change ./db.config.js/ with your current Database informations:

    module.exports = {HOST: "localhost",USER: "root",PASSWORD: "",DB: "hcp"};
    
7 - run the command 'node server.js' --it will run the Node.js server on port 3000.
8 - navgiate to the VueJS Folder part and Install dependencies using 'npm install' command.
9 - run the command 'ionic serve' --it will run the Ionic server on port 8100.

# Contributing

Contributions are welcome! If you want to contribute to the project, please fork the repository and submit a pull request with your changes.


For all informations  : https://amaador.com/stagehcp/

# Screenshots

Class Diagram : 

![new](https://user-images.githubusercontent.com/71513920/233866908-5c529d87-122a-4142-baed-cdf28310a608.PNG)

![image](https://user-images.githubusercontent.com/71513920/233867343-96229997-9155-48b4-a3e6-0c0703fa890c.png)
![image](https://user-images.githubusercontent.com/71513920/233867348-9c36a047-feba-4c09-97d3-5b81752672f9.png)
![image](https://user-images.githubusercontent.com/71513920/233867371-01a2dca4-482d-4b7d-b5fa-a22d013ac230.png)
![image](https://user-images.githubusercontent.com/71513920/233867385-cf719034-0e01-495a-a85c-ecb3167b8e68.png)
![image](https://user-images.githubusercontent.com/71513920/233867411-6d4f8994-1661-4932-87e8-2e138e5b6bba.png)
![image](https://user-images.githubusercontent.com/71513920/233867427-e1f4e7fa-293f-4e2d-807f-4db345429d9d.png)
![image](https://user-images.githubusercontent.com/71513920/233867440-53f96b67-c26b-47d3-84cd-fcf44ae45949.png)
