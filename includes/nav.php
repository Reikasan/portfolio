<nav class="navbar">
    <div id="logo">
        <a class="brand" href="#">Reika Akuzawa</a>
    </div>

    <ul id="navbar-items">
        <li>
            <a class="nav-link" href="#about"><?= ABOUT; ?></a>
            <div class="underline"></div>
        </li>
        <li>
            <a class="nav-link" href="#works"><?= PROJECTS; ?></a>
            <div class="underline"></div>
        </li> 
        <li>
            <a class="nav-link" href="#contact"><?= CONTACT; ?></a>
            <div class="underline"></div>
        </li>
    </ul>  

    <!-- Select language option -->
    <div id="selectLang">
        <p><span class="hide-by-mobile">Selected </span>Language: </p>
        <form action="" method="get" onchange="changeLanguage()" id="languageForm">
            <select name="lang" id="selectLangs">
                <option value="en" <?php echo $_SESSION['lang'] && $_SESSION['lang'] == 'en' ? 'selected': ''; ?>>English</option>
                <option value="de" <?php echo $_SESSION['lang'] && $_SESSION['lang'] == 'de' ? 'selected': ''; ?>>German</option>
                <option value="jp" <?php echo $_SESSION['lang'] && $_SESSION['lang'] == 'jp' ? 'selected': ''; ?>>Japanese</option>
            </select>
        </form>
    </div>
</nav>