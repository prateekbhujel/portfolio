# Simple Laravel 10.x Portfolio with Blog

This repository contains a simple Laravel application for creating a personal portfolio with a blog feature. This project aims to provide a foundation for developers to showcase their work and share blog posts easily.

## Features

- **Personal Portfolio:**
  - Display your projects, skills, and other relevant information.
  - Customize the portfolio with your personal details.

- **Blog Section:**
  - Write and publish blog posts.
  - Categorize and tag blog posts for easy navigation.

## Getting Started

Follow these steps to set up the project on your local machine:

### Prerequisites

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) (>= 8.2)
- [Node.js](https://nodejs.org/) and [NPM](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/) or any other database of your choice

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/your-portfolio.git
   ```

2. Navigate to the project directory:

   ```bash
   cd your-portfolio
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Install NPM dependencies:

   ```bash
   npm install
   ```

5. Create a copy of the `.env.example` file and rename it to `.env`. Update the database and other relevant configurations in the `.env` file:

   ```bash
   cp .env.example .env
   ```

6. Generate application key:

   ```bash
   php artisan key:generate
   ```

7. Run migrations to create the necessary database tables:

   ```bash
   php artisan migrate
   ```

8. Seed the database with sample data:

   ```bash
   php artisan db:seed
   ```

9. Compile assets:

   ```bash
   npm run dev
   ```

10. Start the development server:

    ```bash
    php artisan serve
    ```

11. Visit `http://localhost:8000` in your browser to see your personal portfolio.

### Packages and all used here..
   1. Bootstrap, jQuery, Stilea Admin Template, FontAwesome (and Laravel Breeze)
   2. Laravel toastr (yoeunes/toastr)
   3. Image Intervention