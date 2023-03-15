<?php

include_once 'session.php';

    $user=$_SESSION['username'];
    include '../conectdb.php';        
    $res1 = mysqli_query($con, "SELECT * FROM login WHERE username='$user'");
                                        while( $row1 = mysqli_fetch_array($res1))
                                        {
                                            if ( $row1[6]==0)
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
                    &nbsp &nbsp &nbsp Kontakt
                </div>
                <div id="kontakt">
                    <?php
                        include '../conectdb.php';
                        $id = 1;
                        $res = mysqli_query($con, "SELECT * FROM kontakt WHERE id='$id'");
                        $row = mysqli_fetch_array($res);
                    
                    if (isset($_POST['update']))
                    {
                        $prepravka = stripslashes($_POST['fullnews']);
                        $prepravka = str_replace('&quot;', '"', $prepravka);
                        $prepravka = mysqli_real_escape_string($con, $prepravka);
                        $novitext = $prepravka;                       
                        $id      = $_POST['id'];
                        $sql     ="UPDATE kontakt SET tekst='$novitext'  WHERE id='$id'";
                 
                        $res     =  mysqli_query($con, $sql) or die ("nije uspešno abdejtovana biografija!".  mysqli_error());
                        mysqli_close($con);
                        echo "<meta http-equiv='refresh' content='0;url=kontakt.php'>";
                    }
                    ?>
                    <div class="adonama">
                        <form action="kontakt.php" name="myform" id="myform" method="POST" enctype="multipart/form-data">
                            <div class="divimgonama">
                                <table>


                                    <td>
                                        <textarea class="ckeditor" name="fullnews" id="fullnews"><?php echo $row[1];?></textarea>
                                        <br><br>
                                    </td>		
                                  </tr>
                                </table>
                                <input type="hidden" name="id" value="<?php echo $row[0];?>">
                                <button type="submit" name="update" value="Update" class="dugmeprepravka">Sačuvaj promenu</button><br><br><br><br>

                            </div>
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