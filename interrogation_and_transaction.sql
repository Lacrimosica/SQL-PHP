/*According to the schema of the EVALUATION table, the same user can rate a CONTENT with 
a CodC multiple times but on different dates
*/

SELECT R.Date , R.Evaluation
FROM CONTENT C, RATING R
WHERE C.SSN=R.SSN AND C.CodC = C.SSN


START TRANSACTION;
INSERT INTO USER(SSN, Name, Surname, YearOfBirth) VALUES('X', ..., ..., ..., ...);
INSERT INTO RATING(SSN, CodC, Date, Evaluation) VALUES ('X','Y', ..., ...);
COMMIT;
