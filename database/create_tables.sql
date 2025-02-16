-- Create the users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    dob DATE NOT NULL
);

-- Create the experience table
CREATE TABLE experience (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    company_name VARCHAR(255),
    job_title VARCHAR(255),
    start_date DATE,
    end_date DATE,
    job_description TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Create the jobless table
CREATE TABLE jobless (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    jobless_start_date DATE,
    jobless_end_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Grant permissions to the user for your database
GRANT ALL PRIVILEGES ON job_portal.* TO 'app_user'@'localhost' IDENTIFIED BY 'password';

-- If the user connects remotely, replace localhost with '%' for any host:
-- GRANT ALL PRIVILEGES ON your_database_name.* TO 'app_user'@'%' IDENTIFIED BY 'your_password';

-- Don't forget to reload the privileges after granting permissions:
FLUSH PRIVILEGES;
