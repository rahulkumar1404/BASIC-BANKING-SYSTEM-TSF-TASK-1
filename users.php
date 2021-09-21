<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table with database</title>
    
    <link rel="icon" href="./img/icon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
<!--css-->
<style>
    table{
        border-collapse: collapse;
        width: 100%;
        color: black;
        font-size: 25px;
        text-align: left;
    }
    th{
        background: #863544;
        color: white;
    }
    tr:nth-child(even){
        background: #fff;
    }
    #sideNav{
        width: 250px;
        height: 100vh;
        color: black;
        position: fixed;
        right: -250px;
        top:0;
        background: #863544;
        z-index: 2;
        transition: .5s;
    }
    nav ul li{
        list-style: none;
        margin: 50px 20px;

    }
    nav ul li a{
        text-decoration: none;
        color: white;
    }
    #menuBtn{
        width: 50px;
        position: fixed;
        right: 65px;
        top:35px;
        z-index: 2;
        cursor: pointer;
    }
</style>
</head>
<body>
    <div style="font-family:'Gabriela'serif; font-size:40px; text-align: center;margin: 20px;">
    Banks Customers
    </div>

    <table>
        <tr>
            <th>Sr.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Balance</th>
            <th>Details</th>
        </tr>

        <?php
        //Connecting to Database
        $servername="localhost";
        $username="root";
        $password="";
        $database="rahul";

        //Create connection

        $conn=mysqli_connect($servername,$username,$password,$database);
        //die if connection was not successful
        if(!$conn){
            die("sorry we failed to connect: ".mysqli_connect_error());
        }

        $sql="SELECT * FROM `users`";
        $result=mysqli_query($conn,$sql);

        //find the numbers are recorder
        $num=mysqli_num_rows($result);

        //display the rows returned by the sql query

        if($num>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo '<form method="POST" action"details.php">';
                echo "<td>" . $row["Sr.No"] .  "</td><td>" . $row["Name"] .  "</td><td>" . $row["Email id"] .  "</td><td>" . $row["Gender"] .  "</td><td>" . $row["Balance"] . "</td>";
                echo "<td><a href='details.php?user={$row["Name"]}&message=no' type= 'button' name='user' id='user1'><span>Expand</span></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
        
    <nav id="sideNav">
        <ul>
            <li><a href="index.html">HOME</a></li>
            <li><a href="users.php">OUR CUSTOMERS</a></li>
            <li><a href="history.php">TRANSACTION HISTORY</a></li>
            <li><a href="users.php">TRANSFER MONEY</a></li>
            <li><a href="register.php">NEW USER</a></li>
        </ul>
    </nav>
    <img src="./img/menu.png" id="menuBtn">
    </table>


    <footer style="background: #111;
    color: white;
    height: 2%;
    bottom: -34px;">
        <marquee behavior="scroll" direction="right"> TSF GRIP TASK 1 DONE BY <span class="far fa-copyright"></span> RAHUL KUMAR</marquee>
    </footer>
    
</body>
<script>
        let menuBtn = document.querySelector("#menuBtn");
        let sideNav = document.querySelector("#sideNav");

        let condition = true;
        
        menuBtn.addEventListener('click', function() {
            if (condition) {
                sideNav.style.right = "0px";
                condition=false;
            } else {
                sideNav.style.right = "-250px";
                condition=true;
            }
        })
</script>
</html>