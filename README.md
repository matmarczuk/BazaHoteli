# HolidayHotelBooking

Student Holiday Hotel Booking system project made for database course. System is divided into 3 parts: client, manager and reception. Each has its own functions and UIs but every of them operate on the same SQL database.

## Launching

#### Clone repo into into 
``` 
git clone https://github.com/matmarczuk/HolidayHotelBooking.git
```
#### Log in into mysql local server

```
mysql -u <username> -p
```

#### Create database
```
mysql> source <path_to_clone_dir>\HolidayHotelBooking\construct_db.sql;
```
#### Fill database with example records
```
mysql> source <path_to_clone_dir>\HolidayHotelBooking\insert_example_data.sql;
```
#### Insert user,socket dir and host into connect.php file 

```
$socket = '<server_socket_dir>';
$host = "<host_name>";
$db_user = "<username>";
$db_password = "<password>";
$db_name = "mydb1";
  
```
#### Run one of the type of service using your browser

```
<host_name>/client  
```


## Example screenshots 
Client website
![alt text](https://user-images.githubusercontent.com/26739110/54788370-11f5b500-4c2f-11e9-9d8b-736ccefe4717.png)
Manager panel
![alt text](https://user-images.githubusercontent.com/26739110/54788390-23d75800-4c2f-11e9-9e8c-11aee4d027f0.png)
