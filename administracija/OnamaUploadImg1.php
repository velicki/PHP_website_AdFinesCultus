<?php
if (isset($_POST['upload1']))
                    {
                        $file = $_FILES['image1']['tmp_name'];
                        if(!isset($file))
                        {
                            echo 'Prvo izaberite sliku br1';
                        }
                        else 
                        {

                            $image_name = addslashes($_FILES['image1']['name']);
                            $image_size = getimagesize($_FILES['image1']['tmp_name']);

                            if ($image_size==FALSE)
                            {
                                echo "Izabrani fajl nije slika!" ;
                            }
                            else 
                            {
                                
                                    $res = mysqli_query($con, "SELECT * FROM onama");
                                    while( $row = mysqli_fetch_array($res))
                                    {
                                       if ($image_name==$row[2])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                       if ($image_name==$row[3])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[4])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[5])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[6])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                    }
                                $location1 = '../Images/onama/';
                                    if (move_uploaded_file($file, $location1.$image_name))
                                    {
                                        
                                        $id      = $_POST['id1'];
                                         $file2 = mysqli_query($con, "SELECT * FROM onama WHERE id='$id'");
                                         while ($row2 = mysqli_fetch_array($file2))
                                         {
                                            $location2 = '../Images/onama/';
                                            $location3 = $row2[2];
                                            $filename1 = "$location2$location3";
                                            unlink($filename1);
                                         }  
                                        $sql     ="UPDATE onama SET slika1='$image_name' WHERE id='$id'";
                                        $res     =  mysqli_query($con, $sql) or die ("Nije uspešno updejtovana slika.".  mysql_error());
                                       
                                           
                                        mysqli_close($con);
                                        echo "<meta http-equiv='refresh' content='0;url=onama.php'>";
                                    }
                                    else
                                        {
                                            echo "Problem oko uploudovanja slike";
                                        }
                                    
    
                                
                            }
                        }
                    }
?>



<?php
if (isset($_POST['upload2']))
                    {
                        $file = $_FILES['image2']['tmp_name'];
                        if(!isset($file))
                        {
                            echo 'Prvo izaberite sliku br2';
                        }
                        else 
                        {

                            $image_name = addslashes($_FILES['image2']['name']);
                            $image_size = getimagesize($_FILES['image2']['tmp_name']);

                            if ($image_size==FALSE)
                            {
                                echo "Izabrani fajl nije slika!" ;
                            }
                            else 
                            {
                                
                                    $res = mysqli_query($con, "SELECT * FROM onama");
                                    while( $row = mysqli_fetch_array($res))
                                    {
                                       if ($image_name==$row[2])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                       if ($image_name==$row[3])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[4])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[5])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[6])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                    }
                                $location1 = '../Images/onama/';
                                    if (move_uploaded_file($file, $location1.$image_name))
                                    {
                                        
                                        $id      = $_POST['id2'];
                                         $file2 = mysqli_query($con, "SELECT * FROM onama WHERE id='$id'");
                                         while ($row2 = mysqli_fetch_array($file2))
                                         {
                                            $location2 = '../Images/onama/';
                                            $location3 = $row2[3];
                                            $filename1 = "$location2$location3";
                                            unlink($filename1);
                                         }  
                                        $sql     ="UPDATE onama SET slika2='$image_name' WHERE id='$id'";
                                        $res     =  mysqli_query($con, $sql) or die ("Nije uspešno updejtovana slika.".  mysql_error());
                                       
                                           
                                        mysqli_close($con);
                                        echo "<meta http-equiv='refresh' content='0;url=onama.php'>";
                                    }
                                    else
                                        {
                                            echo "Problem oko uploudovanja slike";
                                        }
                                    
    
                                
                            }
                        }
                    }
?>



<?php
if (isset($_POST['upload3']))
                    {
                        $file = $_FILES['image3']['tmp_name'];
                        if(!isset($file))
                        {
                            echo 'Prvo izaberite sliku br3';
                        }
                        else 
                        {

                            $image_name = addslashes($_FILES['image3']['name']);
                            $image_size = getimagesize($_FILES['image3']['tmp_name']);

                            if ($image_size==FALSE)
                            {
                                echo "Izabrani fajl nije slika!" ;
                            }
                            else 
                            {
                                
                                    $res = mysqli_query($con, "SELECT * FROM onama");
                                    while( $row = mysqli_fetch_array($res))
                                    {
                                       if ($image_name==$row[2])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                       if ($image_name==$row[3])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[4])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[5])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[6])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                    }
                                $location1 = '../Images/onama/';
                                    if (move_uploaded_file($file, $location1.$image_name))
                                    {
                                        
                                        $id      = $_POST['id3'];
                                         $file2 = mysqli_query($con, "SELECT * FROM onama WHERE id='$id'");
                                         while ($row2 = mysqli_fetch_array($file2))
                                         {
                                            $location2 = '../Images/onama/';
                                            $location3 = $row2[4];
                                            $filename1 = "$location2$location3";
                                            unlink($filename1);
                                         }  
                                        $sql     ="UPDATE onama SET slika3='$image_name' WHERE id='$id'";
                                        $res     =  mysqli_query($con, $sql) or die ("Nije uspešno updejtovana slika.".  mysql_error());
                                       
                                           
                                        mysqli_close($con);
                                        echo "<meta http-equiv='refresh' content='0;url=onama.php'>";
                                    }
                                    else
                                        {
                                            echo "Problem oko uploudovanja slike";
                                        }
                                    
    
                                
                            }
                        }
                    }
?>



<?php
if (isset($_POST['upload4']))
                    {
                        $file = $_FILES['image4']['tmp_name'];
                        if(!isset($file))
                        {
                            echo 'Prvo izaberite sliku br4';
                        }
                        else 
                        {

                            $image_name = addslashes($_FILES['image4']['name']);
                            $image_size = getimagesize($_FILES['image4']['tmp_name']);

                            if ($image_size==FALSE)
                            {
                                echo "Izabrani fajl nije slika!" ;
                            }
                            else 
                            {
                                
                                    $res = mysqli_query($con, "SELECT * FROM onama");
                                    while( $row = mysqli_fetch_array($res))
                                    {
                                       if ($image_name==$row[2])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                       if ($image_name==$row[3])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[4])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[5])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[6])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                    }
                                $location1 = '../Images/onama/';
                                    if (move_uploaded_file($file, $location1.$image_name))
                                    {
                                        
                                        $id      = $_POST['id4'];
                                         $file2 = mysqli_query($con, "SELECT * FROM onama WHERE id='$id'");
                                         while ($row2 = mysqli_fetch_array($file2))
                                         {
                                            $location2 = '../Images/onama/';
                                            $location3 = $row2[5];
                                            $filename1 = "$location2$location3";
                                            unlink($filename1);
                                         }  
                                        $sql     ="UPDATE onama SET slika4='$image_name' WHERE id='$id'";
                                        $res     =  mysqli_query($con, $sql) or die ("Nije uspešno updejtovana slika.".  mysql_error());
                                       
                                           
                                        mysqli_close($con);
                                        echo "<meta http-equiv='refresh' content='0;url=onama.php'>";
                                    }
                                    else
                                        {
                                            echo "Problem oko uploudovanja slike";
                                        }
                                    
    
                                
                            }
                        }
                    }
?>



<?php
if (isset($_POST['upload5']))
                    {
                        $file = $_FILES['image5']['tmp_name'];
                        if(!isset($file))
                        {
                            echo 'Prvo izaberite sliku br5';
                        }
                        else 
                        {

                            $image_name = addslashes($_FILES['image5']['name']);
                            $image_size = getimagesize($_FILES['image5']['tmp_name']);

                            if ($image_size==FALSE)
                            {
                                echo "Izabrani fajl nije slika!" ;
                            }
                            else 
                            {
                                
                                    $res = mysqli_query($con, "SELECT * FROM onama");
                                    while( $row = mysqli_fetch_array($res))
                                    {
                                       if ($image_name==$row[2])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                       if ($image_name==$row[3])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[4])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[5])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }if ($image_name==$row[6])
                                       {
                                            die("Slika sa takvim imenom već postoji");
                                       }
                                    }
                                $location1 = '../Images/onama/';
                                    if (move_uploaded_file($file, $location1.$image_name))
                                    {
                                        
                                        $id      = $_POST['id5'];
                                         $file2 = mysqli_query($con, "SELECT * FROM onama WHERE id='$id'");
                                         while ($row2 = mysqli_fetch_array($file2))
                                         {
                                            $location2 = '../Images/onama/';
                                            $location3 = $row2[6];
                                            $filename1 = "$location2$location3";
                                            unlink($filename1);
                                         }  
                                        $sql     ="UPDATE onama SET slika5='$image_name' WHERE id='$id'";
                                        $res     =  mysqli_query($con, $sql) or die ("Nije uspešno updejtovana slika.".  mysql_error());
                                       
                                           
                                        mysqli_close($con);
                                        echo "<meta http-equiv='refresh' content='0;url=onama.php'>";
                                    }
                                    else
                                        {
                                            echo "Problem oko uploudovanja slike";
                                        }
                                    
    
                                
                            }
                        }
                    }
?>


