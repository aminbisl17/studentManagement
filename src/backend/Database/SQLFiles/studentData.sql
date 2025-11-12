use ubt;



-- insert into studentData(id_personit, id_programit, vitiAkademik, semestri, grupi, emailUBT, pagesa) values(1000,1,1,1, 'GPZa', 'ab72804@ubt-uni.net', 1800);

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


select * from studentdata;