<?php
        if (isset($_GET['more']))
        {
            $id = $_GET['more'];
            include 'conectdb.php';
            $res = mysqli_query($con, "SELECT * FROM blog WHERE id='$id'");
            $row = mysqli_fetch_array($res);                              
                        
                    echo""
                        ."<meta property=\"og:url\"                content=\"https://adfinescultus.rs/blogMore.php?more=$row[id]\" />\n"
                        ."<meta property=\"og:type\"               content=\"blog\" />\n"
                        ."<meta property=\"og:title\"              content=\"$row[naslov]\" />\n"
                        ."<meta property=\"og:description\"        content=\"$row[kratakt]\" />\n"
                        ."<meta property=\"og:image\"              content=\"https://adfinescultus.rs/Images/blog/$row[imeslike]\" />\n"
                        ."";   
        }
?>            
                    




