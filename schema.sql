-- RUGBY GEAR — database schema
-- Run this once against your 'RUGBY GEAR' database before using the app.

CREATE TABLE IF NOT EXISTS loans (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    rugby_gears_name    VARCHAR(50)  NOT NULL,
    borrower_name       VARCHAR(50)  NOT NULL,
    Borrow_date         DATE,
    due_back            DATE,
    returned_date       DATE         NULL, 
    logged_by       INT              NULL, 
    NOTES               VARCHAR(100)
    FOREIGN KEY (logged_by) REFERENCES Manager(id)
);

CREATE TABLE IF NOT EXISTS manager (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    coach_name      VARCHAR(50)  NOT NULL,
    coach_email     VARCHAR(50)  NOT NULL UNIQUE,
    phone_number    INT(50)      NOT NULL,
    coach_height_cm INT(10)          NULL, 
    password        VARCHAR(255) NOT NULL,     
);

-- Demo monitor account: manager@school.nz / password123
-- (the hash below is a real bcrypt hash of "password123")
INSERT INTO manager (coach_name, coach_email, coach_height_cm, phone_number, password) VALUES
    ('Alex', 'manager@school.nz', '023554978', '187', '$2a$12$c3VcRsy/1Vurck0L7ly.yuXizwBukK3CMrx6KFBqnY1Z8oLcMlvjK');

-- A few sample loans so view_loans.php / manage_loans.php show something immediately.
INSERT INTO loans (rugby_gears_name, borrower_name, Borrow_date, due_back, returned_date, logged_by) VALUES
    ('rugby ball',          'Sami A.', '2026-06-21', '2026-07-27', NULL,         1),
    ('uniform',             'Ray M.',  '2026-07-14', '2026-07-24', NULL,         1), -- deliberately overdue
    ('mouth guard',         'Jaxon M.',   '2026-08-15', '2026-09-07', '2026-07-19', 1);
