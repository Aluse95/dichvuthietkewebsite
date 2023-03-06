const toggleContainer = document.querySelector(".toggle-container h2");
const toggleEl = document.querySelector(".toggle");

toggleContainer.addEventListener("click", () => {
  toggleEl.style.display == "block"
    ? (toggleEl.style.display = "none")
    : (toggleEl.style.display = "block"); 
});

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";  
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

$(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
        $('#project .project-item-img.home-project').css('display','block');
        $('#project .m-project .project-item-img').css('display','block');
    }
    if ($(this).scrollTop() > 20) {
        $('#header').css({'background-color':'#fff', 'box-shadow':'0 0 10px rgb(0 0 0 / 10%)'});
        $('.search-container i').css('border','1px solid rgb(255, 123, 52)');
        $('.search-contact-btn-container').css('border','1px solid rgb(255, 123, 52)')
    }
});