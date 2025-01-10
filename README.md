<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Expense Management</title>
</head>
<body>

    <h1>Personal Expense Management</h1>

    <p>This project is a web application developed in <strong>Laravel</strong> for managing personal expenses. It allows users to register, manage, and view their expenses in a simple and efficient way. The application provides key features such as total calculation, expense categorization, the option to filter by categories and dates, and the ability to edit or delete records.</p>

    <h2>Main Features</h2>
    <ul>
        <li><strong>Expense Registration</strong>: Users can add new expenses with a description, amount, category (such as "Food", "Transport", "Leisure"), and date.</li>
        <li><strong>Expense Viewing</strong>: Expenses are presented in a list ordered by date, with the most recent ones shown first.</li>
        <li><strong>Filters</strong>: Users can filter expenses by category or date range.</li>
        <li><strong>Total Calculation</strong>: The application shows the total accumulated expenses as well as the totals broken down by category.</li>
        <li><strong>Editing and Deleting Expenses</strong>: Expense records can be edited or deleted. Deletion requires confirmation to prevent accidental errors.</li>
        <li><strong>Data Validation</strong>: The system validates that the amount is a positive number, that the description and category are mandatory, and that the date is valid.</li>
    </ul>

    <h2>Requirements</h2>
    <ul>
        <li><strong>PHP</strong> 8.x or higher</li>
        <li><strong>Composer</strong></li>
        <li><strong>Laravel</strong> 11.x</li>
        <li><strong>Database</strong> (MySQL is recommended)</li>
        <li><strong>Node.js</strong> and <strong>NPM</strong> for compiling the application's assets.</li>
    </ul>

    <h2>Installation</h2>

    <h3>1. Clone the repository</h3>
    <p>First, clone the repository to your local machine:</p>
    <pre><code>git clone https://github.com/Jzulu22x/GestorGastos.git</code></pre>

    <h3>2. Install dependencies</h3>
    <pre><code>cd GestorGastos
composer install
npm install</code></pre>

    <h3>3. Configure the .env file</h3>
    <p><strong>Copy the .env.example file</strong></p>
    <pre><code>cp .env.example .env</code></pre>
    <p><strong>Edit the .env file and configure the database parameters according to your local environment:</strong></p>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-username
DB_PASSWORD=your-password</code></pre>

    <h3>4. Run migrations and seeders</h3>
    <p><strong>To create the tables in the database, run the migrations with the following command:</strong></p>
    <pre><code>php artisan migrate</code></pre>
    <p><strong>If you want to populate the tables with example data (such as categories or users), you can run the seeders you have created:</strong></p>
    <pre><code>php artisan db:seed</code></pre>

    <h3>5. Compile the assets</h3>
    <p><strong>Compile the application assets with NPM:</strong></p>
    <pre><code>npm run dev</code></pre>

    <h3>6. Run the server</h3>
    <p><strong>Start the Laravel local server:</strong></p>
    <pre><code>php artisan serve</code></pre>
    <p><strong>The application will be available at <a href="http://localhost:8000">http://localhost:8000</a>.</strong></p>

</body>
</html>

