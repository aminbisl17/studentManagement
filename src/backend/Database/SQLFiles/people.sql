use ubt;

select * from people where Emri = 'amin';

INSERT INTO people (Emri, Mbiemri, Vendbanimi, Email, numri_telefonit)
VALUES (
    'Amin', 
    'Bislimaj', 
    'Prishtina',
    LOWER(LEFT('Amin',1) + LEFT('Bislimaj',1) + CAST((ISNULL((SELECT MAX(ID) FROM people),0)+1) * CAST(RAND() * 1000 AS INT) AS VARCHAR) + '@ubt-uni.net'),
    '355671234567'
);