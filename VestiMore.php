<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
{
    include 'Vesti_meta_tagas_FB.php';
}
?>
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
               <a href="vesti.php"> <div class="novosti">
                    <div class="naslovpozadi"></div>
                    &nbsp &nbsp &nbsp Vesti
                   </div></a>
                <div id="svesti">
                    <?php
                    if (isset($_GET['more']))
                    {
                        $id = $_GET['more'];
                        include 'conectdb.php';
                        $res = mysqli_query($con, "SELECT * FROM vesti WHERE id='$id'");
                        $row = mysqli_fetch_array($res);                              
                        
                                echo""                      
                                    ."<div class='novostis'>"
                                        ."<img  src='Images/vesti/$row[imeslike]?id=$row[id]' class='novostiss' />"
                                    ."</div>"
                                        ."<div class='datumv'>$row[datum]</div>"
                                        ."<div class='naslovv'>$row[naslov]</div><br><div class='naslovv'>$row[kratakt]</div>"
                                        ."<div class='vest'>"
                                        ."<div class='tekstv'>$row[tekst]</div>"
                                        . "<div class='autorv'>Autor:<br>$row[autor]</div>"
                                        ."</div>"
                                    ."";   
                    }
                    ?>
                        
                    <div class="novosti"></div>
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