<?php

include_once 'session.php';

    $user=$_SESSION['username'];
    include '../conectdb.php';        
    $res1 = mysqli_query($con, "SELECT * FROM login WHERE username='$user'");
                                        while( $row1 = mysqli_fetch_array($res1))
                                        {
                                            if ( $row1[7]==0)
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
                    &nbsp &nbsp &nbsp Admin Strana
                </div>
                <div id="sblog">
                    <div class="adonama">
                            <form action="Admin.php" name="myform" id="myform" method="POST" enctype="multipart/form-data">
                   
                                <div class="divimgonama">
                                    <div>
                                        <div class="checkbox">
                                        Dodaj novog korisnika 
                                        </div><br><br>
                                        <div class="checkbox">
                                        Korisničko ime:&nbsp
                                        <input type="text" name="korisnicko">
                                        </div>
                                        <div class="checkbox">
                                        Šifra:&nbsp
                                        <input type="text" name="sifra">
                                        </div>
                                        <div class="checkbox">
                                        O nama &nbsp 
                                        <input type="checkbox" name="onama">
                                        </div>
                                        <div class="checkbox">
                                        Vesti &nbsp 
                                        <input type="checkbox" name="vesti">
                                        </div>
                                        <div class="checkbox">
                                        Blog &nbsp 
                                        <input type="checkbox" name="blog">
                                        </div>
                                        <div class="checkbox">
                                        Kontakt &nbsp 
                                        <input type="checkbox" name="kontakt"></div>
                                        <div class="checkbox">
                                        Admin &nbsp 
                                        <input type="checkbox" name="admin">
                                        </div> <br><br>
                                        <div class="dugme11">
                                        <input type="submit" name="upload" class="dugme11" value="Dodaj Korisnika" onClick="javascript:submit_form();">
                                        </div>
                            </form>           
                                    </div>
                                </div>
                                <div class="divimgonama">
                                    <div class="checkbox">
                                        Edit Korisnika
                                    </div><br><br>
                                    <?php
                                        include '../conectdb.php';
                                        $res1 = mysqli_query($con, "SELECT * FROM login");
                                                while( $row1 = mysqli_fetch_array($res1))
                                                {
                                                    echo""
                                                    
                                                        ."<div class='checkbox2'>"
                                                            ."<form action='Admin.php?edit=$row1[0]' method='GET'>"
                                                            ."<div class='checkbox'>"
                                                            .$row1[1]
                                                            ."</div>";
                                                    
                                                    
                                                            echo"<div class='dugme12'>"
                                                                ."<a href='Admin.php?delete=$row1[0]' class='dugme12'>Izbriši Ovog Korisnika</a>"
                                                            ."</div>";
                                                            
                                                            echo"<div class='dugme11'>";
                                                                echo'<input type="submit" name="submit" class="dugme11" value="Sačuvaj Promene"/>'
                                                            .'<input type="hidden" name="edit" value="'.$row1[0].'"/>'
                                                            ."</div>";
                                                    
                                                            echo"<div class='checkbox1'>";
                                                            $checked = '';
                                                            if($row1[7] == 1)
                                                            {
                                                                  $checked = 'checked="checked"';
                                                            }
                                                            echo "Admin ";
                                                            echo '<input type="checkbox" name="admin'.$row1[0] .'" '.$checked.' />';
                                                            echo "</div>";
                                                    
                                                            echo"<div class='checkbox1'>";
                                                            $checked = '';
                                                            if($row1[6] == 1)
                                                            {
                                                                  $checked = 'checked="checked"';
                                                            }
                                                            echo "Kontakt ";
                                                            echo '<input type="checkbox" name="kontakt'.$row1[0] .'" '.$checked.' />';
                                                            echo "</div>";
                                                    
                                                            echo"<div class='checkbox1'>";
                                                            $checked = '';
                                                            if($row1[5] == 1)
                                                            {
                                                                  $checked = 'checked="checked"';
                                                            }
                                                            echo "Blog ";
                                                            echo '<input type="checkbox" name="blog'.$row1[0] .'" '.$checked.' />';
                                                            echo "</div>";
                                                    
                                                            echo"<div class='checkbox1'>";
                                                            $checked = '';
                                                            if($row1[4] == 1)
                                                            {
                                                                  $checked = 'checked="checked"';
                                                            }
                                                            echo "Vesti ";
                                                            echo '<input type="checkbox" name="vesti'.$row1[0] .'" '.$checked.' />';
                                                            echo "</div>";
                                                            
                                                            echo"<div class='checkbox1'>";
                                                            $checked = '';
                                                            if($row1[3] == 1)
                                                            {
                                                                  $checked = 'checked="checked"';
                                                            }
                                                            echo "O nama ";
                                                            echo '<input type="checkbox" name="onama'.$row1[0] .'" '.$checked.' />';
                                                            echo "</div>"
                                                            .'</form>';
                                                            
                                                            
                                                            
                                                            

                                                        echo "</div><br><br><br>";
                                                        if (isset($_GET['delete']))
                                                            {

                                                                $id = $_GET['delete'];
                                                                $file = mysqli_query($con, "SELECT * FROM login WHERE id='$id'");
                                                                while ($row3 = mysqli_fetch_array($file))
                                                                {                      
                                                                    $deletequery = "DELETE FROM login WHERE id='$id'";
                                                                    mysqli_query($con, $deletequery);
                                                                    echo "<meta http-equiv='refresh' content='0;url=Admin.php'>";

                                                                }    
                                                            }
                                                            
                                                            if (isset($_GET['edit']))
                                                            {

                                                                $id1 = $_GET['edit'];
                                                                
                                                                if (isset($_GET['onama'.$id1])){ $onama1 = 1;}
                                                                else {$onama1 = 0;}
                                                                if (isset($_GET['vesti'.$id1])){ $vesti1 = 1;}
                                                                else {$vesti1 = 0;}
                                                                if (isset($_GET['blog'.$id1])){ $blog1 = 1;}
                                                                else {$blog1 = 0;}
                                                                if (isset($_GET['kontakt'.$id1])){ $kontakt1 = 1;}
                                                                else {$kontakt1 = 0;}
                                                                if (isset($_GET['admin'.$id1])){ $admin1 = 1;}
                                                                else {$admin1 = 0;}
                                                                 $sql     ="UPDATE login SET onama='$onama1' , vesti='$vesti1' , blog='$blog1' , kontakt='$kontakt1' , admin='$admin1'  WHERE id='$id1'";
                 
                                                                $res     =  mysqli_query($con, $sql) or die ("Culd not update.".  mysqli_error());
                                                                mysqli_close($con);
                                                                
                                                                echo "<meta http-equiv='refresh' content='0;url=Admin.php'>";
                                                            }
                                                  
                                                }
                                    ?>
                                    
                                </div> 
                                

                            
                            <?php
                                include '../conectdb.php';
                                if (isset($_POST['upload']))
                                {  
                                    $korisnickoo = $_POST['korisnicko'];
                                    $korisnickoime = 0;
                                    $sifraa = $_POST['sifra'];
                                    $sifra = 0;
                                    $res = mysqli_query($con, "SELECT * FROM login");
                                                while( $row = mysqli_fetch_array($res))
                                                {
                                                   if ($korisnickoo==$row[1])
                                                   {
                                                        $korisnickoime = 1;
                                                        die("To korisničko ime je zauzeto!");
                                                   }
                                                   if ($korisnickoo==NULL)
                                                   {
                                                        $korisnickoime = 1;
                                                        die("polje za korisničko ime mora biti popunjeno!");
                                                   }
                                                   if ($sifraa==NULL)
                                                   {
                                                        $sifra = 1;
                                                        die("polje za šifru mora biti popunjeno!");
                                                   }
                                                }
                                                if ($korisnickoime != 1) 
                                                    {
                                                if ($sifra != 1)
                                                    {   
                                                        if (isset($_POST['onama'])){ $onama = 1;}
                                                        else {$onama = 0;}
                                                        if (isset($_POST['vesti'])){ $vesti = 1;}
                                                        else {$vesti = 0;}
                                                        if (isset($_POST['blog'])){ $blog = 1;}
                                                        else {$blog = 0;}
                                                        if (isset($_POST['kontakt'])){ $kontakt = 1;}
                                                        else {$kontakt = 0;}
                                                        if (isset($_POST['admin'])){ $admin = 1;}
                                                        else {$admin = 0;}
                                                        $insert = mysqli_query ($con, "INSERT INTO login  (username, password, onama, vesti, blog, kontakt, admin )
                                                                          VALUES ('$_POST[korisnicko]','$_POST[sifra]','$onama','$vesti','$blog','$kontakt','$admin')");
                                                    }
                                                    }
                                            echo "<meta http-equiv='refresh' content='0;url=Admin.php'>";
                                            
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

