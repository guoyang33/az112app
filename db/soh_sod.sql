CREATE TABLE soh (
	sale_no varchar(10),
	sale_date date,
	cust_id varchar(10),
	sale_amt numeric (10, 2)
);

INSERT INTO soh VALUES
    ('s101', '2014-01-10', 'c001', 1000.00),
    ('s102', '2014-01-11', 'c002', 2000.00),
    ('s103', '2014-01-12', 'c003', 3000.00);

CREATE TABLE sod (
	sale_no char(10),
	prod_id char(10),
	sale_price DECIMAL(10,2),
	sele_qty DECIMAL(10,0),
	exte_price DECIMAL(12,2)
);

INSERT INTO sod VALUES
    ('s101', 'p001', 100.00, 10, 1000.00),
    ('s101', 'p002', 200.00, 20, 4000.00),
    ('s102', 'p001', 100.00, 10, 1000.00),
    ('s102', 'p002', 200.00, 20, 4000.00),
    ('s103', 'p001', 100.00, 10, 1000.00),
    ('s103', 'p002', 200.00, 20, 4000.00);