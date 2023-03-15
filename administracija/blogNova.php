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
                    &nbsp &nbsp &nbsp Dodavanje Novog Bloga
                </div>
                <div id="sblog">
                    <div class="adonama">
                            <form action="blogNova.php" name="myform" id="myform" method="POST" enctype="multipart/form-data">
                    
                                <div class="divimgonama">
                                    Izaberi sliku:
                                    <input type="file" name="image"><br> 
                                    Preporučena rezolucija slike je 320px/168px
                                </div>
                                <div class="divimgonama">
                                    Naslov Bloga:<br>
                                    <input type="text" name="namenews">	
                                </div>
                                <div class="divimgonama">
                                    Kratak Opis Bloga:<br>
                                    <textarea cols="50" rows="3" name="shortnews"></textarea>		
                                </div> 
                                <div class="divimgonama">
                                    Blog:<br>
                                    <textarea style="display:none;" class="ckeditor" cols="50" rows="10" name="fullnews" id="fullnews"></textarea> 
                                </div>
                                <div class="divimgonama">
                                    Autor:<br>
                                    <input type="text" name="autor">	
                                </div>
                                <div class="divimgonama">
                                <input type="submit" name="upload" value="Dodaj Blog" onClick="javascript:submit_form();">
                                </div>

                            </form>
                            <?php
                                include '../conectdb.php';
                                if (isset($_POST['upload']))
                                {
                                    $file1 = $_FILES['image']['tmp_name'];
                                    if(!isset($file1))
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
                                                        die("Slika sa takvim imenom već postoji!");
                                                   }
                                                }
                                            $location1 = '../Images/blog/';
                                                if (move_uploaded_file($file1, $location1.$image_name))
                                                {    

                                                    $prepravka = stripslashes($_POST['fullnews']);
                                                    $prepravka = str_replace('&quot;', '"', $prepravka);
                                                    $prepravka = mysqli_real_escape_string($con, $prepravka);
                                                    $newsfull = $prepravka;
                                                    if($insert = mysqli_query ($con, "INSERT INTO blog  (naslov, tekst, kratakt, imeslike, autor )
                                                                                          VALUES ('$_POST[namenews]','$newsfull','$_POST[shortnews]','$image_name','$_POST[autor]')"))
                                                    {

                                                        $lastid = mysqli_insert_id();
                                                        echo "<img src=../Images/blog/$image_name >";

                                                    }
                                                    else
                                                    {
                                                        echo "Problem pri aploudovanju slike";
                                                    }
                                                }
                                                else
                                                    {
                                                        echo "Problem pri aploudovanju fajla slike";
                                                    }
                                        }
                                    }
                                }
                            ?>
                            
                            
                            
                            
                            
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

