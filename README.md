📓 My Blog App
Welcome to My Blog App, a user-friendly and robust blogging platform built with Laravel. This app allows users to manage their articles seamlessly, ensuring a great experience with CRUD functionalities, user authorization, authentication, and search and sort features. Additionally, it includes testing setups and database connectivity for comprehensive development and deployment.

🚀 Features Overview
🔒 Authentication and Authorization

Secure login and registration system.
Only authenticated users can create, edit, or delete their articles.
📝 CRUD Operations

Create and publish new articles.
Read and view existing articles.
Update articles as per the user’s choice.
Delete articles with authorization checks.
🔍 Search and Sort

Search by User: Locate articles by specific users.
Search by Article: Find articles by keywords in the title or content.
Sort by Date: Sort articles by publication date, from newest to oldest or vice versa.
🧪 Testing

Comprehensive test cases to ensure reliability and robustness.
🔗 Database Connectivity

Automatic database setup with configured environment variables.
📂 Project Structure
The app’s structure is straightforward to navigate and extend:

Controllers manage the core application logic, handling user and article actions.
Views offer user-friendly interfaces for interactions.
Models encapsulate data handling and relations.
⚙️ Getting Started
1. Clone the Repository
bash
Copy code
git clone https://github.com/your-username/my-blog-app.git
cd my-blog-app
2. Install Dependencies
bash
Copy code
composer install
npm install
3. Setup Environment
Rename .env.example to .env.
Update database credentials.
4. Run Migrations and Seeders
bash
Copy code
php artisan migrate --seed
5. Start the Application
bash
Copy code
php artisan serve
🔑 Usage Guide
🔐 User Authentication
Register/Login: Create a new account or log in to an existing one.
Authorization: Only the article creator can edit or delete their own articles, ensuring content privacy and integrity.
📋 Managing Articles
Create a New Article: Use the "Create" button to add a new article.
Edit Existing Articles: Go to "My Articles" and select an article to update.
Delete an Article: Users can remove articles with a single click, provided they have the right permissions.
🔄 Sorting and Searching
Sorting by Date: Use the sort button to switch between ascending and descending date order.
Searching:
By User: Find articles by author name.
By Title/Content: Search within the article’s title or body.
🛠 Testing
Run tests to validate functionalities:
bash
Copy code
php artisan test
📚 Technology Stack
Framework: Laravel
Frontend: HTML, CSS, Bootstrap
Database: MySQL
Authentication: Laravel Auth
Testing: PHP Unit, Jest (JavaScript)
💼 Future Enhancements
🌐 Improved UI/UX with more customizable themes.
📅 Enhanced Filtering options for articles by category or tag.
📝 License
This project is open-sourced under the MIT License.
