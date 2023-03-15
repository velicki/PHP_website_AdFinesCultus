<?php

include_once 'session.php';

    $user=$_SESSION['username'];
    include '../conectdb.php';        
    $res1 = mysqli_query($con, "SELECT * FROM login WHERE username='$user'");
                                        while( $row1 = mysqli_fetch_array($res1))
                                        {
                                            if ( $row1[5]==0)
                                            {
                                                header ("location: password.php");
                                            }
                                        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
        <title>Ad Fines Cultus</title>
        <link rel="icon" href="../Images/favicon.png">
        <link rel="stylesheet" type="text/css" href="../Styles/Stylesheet.css?<?php echo time(); ?>" />
        <script src="../js/ckeditor/ckeditor.js"></script>
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
                    &nbsp &nbsp &nbsp Blog
                </div>
                <div id="sblog">
                    <div class="adonama">
                        <form action="kontakt.php" name="myform" id="myform" method="POST" enctype="multipart/form-data">
                            <div class="divimgonama">
                                <div class="dugme">
                                    <a href="blogNova.php">Dodaj Novi Blog</a>
                                </div>
                            </div>
                            
                            
                            
                            
                            <?php
                        include '../conectdb.php';
                        $res1 = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC");
                        $cou1=  mysqli_num_rows($res1);
                        $a=$cou1/6;
                        $a=ceil($a);
                        
                        if (isset ($_GET["page"]))
                        {
                            $page=$_GET["page"];
                            
                            if ($page>$a)
                            {
                                $page=$a;
                            }
                            
                            $page1=($page*6)-6;
                        }
                         else 
                             {
                                $page1=0;
                                $page=1;
                             }
                        $set = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC limit $page1,6");                              
                        while( $row = mysqli_fetch_array($set))
                        {
                                echo""                      
                                    ."<div class='divimgonama'>"
                                        .""
                                        ."<div><img  src='../Images/blog/$row[imeslike]?id=$row[id]'  class='novostislikaadmin'  />"
                                        ."</div><div class='novostidatumadmin'>$row[datum]</div><br>"
                                        ."<div class='novostitekstadmin'>"
                                        ."<p>$row[naslov]<br><br><br>$row[kratakt]</p>"
                                        ."</div>"
                                        
                                        
                                        . "<br><div class='dugme'>"
                                            ."<a href='blogDorada.php?more=$row[id]'>Izmeni Ovaj Blog</a>"
                                        ."</div><br><br>"
                                        . "<div class='dugme'>"
                                            ."<a href='blog.php?delete=$row[id]'>Izbriši Ovaj Blog</a>"
                                        ."</div>"
                                        
                                    ."</div>";
                                if (isset($_GET['delete']))
                                {

                                    $id = $_GET['delete'];
                                    $file = mysqli_query($con, "SELECT * FROM blog WHERE id='$id'");
                                    while ($row1 = mysqli_fetch_array($file))
                                    { 


                                        $location = '../Images/blog/';
                                        $location1 = $row1[4];
                                        $filename = "$location$location1";
                                        unlink($filename);

                                        $deletequery = "DELETE FROM blog WHERE id='$id'";
                                        mysqli_query($con, $deletequery);
                                        echo "<meta http-equiv='refresh' content='0;url=blog.php'>";

                                    }    
                                }
                        }
                        ?>
                        <?php
                        if ($a != 0 and $a != 1)
                        {

                        ?>
                            <div class="brojstrana">
                                <?php
                            $b=$page;
                            echo "<p>Strana $b od $a</p>";
                            ?><div> <?php
                            $previous=$b-1;
                            if ($previous>=1)
                            {
                                ?><a  href="blog.php?page=<?php echo $previous; ?> " > <?php echo "Prethodna"; ?></a> <?php
                            }
                            $cetri=4;
                            if ($cetri<=$b)
                            {
                                ?><a  href="blog.php?page=1 " > <?php echo "1"."  "; ?></a> <?php
                                echo "..."."  "; ?><?php
                            }
                            $minusdva=$b-2;
                            if ($minusdva>=1)
                            {
                                ?><a  href="blog.php?page=<?php echo $minusdva; ?> " > <?php echo $minusdva; ?> </a> <?php
                            }
                            $minusjedan=$b-1;
                            if ($minusjedan>=1)
                            {
                                ?><a  href="blog.php?page=<?php echo $minusjedan; ?> " > <?php echo $minusjedan; ?></a> <?php
                            }
                            ?><a  href="blog.php?page=<?php echo $b; ?> " class="trenutnastrana" ><?php echo $b; ?></a> <?php
                            $plusjedan=$b+1;
                            if ($plusjedan<=$a)
                            {
                                ?><a  href="blog.php?page=<?php echo $plusjedan; ?> " > <?php echo $plusjedan; ?></a> <?php
                            }
                            $plusdva=$b+2;
                            if ($plusdva<=$a)
                            {
                                ?><a  href="blog.php?page=<?php echo $plusdva; ?> " > <?php echo $plusdva; ?> </a> <?php
                            }
                            $zadnja=$a-3;
                            if ($b<=$zadnja)
                            {
                                echo "..."."  "; ?><?php
                                ?><a  href="blog.php?page=<?php echo $a; ?> " > <?php echo $a; ?></a> <?php
                            }
                            $next=$b+1;
                            if ($next<=$a)
                            {
                                ?><a  href="blog.php?page=<?php echo $next; ?> " > <?php echo "Sledeća"; ?></a> <?php
                            }

                            ?> </div>
                            </div> <?php
                        }
                        ?>
                            
                            
                            
                            
                
                        </form>
                    </div>
                    
                    <div class="novosti">
                
                    </div>
                </div>
            </div>
             <div class="novosti">
                
            </div>
            <?php
            {
                include '../sivifuter.php';
            }
            ?>
           
            <footer>
                
                <?php
                {
                    include '../footer.php';
                }
                ?>
            </footer>
            <?php
                mysqli_close($con);
            ?>           
        </div>
    </body>
    
</html>