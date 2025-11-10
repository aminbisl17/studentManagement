use ubt;

ALTER TABLE people
ADD CONSTRAINT DF_people_IsActive DEFAULT 0 FOR IsActive;