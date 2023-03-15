<?php

include_once 'session.php';

    $user=$_SESSION['username'];
    include '../conectdb.php';        
    $res1 = mysqli_query($con, "SELECT * FROM login WHERE username='$user'");
                                        while( $row1 = mysqli_fetch_array($res1))
                                        {
                                            if ( $row1[3]==0)
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
                    &nbsp &nbsp &nbsp O Nama
                </div>
                <div id="onama">
                    <?php
                        include '../conectdb.php';
                        $id = 1;
                        $res = mysqli_query($con, "SELECT * FROM onama WHERE id='$id'");
                        $row = mysqli_fetch_array($res);
                    
                    if (isset($_POST['update']))
                    {
                        $prepravka = stripslashes($_POST['fullnews']);
                        $prepravka = str_replace('&quot;', '"', $prepravka);
                        $prepravka = mysqli_real_escape_string($con, $prepravka);
                        $novitext = $prepravka;                       
                        $id      = $_POST['id'];
                        $sql     ="UPDATE onama SET text='$novitext'  WHERE id='$id'";
                 
                        $res     =  mysqli_query($con, $sql) or die ("nije uspešno abdejtovana biografija!".  mysql_error());
                        mysqli_close($con);
                        echo "<meta http-equiv='refresh' content='0;url=onama.php'>";
                    }
                    ?>
                    <?php
                        {
                            include 'OnamaUploadImg1.php';
                        }
                        ?>
                    <div class="adonama">
                        <form action="onama.php" name="myform" id="myform" method="POST" enctype="multipart/form-data">
                            
                            <div class="divimgonama">
                               <img src='<?php echo"../Images/onama/$row[2]" ?>' class='imgonama'><br>

                                Zameni Prvu Sliku:
                                <input type="file" name="image1"><br> 
                                Preporučena rezolucija za sliku je 600px/315px <br>
                                <input type="hidden" name="id1" value="<?php echo $row[0];?>">
                                <input type="submit" name="upload1" value="Ubaci novu Sliku">
                            </div>
                            
                            <div class="divimgonama">
                               <img src='<?php echo"../Images/onama/$row[3]" ?>' class='imgonama'><br>

                                Zameni Prvu Sliku:
                                <input type="file" name="image2"><br> 
                                Preporučena rezolucija za sliku je 600px/315px <br>
                                <input type="hidden" name="id2" value="<?php echo $row[0];?>">
                                <input type="submit" name="upload2" value="Ubaci novu Sliku">
                            </div>
                            
                            <div class="divimgonama">
                               <img src='<?php echo"../Images/onama/$row[4]" ?>' class='imgonama'><br>

                                Zameni Prvu Sliku:
                                <input type="file" name="image3"><br> 
                                Preporučena rezolucija za sliku je 600px/315px <br>
                                <input type="hidden" name="id3" value="<?php echo $row[0];?>">
                                <input type="submit" name="upload3" value="Ubaci novu Sliku">
                            </div>
                            
                            <div class="divimgonama">
                               <img src='<?php echo"../Images/onama/$row[5]" ?>' class='imgonama'><br>

                                Zameni Prvu Sliku:
                                <input type="file" name="image4"><br> 
                                Preporučena rezolucija za sliku je 600px/315px <br>
                                <input type="hidden" name="id4" value="<?php echo $row[0];?>">
                                <input type="submit" name="upload4" value="Ubaci novu Sliku">
                            </div>
                            
                            <div class="divimgonama">
                               <img src='<?php echo"../Images/onama/$row[6]" ?>' class='imgonama'><br>

                                Zameni Prvu Sliku:
                                <input type="file" name="image5"><br> 
                                Preporučena rezolucija za sliku je 600px/315px <br>
                                <input type="hidden" name="id5" value="<?php echo $row[0];?>">
                                <input type="submit" name="upload5" value="Ubaci novu Sliku">
                            </div>
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