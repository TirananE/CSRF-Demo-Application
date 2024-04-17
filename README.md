Project Name: CSRF Demo Application

Introduction
This project demonstrates a simple Cross-Site Request Forgery (CSRF) attack scenario using PHP and HTML. The files included are used to simulate an attack where a user's username is changed without their consent through CSRF.

Prerequisites
- PHP server (Apache/Nginx)
- Ability to run PHP scripts
- A web browser

File Descriptions
- `attack.html`: This HTML page performs the CSRF attack by automatically submitting a form that points to `change_username.php`.
- `change_username.php`: PHP script that processes the username change request.
- `input.php`: PHP script that accepts a username input from the user.
- `information.php`: Provides additional information and setup details.
- `database.db`: SQLite database file (used for storage, requires PHP SQLite extension).

Setup Instructions

1. Configure the Server
Ensure that your PHP server is up and running. Place all the PHP and HTML files in the server's root directory or a specific project directory.

2. Database Setup
Make sure the PHP SQLite extension is enabled in your php.ini file, as the application uses an SQLite database to store user data.

3. Update Paths
If necessary, update the paths in the HTML and PHP files to reflect the correct locations where these files reside on your server.

Running the Application

Step 1: Start the Server
Start your PHP server if it's not already running. For example, if using the built-in PHP server, navigate to your project directory and run:


Step 2: Open `input.php`
Open your web browser and navigate to `http://localhost:8000/input.php` to set or change the initial username.

Step 3: Trigger the Attack
Open `attack.html` in your browser, which will automatically execute the CSRF attack by submitting a form to `change_username.php`. This action will change the username without the user's direct interaction.

Conclusion
This setup demonstrates the vulnerability of web applications to CSRF attacks and the importance of implementing CSRF tokens in forms to prevent such exploits.
