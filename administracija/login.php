<?php

    
    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username&&$password)
    {
        include '../conectdb.php';
        
        $query = mysqli_query($con, "SELECT * FROM login WHERE username='$username'");
        
        $numrows = mysqli_num_rows($query);
        
        if ($numrows !=0)
            
        {
            while ($row = mysqli_fetch_assoc($query))
            {
                $dbusername = $row['username'];
                $dbpassword = $row['password'];
            }
            
            if ($username==$dbusername&&$password==$dbpassword)
            {
                
                $_SESSION['username']=$dbusername;
                header ("location: password.php");
               
                
            }
            else
            {
                include 'index.php';
                echo '<p>';
                die ("Pogrešna šifra");
            }
        }
        else 
        {
            include 'index.php';
            echo '<p>';
            die ("Pogrešno korisničko ime");    
        }
    }
    else
    {
        include 'index.php';
        echo '<p>';
        die ("molimo vas unesite korisničko ime i šifru");  
    }