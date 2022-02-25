<?php include "includes/header.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<!-- Setting Language Variables -->
<?php
    if(isset($_GET['lang']) && !empty($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];

        if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {
            echo "<script type='text/javascript>location.reload();</script>";
        }
    } 
    
    if(!isset($_SESSION['lang'])) {
        $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

        if (preg_match('/ja/i', $languages[0])) { 
            $result = 'ja'; 
        } elseif (preg_match('/de/i', $languages[0])) { 
            $result = 'de'; 
        } else {
            $result = 'en';
        }
        
        echo $result;
        $_SESSION['lang'] = $result;
    }

    if(isset($_SESSION['lang'])) {
        include "includes/languages/".$_SESSION['lang'].".php";
    } else {
        include "includes/languages/en.php";
    }

?>

<body>
    <!-- THANKS MODAL -->
    <?php 
        if(isset($_GET['thanks'])) {
            include "includes/thanks_modal.php";
        }
    ?> 
    <div id="container">
        <header id="page-top">
            <?php include "includes/nav.php"; ?>
        </header>
        
        <!-- cover -->
        <div class="top">
            <!-- PC slideshow -->
            <?php include "includes/pc_slideshow.php"; ?>
        </div>
        
        <!-- page top icon -->
        <div id="pageTopIcon" class="hand-icon icon-hide">
            <a href="#page-top">
                <i class="far fa-hand-point-up"></i>
                <p>top</p>
            </a>
        </div>    
        
        <!-- section  -->
        <section id="about">
            <div>
                <h1 class="section-title"><?= ABOUT; ?></h1>
                <div class="reika">
                    <img src="img/self-portrait-7-sq.jpg" alt="<?= PORTRAIT_ALT; ?>">
                    <p class="section-lead"><?= ABOUT_REIKA; ?></p>
                </div>
                
            </div>   
        </section>
        
        <section id="works">
            <div>
                <h1 class="section-title"><?= PROJECTS; ?></h1>
                <p class="section-lead"><?= WORK_LEAD; ?></p>
            </div> 
            <div class="site-container">
                <div class="site-details">
                    <h3 class="site-description"><?= BAR_TITLE; ?></h3>
                    <p class="additional-comment"><?= BAR_COMMENT; ?></p>
                    <div class="site-link">
                        <img class="screenshot" src="img/sample-bar-screen.jpg" alt="<?= BAR_SCREENSHOT_ALT; ?>">
                        <div class="used-skills">
                            <p><?= BAR_USEDSKILL; ?></p>
                            <div class="btn-container">
                                <a type="button" href="https://sample-bar.reikaakuzawa.com/" target="_blank" rel="noopener"><?= CHECK_THE_SITE_BTN; ?></a>
                                <a type="button" href="https://github.com/Reikasan/sample_bar" target="_blank" rel="noopener"><?= CHECK_THE_CODE_BTN; ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="site-details">
                    <h3 class="site-description"><?= RM_TITLE; ?></h3>
                    <p class="additional-comment"><?= RM_COMMENT; ?></p>
                    <div class="site-link">
                        <img class="screenshot" src="img/reservation_manager_screenshot.jpg" alt="<?= RM_SCREENSHOT_ALT; ?>">
                        <div class="used-skills">
                            <p><?= RM_USEDSKILL; ?></p>
                            <div class="btn-container">
                                <a type="button" href="https://reservation-manager.reikaakuzawa.com/" target="_blank" rel="noopener"><?= CHECK_THE_SITE_BTN; ?></a>
                                <a type="button" href="https://github.com/Reikasan/reservation_manager" target="_blank" rel="noopener"><?= CHECK_THE_CODE_BTN; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-details">
                    <h3 class="site-description"><?= LOGIN_TITLE; ?></h3>
                    <div class="site-link">
                        <img class="screenshot" src="img/future-partner-screen.jpg" alt="<?= LOGIN_SCREENSHOT_ALT; ?>">
                        <div class="used-skills">
                            <p><?= LOGIN_USEDSKILL; ?></p>
                            <div class="btn-container">
                                <a type="button" href="https://sample-login.reikaakuzawa.com/" target="_blank" rel="noopener"><?= CHECK_THE_SITE_BTN; ?></a>
                                <a type="button" href="https://github.com/Reikasan/sample_login" target="_blank" rel="noopener"><?= CHECK_THE_CODE_BTN; ?></a>
                            </div>
                        </div>
                    </div>      
                </div>
                <div class="site-details">
                    <h3 class="site-description"><?= TODO_TITLE; ?></h3>
                    <div class="site-link">
                        <img class="screenshot" src="img/to-do-screenshot.jpg" alt="<?= TODO_SCREENSHOT_ALT; ?>">
                        <div class="used-skills">
                            <p><?= TODO_USEDSKILL; ?></p>
                            <div class="btn-container">
                                <a type="button" href="https://todo-list.reikaakuzawa.com/" target="_blank" rel="noopener"><?= CHECK_THE_SITE_BTN; ?></a>
                                <a type="button" href="https://github.com/Reikasan/to-do-list" target="_blank" rel="noopener"><?= CHECK_THE_CODE_BTN; ?></a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div><!-- end of .site-container -->
        </section>

        <section id="contact">
            <div>
                <h1 class="section-title"><?= CONTACT; ?></h1>
                <p class="section-lead"><?= CONTACT_LEAD; ?></p>
            </div>  
            <div class="form-group">
                <p id="warningMessage"></p>
                <form>
                    <div class="controls">
                        <input type="text" id="name" class="contactInput" placeholder="Your Name" maxlength="20" required>
                        <label for="name" class="inputLabel">Name</label>
                    </div>
                    <div class="controls">
                        <input type="email" id="email" class="contactInput" placeholder="address@youremail.com" maxlength="50" required>
                        <label for="email" class="inputLabel">Email</label>
                    </div>
                    <div class="controls">
                        <textarea id="comments" class="contactInput" placeholder="<?= COMMENT_PLACEHOLDER; ?>" maxlength="500" required></textarea>
                        <label for="comments" class="inputLabel"><?= COMMENT; ?></label>
                    </div>
                    <input type="submit" id="submitBtn" value="<?= SUBMIT; ?>" class="submit">
                </form>
            </div>
        </section>
        <footer>
            <div class="footerContainer">
                <a class="brand" href="#page-top">Reika Akuzawa</a>
                <div class="social-icon">
                    <a href="https://www.facebook.com/reikasan" target="blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://github.com/Reikasan" target="blank"><i class="fab fa-github"></i></a>
                    <a href="mailto:info@reikaakuzawa.com"><i class="far fa-envelope"></i></a>
                </div>
            </div>
            <small>&copy; 2020 Reika Akuzawa</small>
        </footer>
    </div> <!-- end of #container -->

    <!-- CONFIRMATION MODAL -->
    <?php include "includes/confirmation_modal.php"; ?> 
    
    <script src="js/script.js" type="text/javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>