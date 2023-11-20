/*1.*/  SELECT * FROM cust WHERE snum = 1001
/*2.*/  SELECT city, sname, snum, comm FROM sal
/*3.*/  SELECT rating, cname FROM cust WHERE city = 'San Jose'
/*4.*/  SELECT DISTINCT snum FROM ord
/*5.*/  SELECT sname, city FROM sal WHERE city = 'London' and comm > 0.11
/*6.*/  SELECT * FROM cust WHERE city != 'Rome' and rating <= 200
/*7.*/  SELECT * FROM ord WHERE odate IN ('03-OCT-90', '05-OCT-90')
        SELECT * FROM ord WHERE odate BETWEEN '03-OCT-90' AND '05-OCT-90' AND odate != '04-OCT-90'
/*8.*/  SELECT * FROM cust WHERE cname REGEXP '^[A-G]'
/*9.*/  SELECT * FROM sal WHERE sname LIKE '%e%'
/*10.*/ SELECT sum(amt) as totalAmt FROM ord WHERE odate = '03-OCT-90'
/*11.*/ SELECT sum(amt) as totalAmt FROM ord WHERE snum = 1001
/*12.*/ SELECT snum, max(amt) as maxAmt FROM ord GROUP BY snum
/*13.*/ SELECT * FROM cust WHERE cname LIKE '%s' ORDER BY cname LIMIT 0, 1
/*14.*/ SELECT city, avg(comm) as avgComm FROM sal GROUP BY city
/*15.*/ SELECT onum, amt*0.8 as amtEuro, sname, amt*0.8*comm as commEuro FROM ord JOIN sal USING (snum) WHERE odate = '03-OCT-90'
/*16.*/ SELECT onum, sname, cname FROM ord JOIN sal USING (snum) JOIN cust USING (cnum) WHERE sal.city IN ('London', 'Rome') ORDER BY onum
/*17.*/ SELECT sname, sum(amt) as sumAmt, comm*sum(amt) as comm FROM ord JOIN sal USING (snum) WHERE odate < '05-OCT-90' GROUP BY sname ORDER BY sname
/*18.*/ SELECT onum, amt, sname, cname FROM ord JOIN sal USING (snum) JOIN cust USING (cnum) WHERE (sal.city REGEXP '^[L-R]' and cust.city REGEXP '^[L-R]')
/*19.*/ SELECT snum, cust.cname, cust1.cname FROM cust JOIN cust as cust1 USING (snum) WHERE cust.cnum < cust1.cnum
/*20.*/ SELECT cname FROM cust WHERE snum IN (SELECT snum FROM sal WHERE comm < 0.13)
/*21.*/ CREATE TABLE mysal as SELECT * FROM sal;
        ALTER TABLE mysal ADD CONSTRAINT PK PRIMARY KEY (snum);
        DESC mysal
/*22.*/ INSERT INTO mysal VALUES (1010, 'Ivan', 'Irkutsk', 0.09);
        INSERT INTO mysal VALUES (1011, 'Petr', 'Krasnoyarsk', 0.11);
        SELECT * FROM mysal;
        DELETE FROM mysal WHERE snum = 1011;
        SELECT * FROM mysal;
/*23.*/ INSERT INTO mysal VALUES (1011, 'Petr', 'Krasnoyarsk', 0.11);
        INSERT INTO mysal VALUES (1012, 'Vasiliy', 'Usolye Sibirskoe', 0.12);
        UPDATE mysal SET comm = comm*2;
        SELECT * FROM mysal;