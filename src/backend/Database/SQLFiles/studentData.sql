use ubt;



-- insert into studentData(id_personit, id_programit, vitiAkademik, semestri, grupi, emailUBT, pagesa) values(1002,1,1,1, 'GPZa',
  --LOWER(LEFT('Elon',1) + LEFT('Zenelaj',1) + CAST((ISNULL((SELECT MAX(ID) FROM people),0)+1) * CAST(RAND() * 1000 AS INT) AS VARCHAR) + '@ubt-uni.net'), 1800);

--LTER TABLE studentData
--ADD studentPassword AS LEFT(emailUBT, CHARINDEX('@', emailUBT) - 1);
-- helloddf


--SELECT 
  --  t.name AS TableName,
   -- c.name AS ColumnName,
   -- dc.name AS DefaultConstraintName,
   -- dc.definition AS DefaultValue
---FROM sys.default_constraints dc
--JOIN sys.columns c 
  --  ON dc.parent_object_id = c.object_id 
  -- AND dc.parent_column_id = c.column_id
--JOIN sys.tables t 
  --  ON dc.parent_object_id = t.object_id
--WHERE t.name = 'people';

/*INSERT INTO people (Emri, Mbiemri, Vendbanimi, Email, numri_telefonit)
VALUES (
    'Rindrit', 
    'Telaku', 
    'Suhareka',
    LOWER(LEFT('Rindrit',1) + LEFT('Telaku',1) + CAST((ISNULL((SELECT MAX(ID) FROM people),0)+1) * CAST(RAND() * 1000 AS INT) AS VARCHAR) + '@ubt-uni.net'),
    '355671234567'
);*/
/*
alter table studentdata drop column studentPassword;

alter table studentdata add studentPassword varchar(50);

*/
/*
IF OBJECT_ID('trg_generate_studentdata', 'TR') IS NOT NULL
    DROP TRIGGER trg_generate_studentdata;
GO

CREATE TRIGGER trg_generate_studentdata
ON studentdata
AFTER INSERT
AS
BEGIN

    UPDATE s
SET 
    s.emailUBT = LOWER(LEFT(p.Emri,1) + LEFT(p.Mbiemri,1) + CAST(p.ID AS VARCHAR) + '@ubt-uni.net'),
    s.id_programit = pr.ID,
    s.semestri = 1,
    s.vitiakademik = 1
FROM studentdata s
INNER JOIN inserted i ON s.id_personit = i.id_personit
INNER JOIN people p ON i.id_personit = p.ID
INNER JOIN programet pr ON pr.ID = p.program_id; 

UPDATE s
SET s.studentPassword = LEFT(s.emailUBT, CHARINDEX('@', s.emailUBT) - 1)
FROM studentdata s
INNER JOIN inserted i ON s.id_personit = i.id_personit;

    UPDATE p
    SET p.isActive = 1
    FROM people p
    INNER JOIN inserted i ON p.ID = i.id_personit;
END;
GO
*/
/*
IF OBJECT_ID('trg_studentdata_after_delete', 'TR') IS NOT NULL
    DROP TRIGGER trg_studentdata_after_delete;
GO

CREATE TRIGGER trg_studentdata_after_delete
ON studentdata
AFTER DELETE
AS
BEGIN

    UPDATE p
    SET p.isActive = 0
    FROM people p
    INNER JOIN deleted d ON p.ID = d.id_personit;
END;
GO

*/


insert into studentdata(id_personit, grupi, pagesa) values(1006, 'GPZa', 360.00);
select * from studentData;