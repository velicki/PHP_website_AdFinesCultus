<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<HTML>
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
            <a href="onama.php"><div id="slajd">
                <?php
                    include 'conectdb.php';
                    $res = mysqli_query($con, "SELECT * FROM onama");                              
                    while( $row = mysqli_fetch_array($res))
                    {

                       echo ""
                ."<div><img  src='Images/onama/$row[slika1]' class='slikeslajd'/></div>"
                ."<div><img  src='Images/onama/$row[slika2]' class='slikeslajd'/></div>"
                ."<div><img  src='Images/onama/$row[slika3]' class='slikeslajd'/></div>"
                ."<div><img  src='Images/onama/$row[slika4]' class='slikeslajd'/></div>"
                ."<div><img  src='Images/onama/$row[slika5]' class='slikeslajd'/></div>";
                    }
                ?>
                
            </div></a>
            <div id="vesti">
                <div class="novosti">
                    <a href="vesti.php"><div class="naslovpozadi"></div></a>
                    <a href="vesti.php"> &nbsp &nbsp &nbsp Vesti</a>
                </div>
                <div id="novosti">
                    <?php
                        $brojacnov=1;
                        $set = mysqli_query($con, "SELECT * FROM vesti ORDER BY id DESC");                              
                        while( $row = mysqli_fetch_array($set))
                        {

                            if ($brojacnov<3)
                                {
                                echo""                      
                                    ."<div class='novostis'>"
                                        
                                        ."<a href='VestiMore.php?more=$row[id]'><div><img  src='Images/vesti/$row[imeslike]?id=$row[id]' class='novostiss' /></div><div class='datumvs'>$row[datum]</div></a>"
                                        ."<a href='VestiMore.php?more=$row[id]'><div class='novostisKtekst'>"
                                        ."<p>$row[naslov]<br><br><br>$row[kratakt]</p>"
                                        ."</div></a>"
                                    ."</div>";
                                    
                                }
                            ++$brojacnov;
                        }
                        ?>
                </div>
            </div>
            <div class="novosti">
                <a href="blog.php"><div class="naslovpozadi"></div></a>
                <a href="blog.php"> &nbsp &nbsp &nbsp Blog</a>
            </div>
            <div id="blog">
                
                <?php
                    $brojacnov=1;
                    $blog = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC");                              
                    while( $row = mysqli_fetch_array($blog))
                    {
                        
                        if ($brojacnov<4)
                            {
                            echo""
                            ."<a href='blog.php?more=$row[id]'><div class='blog'>"                       
                                    ."<div class='blogs'>"
                                        ."<a href='blogMore.php?more=$row[id]'><img  src='Images/blog/$row[imeslike]?id=$row[id]'/></a> "                            
                                    ."</div>"
                                        ."<a href='blogMore.php?more=$row[id]'><div class='blognaslov'><p>$row[naslov]</p></div></a>"
                                        ."<a href='blogMore.php?more=$row[id]'><div class='blogKtekst'><p>$row[kratakt]</p></div></a>"
                            ."</div></a>";
                            }
                        ++$brojacnov;
                    }
                ?>                                         
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
</HTML>