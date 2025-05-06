# Task-Management-System
This web application is a Task Management System used to assign and track tasks for employees. It has two stakeholders: Admin and User. Both can log in to the system using their email and password, and they are redirected to their corresponding dashboards.Admin has access to the full task management system, while users can only view and update their own tasks.

Note
........................
"Additionally added loginid to the task table to list tasks only for the logged-in user."

Admin
----------
Login: Admin can log in using their email and password.

Task Management: Admin can:

Add, view, edit, and delete tasks.

Filter tasks by deadline.

Filter tasks by status.

Logout: Admin can log out from the system.

User
-----------------
Login: Users can log in using their email and password.

Task View: After login, users can view their assigned tasks.

Task Filtering: 

Users can filter tasks by deadline.

Users can filter tasks by status.

Update Task Status: Users can mark tasks as "Completed."

Logout: Users can log out from the system.

About database
--------------------
Have login table with fields loginid,email,username,password and role
Have Task table with fields taskid,loginid,title,description,deadline,status

