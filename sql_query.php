1 - getting second last row in mysql

// SELECT * FROM
   - > (SELECT *FROM lastRecordBeforeLastOne ORDER BY Id DESC LIMIT 2) tbl1
   - > ORDER BY Id LIMIT 1;

2 - getting 1st and last row in mysql

// (select * from DemoTable694 order by EmployeeId ASC LIMIT 1)
UNION
(select * from DemoTable694 order by EmployeeId DESC LIMIT 1);

3 - How to select record from last 6 months in a news table using MySQL?

// select * from Newstable where NewsDatetime > date_sub(now(),Interval 6 month)

4 - find 2nd largest no. in demotable sql

// select Marks from DemoTable
where Marks=(select MAX(Marks) from DemoTable where Marks < (select MAX(Marks) from DemoTable))

5 - another way of findind 2nd last max  number in mysql

// SELECT MAX(Number)
  FROM DemoTable
  WHERE Number < (SELECT MAX(Number) FROM DemoTable);

6 - Get Last Entry in a MySQL

// select * from lastEntryDemo order by Name desc limit 1;

7 - get second highest salary in a mysql

// select distinct(EmployeeSalary) from DemoTable867 order by EmployeeSalary DESC LIMIT 1 OFFSET 1

8 - get a specific column name from table

// select StudentName from DemoTable1837;

9 - how to use alias in column name in table

// select Id,StudentFirstNameInCollege AS Name from DemoTable;

10 - how to use join of two table

// SELECT c.CustomerName, o.OrderID
   FROM Customers c
   LEFT JOIN Orders o ON c.CustomerID = o.CustomerID
   ORDER BY c.CustomerName;

11 - delete multiple id using mysql

// DELETE FROM students WHERE id IN($deleteId)



# tutorialpoints.com
# https://phppot.com/category/php/