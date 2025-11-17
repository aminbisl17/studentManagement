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


SELECT p.*, d.*, b.*, s.* FROM programet p JOIN dega d ON d.ID = p.id_deges left join branch b on b.id_programit = p.ID join studyplaces s ON s.ID = b.id_lokacionit where p.programi = 'bachelor';