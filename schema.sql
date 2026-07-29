-- Gear Out — database schema
-- Run this once against your 'gearout' database before using the app.

CREATE TABLE IF NOT EXISTS loans (
    id             INT AUTO_INCREMENT PRIMARY KEY,
    item_name      VARCHAR(50)  NOT NULL,
    borrower_name  VARCHAR(50)  NOT NULL,
    borrowed_date  DATE         NOT NULL,
    due_back       DATE         NOT NULL,
    returned_date  DATE         NULL,      -- NULL = still out
    notes          VARCHAR(255) NULL
);

-- A few sample rows so view_loans.php has something to show immediately.
INSERT INTO loans (item_name, borrower_name, borrowed_date, due_back, returned_date) VALUES
    ('Hockey stick',  'Aroha T.',  '2026-07-20', '2026-07-27', NULL),
    ('Netball bibs (set)', 'Kane M.', '2026-07-15', '2026-07-16', NULL), -- deliberately overdue, for testing
    ('Soccer ball',   'Reo H.',    '2026-07-18', '2026-07-19', '2026-07-19');
