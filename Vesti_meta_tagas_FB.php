<?php
        if (isset($_GET['more']))
        {
            $id = $_GET['more'];
            include 'conectdb.php';
            $res = mysqli_query($con, "SELECT * FROM vesti WHERE id='$id'");
            $row = mysqli_fetch_array($res);                              
                        
                    echo""
                        ."<meta property=\"og:url\"                content=\"https://adfinescultus.rs/VestiMore.php?more=$row[id]\" />\n"
                        ."<meta property=\"og:type\"               content=\"news\" />\n"
                        ."<meta property=\"og:title\"              content=\"$row[naslov]\" />\n"
                        ."<meta property=\"og:description\"        content=\"$row[kratakt]\" />\n"
                        ."<meta property=\"og:image\"              content=\"https://adfinescultus.rs/Images/vesti/$row[imeslike]\" />\n"
                        ."";   
        }
?>            
                    




