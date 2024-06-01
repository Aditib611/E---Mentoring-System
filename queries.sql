

SELECT userregistration.firstName, userregistration.lastName, registration.year, mentors.mentor_name, registration.sem, registration.cgpa, registration.prnno 
FROM registration JOIN mentors on registration.mentor = mentors.mentor_name JOIN userregistration ON registration.prnno = userregistration.prnno;



insert into acadamics (userregistration.firstName, userregistration.lastName, registration.email, registration.prnno, registration.year, registration.sem, registration.cgpa, mentor.mentor_name) 
FROM registration JOIN mentors on registration.mentor = mentors.mentor_name JOIN userregistration ON registration.prnno = userregistration.prnno;