Git hub link :https://github.com/OPdaisuki/CISC3003-project

Hello i'm team8 DC027495 DengYiFan,and what I do is to write the tenant login and register php and html.

To use our project you need to start our server, which requires us to install XAMPP or WAMP and MySQL already on our computer.

1,We start the XAMPP or WAMP server first
2,Let's open the Admin screen
3,Select import
4,we import the rentsys.sql file, which will create the required database and tables:

![image](https://github.com/OPdaisuki/CISC3003-project/assets/124011065/8ce824fa-f113-4126-aa1a-40879b2106c0)

After that we set the password of the user in conn.php file so that we can complete the connection to the database


//connect to the database

    $conn = mysqli_connect("localhost", "root", "root", "rentsys");
    
    if(!$conn){
    
        die("Failed to connect to the database server");
        
    }
    
    //Setting character set
    
    mysqli_query($conn, "set name utf8");
    

now is ok to use

