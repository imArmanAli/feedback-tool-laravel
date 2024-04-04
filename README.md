# Feedback Tool Backend Server

This is the backend server for the Feedback Tool developed using Laravel 8. It provides the necessary API endpoints for managing feedbacks and user authentication.

## Getting Started

To set up the backend server, follow these steps:

1. **Clone the Repository**: Navigate to the `htdocs` folder in your XAMPP directory (or any other web server directory). Create an empty folder for the backend server and initialize a Git repository by entering the following command in the command prompt:

    ```
    git init
    ```

    Then, clone the repository by executing:

    ```
    git clone [repository_url]
    ```

    Replace `[repository_url]` with the URL of the repository.

2. **Install Dependencies**: Once the repository is cloned, navigate into the project directory and install the PHP dependencies by running the following command:

    ```
    composer install
    ```

    This command will install all the necessary PHP packages required for the backend server.

3. **Database Setup**: Create a new database named `feedback-tool` in your MySQL database server. Update the database configuration in the `.env` file with your MySQL credentials.

4. **Migrate Database Tables**: Run the following command to migrate all the database tables:

    ```
    php artisan migrate
    ```

    This command will create the necessary tables in the `feedback-tool` database.

5. **Seed Database (Optional)**: You can populate the database with some test data by running the following command:

    ```
    php artisan db:seed
    ```

    This command will populate the database with dummy data using Faker.

6. **Start the Server**: Finally, start the Laravel server by running the following command:

    ```
    php artisan serve
    ```

    This command will start the server, and you can access the API endpoints at `http://localhost:8000`.

## API Documentation

The API endpoints can be tested using Postman. The Postman collection is included in the cloned repository, allowing you to test the API endpoints directly in Postman.

## Logging In

To log in using the data created by the seeder, follow these steps:

1. **Access Seeded User Data**: Navigate to the `users` table in your database management system (e.g., phpMyAdmin). Copy the email of the user you want to log in as.

2. **Use Default Password**: The default password for all seeded users is `12345678`.

3. **Log In**: Use the copied email and the default password (`12345678`) to log in to the application.



## Contributing

Contributions to the Feedback Tool backend server are welcome! If you find any bugs or have suggestions for improvements, please feel free to open an issue or submit a pull request on GitHub.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
