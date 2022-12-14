
# CSquare Assignment - ERP System

This project satisfies all the requirements given.




## Deployment

1. Download zip file of the code.
2. Extract the zip file and move the project file to the WWW folder of the server. he default location is as given below:

```bash
  C:\Wampserver\www
```
3. Import the database file to the MySQL server. 
4. Edit the con.php file in the project folder to have the correct credentials of your MySQL server. The current configurations are as given below:

![image](https://user-images.githubusercontent.com/86348725/207273519-30f24f9f-1e8d-475f-b4b5-335c87059b2b.png)

5. Run the index.php file by typing in the browser as follows:
```bash
  localhost/http://localhost/CSquareAssignment/index.php
```

## Environment Variables

To run this project, you will need to have a running PHP server such as WAMP or XAMPP along with a MySQL server. In my case, I used the MySQL server provided by the WAMPserver.

In MySQL server (PHPMyAdmin which was provided by WAMPserver) you can import the .sql file or the database which was used in this assignment.

![image](https://user-images.githubusercontent.com/86348725/207261342-bda6762f-b813-4c18-8486-a7d5b856e293.png)


## Assumptions & Features added
#Task 1

1. Middle name wasn't used in the form since it wasn't mentioned in the requirement. 
2. Since search was mentioned alongside insert, update and delete in the description after the title, search was added to this.
3. The search function will work like a filter and use disctrict No, First name and Last name to filter the table.
4. When showing the customer data as list, it was assumed that the district no, will be added to table instead of joining district table.

#Task 2

1. Since some values were given as "must be able to select" and since they also depend on database, PHP was used to pull the data from the database to be used in a select option in the form.
2. The search function will act as a filter and item name and code can be used to filter the table.

#Task 3

1. Since the assignment mentioned that the user "should be able to select a date range and search" a validation was added to the search funciton to have a date range to search within. 
2. Since no update or delete was mentioned here specifically, it wasn't implemented.
3. Joins and other functions of SQL were used here to get the specific information to the table. 
4. Date range and search weren't added to the item report list since it wasn't specifically mentioned here.
5. Special MySQL codes were used to make the item name distinct and not repeat while only adding their quantities.

#Extra Assumptions
1. I Didn't try editing out the database itself since there were no requirements regarding that. But the database was lacking relationships between tables. Might've been easier if the relationships were established when they were created. But I managed to complete all the requirements with PHP and MySQL queries alone. 


## Screenshots
![image](https://user-images.githubusercontent.com/86348725/207267848-0e29ac9d-8f51-4afc-b7df-e5958965bfb5.png)
![image](https://user-images.githubusercontent.com/86348725/207279460-2343a76d-ddf6-4b08-83f0-aa39f92520fa.png)
![image](https://user-images.githubusercontent.com/86348725/207279226-90bd2975-dc6d-4e68-b82b-72a67f744661.png)
![image](https://user-images.githubusercontent.com/86348725/207279373-767fbc85-1827-4dcd-94d7-a8e8c1055396.png)
![image](https://user-images.githubusercontent.com/86348725/207279515-bea449fe-066c-4228-aaac-2171e3c5c021.png)
![image](https://user-images.githubusercontent.com/86348725/207280232-1f07fda1-38c4-4c50-ab7f-f833958dd236.png)
![image](https://user-images.githubusercontent.com/86348725/207280290-b559b3e8-dcca-4ec5-835b-a12c7b9686f3.png)
![image](https://user-images.githubusercontent.com/86348725/207280453-f7d4f28b-7c74-4b4c-80f0-8e8f875fec36.png)
![image](https://user-images.githubusercontent.com/86348725/207280503-713076e2-0c1c-44d4-8661-14370d4f5412.png)
![image](https://user-images.githubusercontent.com/86348725/207280565-5b4e9b8b-bcb6-432c-8190-b481ef574dac.png)







