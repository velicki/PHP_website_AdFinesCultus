<p>
<ul id="navigacionimeni">
    <?php
    session_start();
    $user=$_SESSION['username'];
    include '../conectdb.php';        
    $res1 = mysqli_query($con, "SELECT * FROM login WHERE username='$user'");
    
                                        while( $row1 = mysqli_fetch_array($res1))
                                        {
                                            if ( $row1[3]==1)
                                            {
                                                echo '<li class="dugme2"><a href="onama.php">O nama</a></li>';
                                            }
                                            if ( $row1[4]==1)
                                            {
                                                echo '<li class="dugme3"><a href="vesti.php">Vesti</a></li>';
                                            }
                                            if ( $row1[5]==1)
                                            {
                                                echo '<li class="dugme4"><a href="blog.php">Blog</a></li>';
                                            }
                                            if ( $row1[6]==1)
                                            {
                                                echo '<li class="dugme5"><a href="kontakt.php">Kontakt</a></li>';
                                            }
                                            if ( $row1[7]==1)
                                            {
                                                echo '<li class="dugme4"><a href="Admin.php">Admin</a></li>';
                                            }
                                            
                                        }
    ?>

    
    
    
    
    <li class="dugme2"><a href="password.php">Promena Šifre</a></li>
    <li class="dugme1"><a href="logout.php">Log Out</a></li>
</ul>

            

