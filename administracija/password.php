<?php
session_start();
include_once 'session.php';

?>
<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    &nbsp &nbsp &nbsp Promena Šifre
                </div>
                <div id="kontakt">
                    <div class="adonama">
                    <?php
                        include '../conectdb.php';
                        
                         if (!$_SESSION)
    {
        header ("location: index.php");
    }
                        
                        
                        $ime=$_SESSION["username"];
                    echo "Dobrodošao/la $ime! Ovde možeš da promeniš svoju šifru!";
                ?>
                <br><br>
                
                 <table style="width:500px">
                    <form action="password.php" method="POST" align="center" >
                      <tr>
                        <td>Stara Šifra:</td>
                        <td><input type="password" name="oldpassword"></h4><br><br></td>		
                      </tr>
                      <tr>
                        <td>Nova Šifra:</td>
                        <td><input type="password" name="newpassword"></h4><br><br></td>		
                      </tr>
                      <tr>
                        <td>Ponovi Novu Šifru:</td>
                        <td><input type="password" name="repassword"></h4><br><br></td>		
                      </tr>
                      <tr>
                          <td><button type="submit" name="submit" value="Promeni" class="dugmeprepravka">Promeni</button></td>                        		
                      </tr>
                      
                    </form>
                </table>
                <?php

                    if (isset($_POST['submit']))
                    {                
                        $old = $_POST['oldpassword'];
                        $new = $_POST['newpassword'];
                        $re = $_POST['repassword'];
                        if ($old&&$new&&$re)
                        {
                            $res = mysqli_query($con, "SELECT * FROM login WHERE username='$ime'");
                            $row = mysqli_fetch_array($res);
                            if ($row[2]==$old)
                            {
                               if ($new==$re)
                               {
                                    $sql     ="UPDATE login SET password='$new'  WHERE username='$ime'";
                                        echo 'Uspešno ste promenili šifru!';
                                    $res     =  mysqli_query($con, $sql) or die ("Culd not update.".  mysqli_error());

                               }
                               else echo 'Nova Šifra mora da bude ista u oba polja';
                            }
                            else echo 'Pogrešna stara Šifra';


                        }
                        else echo 'Sva polja moraju biti popunjena';
                    }
                        mysqli_close($con);
                ?>
                </div>
                                
                       
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