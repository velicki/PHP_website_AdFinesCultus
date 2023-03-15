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
                    &nbsp &nbsp &nbsp Blog
                </div>
                <div id="sblog">
                    <?php
                        include 'conectdb.php';
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
                        $blog = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC limit $page1,6");                              
                        while( $row = mysqli_fetch_array($blog))
                        {
                            echo""
                            ."<div class='razmaks'></div>"
                            ."<a href='blog.php?more=$row[id]'><div class='blog'>"                       
                                    ."<div class='blogs'>"
                                        ."<a href='blogMore.php?more=$row[id]'><img  src='Images/blog/$row[imeslike]?id=$row[id]'/></a> "                            
                                    ."</div>"
                                        ."<a href='blogMore.php?more=$row[id]'><div class='blognaslov'><p>$row[naslov]</p></div></a>"
                                        ."<a href='blogMore.php?more=$row[id]'><div class='blogKtekst'><p>$row[kratakt]</p></div></a>"
                            ."</div></a>";  
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
                    <div class="novosti">
                
            </div>
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
    
</html>