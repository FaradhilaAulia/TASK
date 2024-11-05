# TASK

## USER REQUIREMENTS DOCUMENT 

![User Requirements Document for Laravel Application
Overview
This document outlines the requirements and instructions for using the Laravel application developed for managing employee data, transactions, and approval workflows. The application is built using the Laravel framework and can be run locally using Laragon.

Prerequisites
Before using the application, ensure that you have the following installed on your machine:

Laragon: A local development environment for PHP that makes it easy to run Laravel applications.
Composer: A dependency manager for PHP. Laragon usually comes with Composer pre-installed.
Git: For version control (optional, but recommended).

installation Steps
1. Clone the Repository
Open your command line interface (CLI) and navigate to the Laragon www directory. Clone the repository using the following command:

git clone <repository-url>

Replace <repository-url> with the URL of your repository.

2. Navigate to the Project Directory
Change to the project directory:

cd <project-directory>

Replace <project-directory> with the name of your cloned project folder.

3. Install Dependencies
Run the following command to install the required PHP dependencies:

composer install

4. Set Up Environment File
Copy the .env.example file to create your .env file:

cp .env.example .env

Edit the .env file to configure your database settings and other environment variables:

nano .env

5. Generate Application Key
Run the following command to generate an application key:

php artisan key:generate

6. Run Migrations
To set up the database tables, run the migrations:

php artisan migrate

 Seed the Database (Optional)
If you have seeders set up, you can populate your database with sample data:

php artisan db:seed

8. Start the Laragon Server
Open Laragon and start the server. Your application should be accessible at http://localhost/<project-directory>.

Application Features
Employee Management
View Employees: Navigate to /employees to see a list of all employees.
Add Employee: Go to /employees/create to add a new employee.
Edit Employee: Click on an employee's edit button to modify their details.
Delete Employee: You can delete an employee from the list.
Need Approval Management
View Need Approvals: Access /need_approval to see all approval requests.
Add Need Approval: Use /need_approval/create to submit a new approval request.
Edit Need Approval: Modify existing requests by clicking on the edit button.
Delete Need Approval: Remove requests from the list.
Transaction Management
View Transactions: Go to /transactions to view all transactions.
Add Transaction: Navigate to /transactions/create to create a new transaction.
Edit Transaction: Click on a transaction to edit its details.
Delete Transaction: You can delete transactions from the list.
Workflow Approval Management
View Workflow Approvals: Access /workflow_approvals to see all workflow approvals.
Add Workflow Approval: Use /workflow_approvals/create to create a new approval workflow.
Edit Workflow Approval: Modify existing workflows by clicking on the edit button.
Delete Workflow Approval: Remove workflows from the list.
User Roles and Permissions
Admin: Full access to all features, including creating, editing, and deleting records.
**User **: Limited access to view records and create new entries, but cannot delete.
Troubleshooting
If you encounter any issues, check the Laragon logs for errors.
Ensure that your database is running and properly configured in the .env file.
If migrations fail, check for existing database tables that may conflict with the migration.
]!
