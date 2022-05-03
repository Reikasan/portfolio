/* CHANGE PAGE LANGUAGE */
function changeLanguage() {
    document.getElementById('languageForm').submit();
}

/* PAGE TOP ICON */
// scroll down and show the icon
var icon = document.getElementById("pageTopIcon");

var scrollDownAndShow = function() {
    
    var y = window.scrollY;
    
    if ( y >= 120) {
        icon.classList.remove("icon-hide");
    } else {
        icon.classList.add("icon-hide");
    }
};
window.addEventListener("scroll", scrollDownAndShow);


/* SLIDESHOW IN PC */
const screenshots = document.querySelectorAll('.slide');
var tabs = document.querySelectorAll('.tab');
const pauseIcons = document.querySelectorAll('.fa-pause');
const playIcons = document.querySelectorAll('.fa-play');
const mouseOverScreens = document.querySelectorAll('.mouse-over');
const slideContainer = document.getElementById('slide-container');
var i = 1;
var slideShowTimer = setInterval(slideShow, 4000);

// Auto slideshow
function slideShow(){
    i++;
    
    var selectedTab = defineSelectedTab();
    var selectedScreenshot = defineSelectedScreenshot();

    removeSelectedClass(selectedTab, selectedScreenshot);

    if(i > screenshots.length) {
        backToFirstScreenshot()
        
        i = 1;
    } else {
        moveToNextScreenshot(selectedTab, selectedScreenshot)
    }
}

// Add Eventlistener to all tabs 
tabs.forEach(tab => {
    tab.addEventListener('click', ()=> {
        stopSlideShow();

        var selectedTab = defineSelectedTab();
        var selectedScreenshot = defineSelectedScreenshot();
        removeSelectedClass(selectedTab, selectedScreenshot)
        tab.classList.add('selected');
            
        var selectedIndex = defineIndexOfSelectedTab();

        if(selectedIndex === 0) {
            screenshots[0].classList.add('selected');
            i = 1;
        } else if(selectedIndex === 1) {
            screenshots[1].classList.add('selected');
            i = 2;
        } else if(selectedIndex === 2) {
            screenshots[2].classList.add('selected');
            i = 3;
        } else if(selectedIndex === 3) {
            screenshots[3].classList.add('selected');
            i = 4;
        }
    });
});

// Add Eventlistener to all Pause/Play Icons
pauseIcons.forEach(pauseIcon => {
    pauseIcon.removeAttribute('arial-hidden');
    pauseIcon.addEventListener('click', stopSlideShow);
});

playIcons.forEach(playIcon => {
    playIcon.removeAttribute('arial-hidden');
    playIcon.addEventListener('click', function() {
        slideShowTimer = setInterval(slideShow, 4000);
        slideContainer.classList.add('slider-on');
        changeOperatorIcon();
    });
});

// Show Pause or Play Icon by hover screen
slideContainer.addEventListener('mouseover', function() {
    mouseOverScreens.forEach(screen => {
        screen.classList.add('show');
    });
    changeOperatorIcon();
});

slideContainer.addEventListener('mouseleave', function() {
    mouseOverScreens.forEach(screen => {
        screen.classList.remove('show');
    });
    changeOperatorIcon();
});


function changeOperatorIcon() {
    if(slideContainer.classList.contains('slider-on')) {
        // show PAUSE icon
        pauseIcons.forEach(pauseIcon => {
            pauseIcon.classList.remove('hide');
        });
        playIcons.forEach(playIcon => {
            playIcon.classList.add('hide');
        });
        
    } else {
        // show PLAY icon
        pauseIcons.forEach(pauseIcon => {
            pauseIcon.classList.add('hide');
        });
        playIcons.forEach(playIcon => {
            playIcon.classList.remove('hide');
        });
    }
}

// HELPER FUNCTIONS
function defineSelectedTab() {
    return document.querySelector('.tab.selected');
}
function defineSelectedScreenshot() {
    return document.querySelector('.slide.selected');
}

function removeSelectedClass(selectedTab, selectedScreenshot) {
    selectedTab.classList.remove('selected'); 
    selectedScreenshot.classList.remove('selected');
}

function defineIndexOfSelectedTab() {
    const newSelectedTab = defineSelectedTab();

    tabs = Array.from(tabs);
    return tabs.indexOf(newSelectedTab);
}

function backToFirstScreenshot() {
    screenshots[0].classList.add('selected');
    tabs[0].classList.add('selected');
}

function moveToNextScreenshot(selectedTab, selectedScreenshot) {
    selectedScreenshot.nextElementSibling.classList.add('selected'); 
    selectedTab.nextElementSibling.classList.add('selected');
}

function stopSlideShow() {
    clearInterval(slideShowTimer);
    slideContainer.classList.remove('slider-on');
    changeOperatorIcon();
}
    

/* CONFIRMATION MODAL */
const submitBtn = document.getElementById('submitBtn');
const bg = document.getElementById('container');
const sender = document.getElementById('name');
const email = document.getElementById('email');
const comments = document.getElementById('comments');
const errorMessage = document.getElementById('warningMessage');

const confirmationModal = document.getElementById('confirmationModal');
const thanksModal = document.getElementById('thanksModal');

const printName = document.getElementById('printName');
const printEmail = document.getElementById('printEmail');
const printComments = document.getElementById('printComments');

// show confirmation modal
submitBtn.addEventListener('click', (e) => {

    const nameValue = sender.value;
    const emailValue = email.value;
    const commentsValue = comments.value;

    function checkEmptyInput(inputArea) {
        if(inputArea.value === "") {
            inputArea.classList.add('warning');
        } else {
            inputArea.classList.remove('warning');
        }
    }

    // check input values are not empty
    if(nameValue !== "" && emailValue !== "" && commentsValue !== "") {
        errorMessage.classList.remove('show');
        checkEmptyInput(sender);
        checkEmptyInput(email);
        checkEmptyInput(comments);

        printName.setAttribute('value', nameValue);
        printEmail.setAttribute('value', emailValue);
        printComments.innerHTML = commentsValue;
        bg.classList.add('opacity');
        confirmationModal.classList.add('show');
        
    } else {
        // check empty input area and add .warning
        checkEmptyInput(sender);
        checkEmptyInput(email);
        checkEmptyInput(comments);

        // show error message
        errorMessage.innerHTML = "<?= ERROR_MESSAGE; ?>";
        errorMessage.classList.add('show');
    
    }

    e.preventDefault();
}); // end of show confirmationModal 

// back to form by closeBtn
const closeBtns = document.querySelectorAll('.clear');
closeBtns.forEach(closeBtn => {
    closeBtn.addEventListener('click', () => {
        confirmationModal.classList.remove('show');
        bg.classList.remove('opacity');
    });
});

if(thanksModal !== null) {
    bg.classList.add('opacity');
}

    
    

    

