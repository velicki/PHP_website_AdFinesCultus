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
    <body onLoad="iFrameOn();">
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
                    &nbsp &nbsp &nbsp Ispravka Bloga
                </div>
                <div id="sblog">
                    <div class="adonama">
                         <?php
                    include '../conectdb.php';
                    if (isset($_GET['more']))
                    {
                        $id = $_GET['more'];
                        $res = mysqli_query($con, "SELECT * FROM blog WHERE id='$id'");
                        $row = mysqli_fetch_array($res);
                    }
                    if (isset($_POST['update']))
                    {
                        $prepravka = stripslashes($_POST['fullnews']);
                        $prepravka = str_replace('&quot;', '"', $prepravka);
                        $prepravka = mysqli_real_escape_string($con, $prepravka);
                        $novinaslov = $_POST['namenews'];
                        $noviautor = $_POST['autor'];
                        $novinaslovni_tekst = $_POST['shortnews'];
                        $novitext = $prepravka;                       
                        $id      = $_POST['id'];
                        $sql     ="UPDATE blog SET naslov='$novinaslov' , autor='$noviautor' , kratakt='$novinaslovni_tekst' , tekst='$novitext'  WHERE id='$id'";
                 
                        $res     =  mysqli_query($con, $sql) or die ("Culd not update.".  mysqli_error());
                        mysqli_close($con);
                        echo "<meta http-equiv='refresh' content='0;url=blogDorada.php?more=$id'>";
                    }
                    if (isset($_POST['upload']))
                    {
                        $file = $_FILES['image']['tmp_name'];
                        if(!isset($file))
                        {
                            echo 'Prvo izaberite sliku';
                        }
                        else 
                        {

                            $image_name = addslashes($_FILES['image']['name']);
                            $image_size = getimagesize($_FILES['image']['tmp_name']);

                            if ($image_size==FALSE)
                            {
                                echo "Izabrani fajl nije slika!" ;
                            }
                            else 
                            {
                                
                                    $res = mysqli_query($con, "SELECT * FROM blog");
                                    while( $row = mysqli_fetch_array($res))
                                    {
                                       if ($image_name==$row[4])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                       
                                    }
                                $location1 = '../Images/blog/';
                                    if (move_uploaded_file($file, $location1.$image_name))
                                    {
                                        
                                        $id      = $_POST['id'];
                                         $file2 = mysqli_query($con, "SELECT * FROM blog WHERE id='$id'");
                                         while ($row2 = mysqli_fetch_array($file2))
                                         {
                                            $location2 = '../Images/blog/';
                                            $location3 = $row2[4];
                                            $filename1 = "$location2$location3";
                                            unlink($filename1);
                                         }  
                                        $sql     ="UPDATE blog SET imeslike='$image_name' WHERE id='$id'";
                                        $res     =  mysqli_query($con, $sql) or die ("Nije uspešno updejtovana slika.".  mysqli_error());
                                                                          
                                        mysqli_close($con);
                                        echo "<meta http-equiv='refresh' content='0;url=blog.php'>";
                                    }
                                    else
                                        {
                                            echo "Problem oko uploudovanja slike";
                                        }
                                    
    
                                
                            }
                        }
                    }
                    
                    
                    
                    
                    
                    ?>
                        
                        
                        
                        
                        
                        
                            <form action="blogDorada.php" name="myform" id="myform" method="POST" enctype="multipart/form-data">
                    
                            
                                <div class="divimgonama">
                                    <div><img  src="../Images/blog/<?php echo $row[4];?>"  class="novostislikaadmin"  /></div>
                                    <div class="vestDoradaSlika">
                                        Izaberi novu sliku:
                                        <input type="file" name="image"><br> 
                                        Preporučena rezolucija slike je 320px/168px
                                        <input type="hidden" name="id" value="<?php echo $row[0];?>"><br><br>
                                        <input type="submit" name="upload" value="Zameni postojeću sliku">
                                    </div>
                                </div>
                            
                                <div class="divimgonama">
                                    Naslov Bloga:<br>
                                    <input type="text" name="namenews" value="<?php echo $row[1];?>">	
                                </div>
                                <div class="divimgonama">
                                    Kratak Opis Bloga:<br>
                                    <textarea cols="50" rows="3" name="shortnews"><?php echo $row[2];?></textarea>		
                                </div> 
                                <div class="divimgonama">
                                    Blog:<br>
                                    <textarea style="display:none;" class="ckeditor" cols="50" rows="10" name="fullnews" id="fullnews"><?php echo $row[3];?></textarea> 
                                </div>
                                <div class="divimgonama">
                                    Autor:<br>
                                    <input type="text" name="autor" value="<?php echo $row[5];?>">	
                                </div>
                                <div class="divimgonama">
                                <input type="submit" name="update" value="Dodaj Promene u Blogu" onClick="javascript:submit_form();">
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