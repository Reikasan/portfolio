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

    // Add Eventlistener to all tabs 
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Stop Slideshow and move to selected screenshot
            stopSlideShow();
            const selectedTab = document.querySelector('.tab.selected');
            const selectedScreenshot = document.querySelector('.slide.selected');
            selectedTab.classList.remove('selected');
            selectedScreenshot.classList.remove('selected');
            tab.classList.add('selected');

            const newSelectedTab = document.querySelector('.tab.selected');

            tabs = Array.from(tabs);
            var selectedIndex = tabs.indexOf(newSelectedTab);

            if(selectedIndex === 0) {
                screenshots[0].classList.add('selected');
                var i = 1;
            } else if(selectedIndex === 1) {
                screenshots[1].classList.add('selected');
                var i = 2;
            } else if(selectedIndex === 2) {
                screenshots[2].classList.add('selected');
                var i = 3;
            } else if(selectedIndex === 3) {
                screenshots[3].classList.add('selected');
                var i = 4;
            }

        });
    });

    function stopSlideShow() {
        clearInterval(slideShowTimer);
        slideContainer.classList.remove('slider-on');
        changeOperatorIcon();
    }

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


    // Auto slideshow
    var i = 1;
    var slideShowTimer = setInterval(slideShow, 4000);
    
    function slideShow(){
        i++;

        const selectedScreenshot = document.querySelector('.slide.selected');
        const selectedTab = document.querySelector('.tab.selected');

        selectedScreenshot.classList.remove('selected');
        selectedTab.classList.remove('selected');

        if(i > screenshots.length) {
            screenshots[0].classList.add('selected');
            tabs[0].classList.add('selected');
            
            i = 1;
        } else {
            selectedScreenshot.nextElementSibling.classList.add('selected');
            selectedTab.nextElementSibling.classList.add('selected');
        }
    }

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
        errorMessage.innerHTML = "Please fill in all input area";
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

    
    

    

