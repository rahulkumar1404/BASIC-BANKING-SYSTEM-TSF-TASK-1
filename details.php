<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table with database</title>
    
    <link rel="icon" href="./img/icon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
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
            background: #f2f2f2;
        }
        #sideNav{
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            background: #863544;
            z-index: 2;
            transition: .5s;
        }
        nav ul li {
            list-style: none;
            margin: 50px 20px;

        }
        nav ul li a{
            text-decoration: none;
            color: white;
        }
        #menubtn{
            width: 50px;
            position: fixed;
            right: 65px;
            top: 35px;
            z-index: 2;
            cursor: pointer;
        }
        .card{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: .3s;
            text-align: -webkit-center;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .container{
            padding: 20px 16px;
            margin: 40px;
            background: antiquewhite;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Account Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Balance</th>
        </tr>

        <?php
        session_start();
        $server="localhost";
        $username="root";
        $password="";
        $conn=mysqli_connect($server,$username,$password,"rahul");
        if(!$conn){
            die("connection failed");
        }
        $_SESSION['user']=$_GET['user'];
        $_SESSION['sender']=$_SESSION['user'];
        ?>


        <?php
        if(isset($_SESSION['user'])){
            $user=$_SESSION['user'];

            $sql="SELECT * FROM user WHERE Name='$user'";
            $result= mysqli_query($conn,$sql);

            while($row=mysqli_fetch_array($result)) {
                echo "<tr>";

                echo "<td>" . $row["Acc_Number"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email Id"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Balance"] . "</td>";

                echo "</tr>";
            }
        }

        ?>

        <div style ="font-family:'Gabriela', serif; font-size: 40px; text-align:center;margin:20px;">
        <h3>Make Transaction</h3>
        </div>

        <div class="card container">
            <?php 
            if($_GET['message']=='success'){
                echo "<h3><p style='color:green'; class='messagehide'>Transaction was completed successfully</p></h3>";

            }
            if($_GET['message']=='transactionDenied'){
                echo "<h3><p style='color:red'; class='messagehide'>Transaction Failed</p></h3>";

            }
            ?>
            <!---Make Transcation-->
            <form action="transfer.php" method="POST">           <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
            <select name="reciever" id="dropdown" class="textbox" required>
                <option>Select Recipient</option>

                <?php
                $db=mysqli_connect("localhost", "root", "", "rahul");
                $res=mysqli_query($db,"SELECT * FROM users WHERE name!='$user'");
                while($row=mysqli_fetch_array($res)){
                    echo ("<option>" . "  " . $row['Name'] . "</option>");
                }
                ?>
            </select>
            <br> <br>
            <b> From </b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size: 1.2rem;">
            <input id="mytext" name="sender" class="textbox" disabled type="text" value='<?php echo "$user";?>'></input>
        </span>
            <br><br>


            <b> Amount :&#8377;</b>
            <input name="amount" type="number" min="100" class="textbox" required>
            <br><br>
            <a href="transfer.php"><button id="transfer" name="transfer" ;>Transfer</button></a>
            </form>
         </div>

         
        <div style ="font-family:'Gabriela', serif; font-size: 40px; text-align:center;margin:20px;"><h3>Customer Details </h3></div>

        <nav id="sideNav">
        <ul>
            <li><a href="index.html">HOME</a></li>
            <li><a href="users.php">OUR CUSTOMERS</a></li>
            <li><a href="history.php">TRANSACTION HISTORY</a></li>
            <li><a href="users.php">TRANSFER MONEY</a></li>
            <li><a href="register.php">NEW USER</a></li>
        </ul></nav>
        <div id="menu">
        <img src="./img/menu.png" id="menubtn"></div>
    </table>
    <footer style="background: #111;
    color: white;
    height: 2%;
    bottom: -34px;">
        <marquee behavior="scroll" direction="right"> TSF GRIP TASK 1 DONE BY <span class="far fa-copyright"></span> RAHUL KUMAR</marquee>
    </footer>
    
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    
    <script>
        let menubtn=document.querySelector('#menu');
        let sideNav=document.querySelector('#sideNav')

        let condition=true;

        menubtn.addEventListener('click',function(){
            if(condition){
                sideNav.style.right = "0px";
                condition = false;
            }else{
                sideNav.style.right = "-250px";
                condition = true;
            }
        })
        $(function(){
            setTimeout(function(){
                $('.messagehide').fadeOut('slow');
            },3000);
        });
    </script>
    
</html>