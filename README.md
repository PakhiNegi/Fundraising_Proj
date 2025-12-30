# Wings Donations - Fundraising Management (Academic Project)

Note: This is an academic project developed for the Bachelor of Computer Science . It is a functional simulation of a crowdfunding platform. [cite_start]No real financial transactions are processed; the payment gateway and verification steps are for demonstration purposes only

 Project Overview
Developed as a Major Project for the academic year 2023-24. The goal was to build a robust system that simulates donor management, campaign tracking, and transparency in fundraising

Key Features (Simulated)
User Authentication:Registration and login system featuring SHA-256 password hashing and unique salt generation
Crowdfunding Dashboard: A central hub ("Home") where users can browse simulated NGO campaigns and track fundraising progress
Campaign Progress Bars: JavaScript-driven progress bars that visually represent "Funds Raised" vs "Financial Targets" based on database values
Donation Workflow:
  Monetary: A simulated "Donate Money" path for local causes
  Goods: A system to donate specific items like school bags or hygiene kits
  Interactive Community: A blog section for users to read and post updates about causes
  User Profile Management:** Logic to update account details and upload profile pictures
Tech Stack
Backend: PHP 
Database: MySQL (Relational Database Management) 
Frontend: HTML5, CSS3, JavaScript (AJAX for profile updates) 
Server: Apache / XAMPP 

Core Project Files
index.html` - Professional landing page for "Wings Donations"
home.html` - The primary dashboard after login
register.php` / `login.php` - Secure authentication handling
actcampaigns.html` - Displays ongoing campaigns with progress tracking
moneypayment.php` - Simulated payment recording logic
