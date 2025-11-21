use ubt;
SELECT 
    p.Emri,
    p.Mbiemri,
    p.Vendbanimi,
    s.emailUBT,
    s.grupi,
    s.vitiAkademik,
    s.pagesa,
    s.isActive, 
    d.fushaStudimit,
    r.programi
FROM studentdata s
JOIN people p ON p.ID = s.id_personit
JOIN programet r ON r.ID = p.program_id
JOIN dega d ON d.ID = r.id_deges

WHERE s.emailUBT = 'ab1005@ubt-uni.net'
  AND s.studentPassword = 'ab1005';