## Assessment

PHP implementation to solve the assessment. The code will show you my abilities to solve problems, write clean and maintainable code, and follow best practices. 

Below, you'll find details about the requirements, installation, how to execute the code and how to run tests.

---

### 📋 Requirements

Minimum requirements to run the project

* **PHP 8.2** or higher
* **Composer 2** to use autoloading standard psr-4

---

### 📥 Installation
To install and run this project, follow these steps:
* Clone the repository: ```git clone https://github.com/argenisbg/stassessment.git```
* Run ```composer install```
##

---

### 🚀 Code Execution
Go to the root folder of the project and use the commands below to execute the solution for each question
```
composer sourcetoad:one
composer sourcetoad:two
composer sourcetoad:three
```
##

---

### 🧪 Testing

To ensure the code works as expected, I've included a set of test cases. Here's how you can run the tests:
```bash
  composer test
```


### 📂 Project Structure
Here's an overview of the project structure:
```sourcetoad-assessment/
├── app/                # Source code files
│  ├── Models/          # Models for data manipulation
│  │  ├── Address.php
│  │  ├── Cart.php
│  │  ├── Customer.php
│  │  └── Item.php
│  ├── Services/        # Service for shipping (mock)
│  │  └── ShippingService.php 
│  ├── Traits/          # Array handler trait
│  │  └── WithArrays.php 
│  └── Guest.php
├── storage/            # File storage and fixtures
│  └── fixtures/        # Data structure
│    └── guests.php 
├── test/               # Testing folder
│  ├── storage/      
│  │   └── fixtures     # Sample data for testing
│  │     ├── guestSampleNested.php
│  │     └── sortSampleData.php
│  ├── Unit/            # Unit tests
│  │  ├── Models/       # For data manipulation
│  │  │  └── CartTest.php
│  └──├── Services/     # Sample data
│     │  └── ShippingServiceTest.php
│     └── GuestTest.php # Test cases for guest data structure
├── questionOne.php
├── questionTwo.php
├── questionThree.php
└── README.md           # This file
```
##

---
### 📝 Notes

Thank you for reviewing my Assessment! If you have any questions or feedback, feel free to reach out. 😊

### Author
**Argenis Barraza Guillen**

Date: 2/6/2025