# Mini Twitter Application

This is a mini Twitter application built using Laravel, Vue.js, and MySQL. It enables users to post tweets and view a timeline of all tweets. However, it does not currently support user authentication, following, or unfollowing functionalities.

## Features

- **Tweet Creation:** Users can create new tweets.
- **Tweet Timeline:** Users can view a timeline of all tweets posted.

## Technologies Used

- **Laravel:** Laravel is used as the backend framework for handling server-side logic, routing, and interacting with the database.
- **Vue.js:** Vue.js is used for building the interactive user interface components.
- **MySQL:** MySQL is the chosen relational database management system for storing tweet data.

## Setup Instructions

1. **Clone the Repository:** Clone this repository to your local machine using `git clone`.

    ```bash
    git clone https://github.com/your-username/mini-twitter.git
    ```

2. **Install Dependencies:** Navigate into the project directory and install PHP and JavaScript dependencies.

    ```bash
    cd mini-twitter
    composer install
    npm install
    ```

3. **Database Setup:**
    - Create a MySQL database for the application.
    - Copy the `.env.example` file to `.env` and update the database configuration with your MySQL credentials.
    - Run database migrations to create necessary tables.

    ```bash
    php artisan migrate
    ```

4. **Start the Development Server:** Run the Laravel development server.

    ```bash
    php artisan serve
    ```

5. **Compile Assets:** In a separate terminal, compile the frontend assets.

    ```bash
    npm run dev
    ```

6. **Access the Application:** Open your web browser and visit `http://localhost:8000` to access the application.

## Contributing

Contributions are welcome! If you find any bugs or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).
