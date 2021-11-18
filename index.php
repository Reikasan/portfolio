<?php include "includes/header.php"; ?>
<?php ob_start(); ?>

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
                <h1 class="section-title">About Reika</h1>
                <div class="reika">
                    <img src="img/self-portrait-7-sq.jpg" alt="">
                    <p class="section-lead">
                        Reika is a full-stack web developer based in Berlin. Since 2018 she has started to learn programming and continue to improve her knowledge. 
                        She masters <span>HTML</span>, <span>CSS</span>, <span>Javascript</span> and <span>PHP</span> and she is also interested in other technologies and new areas such as app development.  
                    </p>
                </div>
                
            </div>   
        </section>
        
        <section id="works">
            <div>
                <h1 class="section-title">Works</h1>
                <p class="section-lead">
                    All original Projects. You can check used Languages and off course real Website.
                </p>
            </div> 
            <div class="site-container">
                <div class="site-details">
                    <h3 class="site-description">Sample Bar Website with Web Reservation system</h3>
                    <p class="additional-comment">Linked with Reservation Management Systemsite.</p>
                    <div class="site-link">
                        <img class="screenshot" src="img/sample-bar-screen.jpg" alt="sample bar website's screenshot">
                        <div class="used-skills">
                            <p>Build with <span>HTML</span>, <span>CSS</span>, <span>Javascript</span> and <span>PHP</span></p>
                            <div class="btn-container">
                                <a type="button" href="https://sample-bar.reikaakuzawa.com/" target="_blank" rel="noopener">Check the Site</a>
                                <a type="button" href="https://github.com/Reikasan/sample_bar" target="_blank" rel="noopener">Check the Code</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="site-details">
                    <h3 class="site-description">Sample Reservation Management Systemsite</h3>
                    <p class="additional-comment">Linked with Bar Website.</p>
                    <div class="site-link">
                        <img class="screenshot" src="img/reservation_manager_screenshot.jpg" alt="sample Reservation Manager website's screenshot">
                        <div class="used-skills">
                            <p>Build with <span>HTML</span>, <span>CSS</span>, <span>Javascript</span> and <span>PHP</span></p>
                            <div class="btn-container">
                                <a type="button" href="https://reservation-manager.reikaakuzawa.com/" target="_blank" rel="noopener">Check the Site</a>
                                <a type="button" href="https://github.com/Reikasan/reservation_manager" target="_blank" rel="noopener">Check the Code</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-details">
                    <h3 class="site-description">Sample Website with fake Login function.</h3>
                    <div class="site-link">
                        <img class="screenshot" src="img/future-partner-screen.jpg" alt="sample website's screenshot">
                        <div class="used-skills">
                            <p>Build with <span>HTML</span>, <span>CSS</span>, <span>Bootstrap</span> and  <span>Javascript</span></p>
                            <div class="btn-container">
                                <a type="button" href="https://sample-login.reikaakuzawa.com/" target="_blank" rel="noopener">Check the Site</a>
                                <a type="button" href="https://github.com/Reikasan/sample_login" target="_blank" rel="noopener">Check the Code</a>
                            </div>
                        </div>
                    </div>      
                </div>
                <div class="site-details">
                    <h3 class="site-description">Schedule manage app</h3>
                    <div class="site-link">
                        <img class="screenshot" src="img/to-do-screenshot.jpg" alt="sample website screenshot">
                        <div class="used-skills">
                            <p>Build with <span>HTML</span>, <span>CSS</span>, <span>jQuery</span> and  <span>Javascript</span></p>
                            <div class="btn-container">
                                <a type="button" href="https://todo-list.reikaakuzawa.com/" target="_blank" rel="noopener">Check the Site</a>
                                <a type="button" href="https://github.com/Reikasan/to-do-list" target="_blank" rel="noopener">Check the Code</a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div><!-- end of .site-container -->
        </section>

        <section id="contact">
            <div>
                <h1 class="section-title">Contact</h1>
                <p class="section-lead">Please contact me when you find something interested in!</p>
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
                        <textarea id="comments" class="contactInput" placeholder="Please say something" maxlength="500" required></textarea>
                        <label for="comments" class="inputLabel">Comments</label>
                    </div>
                    <input type="submit" id="submitBtn" value="Submit" class="submit">
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
    
    <script src="script.js" type="text/javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>