select * from students.base 
select * from students.score 

select a.stud_no,a.name,chengji.* from students.base as a,
(select stud_no,
case type when 't' then 'theory',case type when 'p' then 'practice',
SUM(case coursename when  'hardware' then score else 0 end) as hardware,
SUM(case coursename when  'software' then score else 0 end) as software,
SUM(case coursename when  'network' then score else 0 end) as network
from score group by stud_no) as chengji

