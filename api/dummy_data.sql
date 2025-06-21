INSERT INTO
    authors (name, email)
VALUES (
        'J.K. Rowling',
        'jkrowling@example.com'
    ),
    (
        'George R.R. Martin',
        'grrm@example.com'
    ),
    (
        'Jane Austen',
        'jane.austen@example.com'
    );

INSERT INTO
    books (
        title,
        price,
        stock_quantity,
        author_id
    )
VALUES (
        'Harry Potter and the Sorcerer\'s Stone',
        19.99,
        50,
        1
    ), -- J.K. Rowling
    (
        'Harry Potter and the Chamber of Secrets',
        22.99,
        30,
        1
    ), -- J.K. Rowling
    (
        'A Game of Thrones',
        25.50,
        40,
        2
    ), -- George R.R. Martin
    (
        'A Clash of Kings',
        27.99,
        35,
        2
    ), -- George R.R. Martin
    (
        'Pride and Prejudice',
        15.00,
        20,
        3
    );
-- Jane Austen

INSERT INTO
    customers (name, email, phone)
VALUES (
        'Alice Walker',
        'alice@example.com',
        '01710000001'
    ),
    (
        'Bob Stone',
        'bob@example.com',
        '01710000002'
    ),
    (
        'Charlie Rose',
        'charlie@example.com',
        '01710000003'
    );

INSERT INTO
    orders (customer_id, total_amount)
VALUES (1, 42.98), -- Alice
    (2, 25.50), -- Bob
    (3, 42.99);
-- Charlie

-- Alice buys 1x Harry Potter 1 and 1x Harry Potter 2
INSERT INTO
    order_details (
        order_id,
        book_id,
        quantity,
        line_total
    )
VALUES (1, 1, 1, 19.99),
    (1, 2, 1, 22.99);

-- Bob buys 1x A Game of Thrones
INSERT INTO
    order_details (
        order_id,
        book_id,
        quantity,
        line_total
    )
VALUES (2, 3, 1, 25.50);

-- Charlie buys 1x A Clash of Kings and 1x Pride and Prejudice
INSERT INTO
    order_details (
        order_id,
        book_id,
        quantity,
        line_total
    )
VALUES (3, 4, 1, 27.99),
    (3, 5, 1, 15.00);