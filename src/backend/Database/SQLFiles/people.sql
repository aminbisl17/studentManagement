use ubt;

--select * from people where Emri = 'amin';

INSERT INTO people (Emri, Mbiemri, Vendbanimi, Email, numri_telefonit)
VALUES (
    'Rindrit', 
    'Telaku', 
    'Suhareka',
    LOWER(LEFT('Rindrit',1) + LEFT('Telaku',1) + CAST((ISNULL((SELECT MAX(ID) FROM people),0)+1) * CAST(RAND() * 1000 AS INT) AS VARCHAR) + '@ubt-uni.net'),
    '355671234567'
);