# Online Movie Rental Platform

Welcome to the Online Movie Rental Platform, a project developed as part of my portfolio to showcase my skills in PHP development. This project is built as a full-stack application, with both front-end and back-end developed using PHP. The back-end will be structured similarly to a PHP framework, providing a clean and organized codebase.

## Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## About the Project

The Online Movie Rental Platform is a web application where users can browse, rent, and watch movies online. This project simulates a real-world online movie rental service, featuring a user-friendly interface and a robust back-end.

The goal of this project is to create a scalable, maintainable, and secure application using PHP and modern development practices. The project is built from scratch, using Composer for dependency management and following the MVC (Model-View-Controller) architectural pattern.

## Features

- User registration and authentication
- Browse movies by categories, ratings, and other filters
- Rent movies and access rental history
- Online streaming of rented movies
- Admin panel for managing movies, users, and rentals
- Responsive design for desktop and mobile devices

## Technologies Used

- **PHP**: The core language used for both the front-end and back-end development.
- **Composer**: Dependency management to handle PHP libraries.
- **Twig**: Templating engine for rendering views.
- **MySQL**: Database management system for storing user data, movie information, and rental history.
- **Bootstrap**: Front-end framework for responsive design.
- **JavaScript (Alpine.js)**: For handling dynamic elements on the front-end.

## Installation

To run this project locally, follow these steps:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/online-movie-rental.git
   ```

2. **Navigate to the project directory:**

   ```bash
   cd online-movie-rental
   ```

3. **Install dependencies via Composer:**

   ```bash
   composer install
   ```

4. **Set up the database:**

   - Create a MySQL database.
   - Import the provided SQL file (`database/migrations.sql`) into your database.
   - Update the `.env` file with your database credentials.

5. **Run the development server:**

   ```bash
   php -S localhost:8000 -t public/
   ```

6. **Access the application:**

   Open your browser and navigate to `http://localhost:8000`.

## Usage

- **User Access**: Sign up or log in to browse and rent movies.
- **Admin Access**: Log in with admin credentials to manage the content on the platform.
- **Movie Streaming**: Rent a movie and start streaming directly on the platform.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes. Make sure to follow the coding standards used in the project.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

If you have any questions or suggestions about the project, feel free to reach out:

- **Email**: adrjmiranda@gmail.com
- **GitHub**: [adrjmiranda](https://github.com/adrjmiranda)
