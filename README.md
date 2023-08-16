# Simple Farm website, with Authorization & Database CRUD operations

 
<b>Preview:</b>
![Screenshot from 2023-08-16 13-55-07](https://github.com/rncs92/eShop/assets/123461096/2b810ce2-9ea5-4e9f-91bf-261e84b29b1e)
![Screenshot from 2023-08-16 13-55-53](https://github.com/rncs92/eShop/assets/123461096/784f3012-acc0-4c20-9c38-314ecf8ca3a6)
![Screenshot from 2023-08-16 13-55-57](https://github.com/rncs92/eShop/assets/123461096/4fc46e6b-db34-49e2-abdd-76e286835f98)
![Screenshot from 2023-08-16 13-55-49](https://github.com/rncs92/eShop/assets/123461096/3123e146-8ec0-46b6-bf5d-0acdf7a312ac)
![Screenshot from 2023-08-16 13-55-46](https://github.com/rncs92/eShop/assets/123461096/1b21ad10-95f2-440b-b5c2-2eee622df030)



<b>Installation guide:</b>
 1) Clone the Repository:

    - In a terminal or command prompt, navigate to the directory where you want to store the project.
    - Run the following command to clone the repository:

        <b>git clone https://github.com/your-username/your-repository.git</b>

    - This will create a local copy of repository on your PC.

2) Install Dependencies:

    - Change the directory to the project folder using cd your-repository.
    - Run the following command to install the project dependencies using Composer:

        <b>composer install</b>
    
3) Environment Configuration:

    - Create a copy of the .env.example file and rename it to .env.
    - Open the .env file and update the necessary configuration options such as the database connection details.

4) Database Setup:

    - Create a new empty database for the project.
    - Update the .env file with the correct database credentials (database name, username, password).

5) Run Migrations:

    - To set up the database schema, run the following command:

        <b>php artisan migrate</b>

5) Serve the Application:

    - Finally, start the Laravel development server by running the following command:

        <b>php artisan serve</b>

    - This will start the server to access the application in your web browser at http://localhost:8000 (or another port specified in the output).  



