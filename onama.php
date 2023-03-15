<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
            {
                include 'googleanalytics.php';
            }
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
        <title>Ad Fines Cultus</title>
        <link rel="icon" href="Images/favicon.png">
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css?<?php echo time(); ?>" />
    </head>
    <body>
        <div id="sajt">
            <div id="baner">
                <div id="logo">
                    <?php
                    {
                        include 'banner.php';
                    }
                    ?>
                </div>
                    <div id="sidebar">
                        <?php
                        {
                            include 'sidebar.php';
                        }
                        ?>
                    </div>
            </div>
            
            <div id="vesti">
                <div class="novosti">
                    <div class="naslovpozadi"></div>
                    &nbsp &nbsp &nbsp O nama
                </div>
                <div id="onama">
                    <?php
                        include 'conectdb.php';
                        $brojacnov=1;
                        $set = mysqli_query($con, "SELECT * FROM onama");                              
                        while( $row = mysqli_fetch_array($set))
                        {
                        echo""                      
                                ."<div class='onama'>$row[text]</div>";
                        }
                        ?>
                </div>
            </div>
             <div class="novosti">
                
            </div>
            <?php
            {
                include 'sivifuter.php';
            }
            ?>
           
            <footer>
                
                <?php
                {
                    include 'footer.php';
                }
                ?>
            </footer>
            <?php
                mysqli_close($con);
            ?>
            
                        
        </div>
    </body>
    <script>
 var myIndex = 0;
    carousel();

    function carousel() 
        {
            var i;
            var x = document.getElementsByClassName("slikeslajd");
            for (i = 0; i < x.length; i++) 
                {
                   x[i].style.display = "none";  
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1;}    
                x[myIndex-1].style.display = "block";    
                setTimeout(carousel, 2000); // Change image every 2 seconds
        }
        
</script>
</html>