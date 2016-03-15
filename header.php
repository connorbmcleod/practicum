<?php
if(empty($_SESSION['user'])) : ?>

    <div class="header">
        <div class="logo"><a href="index.php"><img src="images/weLearn-logo.png" width="200px"></a></div>

<div id="big_head">

            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allcourses.php" id="menuLink1" class="pure-menu-link">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <span id="menuLink1" class="pure-menu-link">About us</span>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="aboutUs.php" class="pure-menu-link">Who We Are</a></li>
                            <li class="pure-menu-item"><a href="aboutEducators.php" class="pure-menu-link">Our educators</a></li>
                            <li class="pure-menu-item"><a href="aboutLearners.php" class="pure-menu-link">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="contactUs.php" class="pure-menu-link"> Contact us</a></li>
                </ul>

            </div> <!-- pure-menu end-->


        <div class="nav">
            <div id="show-login">Login</div>
                <div class="button" id="signup_head" name="signup"><a href="registerPage.php">Sign up</a></div>
        </div>
            <div class="login">
                <form action="index.php" method="post" class="form">
                    <input id="email" name="email" type="text" placeholder="Email" value=""/>
                    <input id="password" name="password" type="password" placeholder="Password" value="">
                    <button type="submit" value="Login" class="button" id="login" name="login">Login</button>
                </form>
            </div>
        <!-- Nav end-->
</div>


<div id="little_head">
    <div id="show_lhead">
        <span class="da_button">&#9776;</span>   
            <div id="lhead_content">
                <ul class="kdropmenu">
                     <li><a href="index.php"> Home</a></li>
                     <li><a href="allcourses.php" id="menuLink1">Courses</a></li>
                      <li>
                        <a href="#" class="mini_open">About us</a>
                        <ul class="mini_menu">
                            <li><a href="aboutUs.php">Who We Are</a></li>
                            <li><a href="aboutEducators.php">Our educators</a></li>
                            <li><a href="aboutLearners.php">Our learners</a></li>
                        </ul>
                    </li>
                    <li><a href="contactUs.php"> Contact us</a></li>
                </ul>

            </div>


            <div class="nav">
                <div id="show-login">Login</div>
                    <a href="registerPage.php"><div class="button" id="signup_head" name="signup">Sign up</div></a>
            
            <!-- Nav end-->     
            </div>

            <div class="login">
                <form action="index.php" method="post" class="form">
                    <input id="email" name="email" type="text" placeholder="Email" value=""/>
                    <input id="password" name="password" type="password" placeholder="Password" value="">
                    <button type="submit" value="Login" class="button" id="login" name="login">Login</button>
                </form>
            </div>

    </div>

</div>


</div> <!-- Header end -->

<?php else : ?>

<!-- LOGGED IN HEADER -->
    <div class="header-logged">
        <div class="logo"><a href="index.php"><img src="images/weLearn-logo.png" width="200px"></a></div>

        <div id="big_head">
            <div class="pure-menu pure-menu-horizontal" id="menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="index.php" class="pure-menu-link"> Home</a></li>
                    <li class="pure-menu-item">
                        <a href="allcourses.php" id="menuLink1" class="pure-menu-link">Courses</a>
                    </li>
                      <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                        <span id="menuLink1" class="pure-menu-link">About us</span>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item"><a href="aboutUs.php" class="pure-menu-link">Who We Are</a></li>
                            <li class="pure-menu-item"><a href="aboutEducators.php" class="pure-menu-link">Our educators</a></li>
                            <li class="pure-menu-item"><a href="aboutLearners.php" class="pure-menu-link">Our learners</a></li>
                        </ul>
                    </li>
                     <li class="pure-menu-item"><a href="contactUs.php" class="pure-menu-link"> Contact us</a></li>
                </ul>

         </div> <!-- pure-menu end-->

        <div class="nav">
                <div class="dropdown">
                  <button class="dropbtn"><img src="images/menu-arrow.png" width="30px"></button>
                      <div class="dropdown-content">

                      <?php if($_SESSION['user']['usertype'] == 1){?>
                        <a href="myprofile.php?id=<?php echo $_SESSION['user']['id']?>">My Profile</a>
                        <?php } 
                            else if($_SESSION['user']['usertype'] == 0){?>
                        <a href="userprofile.php">My Profile</a>
                        <?php } ?>
                        <a href="edit_account.php">Edit Account</a>
                        <a href="#"><form id="logout-form" action="logout.php">
                            <button type="submit" id="logout">Logout</button>
                        </form></a>
                      </div>
                </div>


                <div id="welcome">
                    <?php if($_SESSION['user']['usertype'] == 1){ ?>
                    <a href='http://localhost/practicum/myprofile.php?id=<?php echo $_SESSION['user']['id']; ?>'<p> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php }
                    else { ?>
                    <a href='http://localhost/practicum/userprofile.php'><p> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php } ?>
                </div>
            
        </div>
    </div>


<div id="little_head">
    <div id="show_lhead">
        <span class="da_button">&#9776;</span>   
            <div id="lhead_content">
                <ul class="kdropmenu">
                     <li><a href="index.php"> Home</a></li>
                     <li><a href="allcourses.php" id="menuLink1">Courses</a></li>
                      <li>
                        <a href="#" class="mini_open">About us</a>
                        <ul class="mini_menu">
                            <li><a href="aboutUs.php">Who We Are</a></li>
                            <li><a href="aboutEducators.php">Our educators</a></li>
                            <li><a href="aboutLearners.php">Our learners</a></li>
                        </ul>
                    </li>
                    <li><a href="contactUs.php"> Contact us</a></li>
                </ul>
            </div>


        <div class="nav">
                <div class="dropdown">
                  <button class="dropbtn"><img src="images/menu-arrow.png" width="30px"></button>
                  <div class="dropdown-content">

                  <?php if($_SESSION['user']['usertype'] == 1){?>
                    <a href="myprofile.php?id=<?php echo $_SESSION['user']['id']?>">My Profile</a>
                    <?php } 
                        else if($_SESSION['user']['usertype'] == 0){?>
                    <a href="userprofile.php">My Profile</a>
                    <?php } ?>
                    <a href="edit_account.php">Edit Account</a>
                    <a href="#"><form id="logout-form" action="logout.php">
                        <button type="submit" id="logout">Logout</button>
                    </form></a>
                  </div>
                </div>


                <div id="welcome">
                    <?php if($_SESSION['user']['usertype'] == 1){ ?>
                    <a href='myprofile.php?id=<?php echo $_SESSION['user']['id']; ?>'<p> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php }
                    else { ?>
                        <a href='userprofile.php'><p> <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?> </p></a>
                    <?php } ?>
                </div>
            
        </div>
    </div>
<!-- Nav end-->
</div>

</div>
</div> <!-- Header end -->

<?php endif; ?>