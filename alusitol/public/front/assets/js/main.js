/**
 * Template Name: Mentor - v4.9.1
 * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all);
        if (selectEl) {
            if (all) {
                selectEl.forEach((e) => e.addEventListener(type, listener));
            } else {
                selectEl.addEventListener(type, listener);
            }
        }
    };

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener("scroll", listener);
    };

    /**
     * Back to top button
     */
    let backtotop = select(".back-to-top");
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add("active");
            } else {
                backtotop.classList.remove("active");
            }
        };
        window.addEventListener("load", toggleBacktotop);
        onscroll(document, toggleBacktotop);
    }

    /**
     * Mobile nav toggle
     */
    on("click", ".mobile-nav-toggle", function (e) {
        select("#navbar").classList.toggle("navbar-mobile");
        this.classList.toggle("bi-list");
        this.classList.toggle("bi-x");
    });

    /**
     * Mobile nav dropdowns activate
     */
    on(
        "click",
        ".navbar .dropdown > a",
        function (e) {
            if (select("#navbar").classList.contains("navbar-mobile")) {
                e.preventDefault();
                this.nextElementSibling.classList.toggle("dropdown-active");
            }
        },
        true
    );

    /**
     * Preloader
     */
    let preloader = select("#preloader");
    if (preloader) {
        window.addEventListener("load", () => {
            preloader.remove();
        });
    }

    /**
     * Testimonials slider
     */
    new Swiper(".testimonials-slider", {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            1200: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
        },
    });

    /**
     * Animation on scroll
     */
    window.addEventListener("load", () => {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    });

    /**
     * Initiate Pure Counter
     */
    new PureCounter();
})();

/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 *
 */
function showRegisterForm() {
    $(".loginBox").fadeOut("fast", function () {
        $(".registerBox").fadeIn("fast");
        $(".login-footer").fadeOut("fast", function () {
            $(".register-footer").fadeIn("fast");
        });
        $(".modal-title").html("Register with");
    });
    $(".error").removeClass("alert alert-danger").html("");
}
function showLoginForm() {
    $("#loginModal .registerBox").fadeOut("fast", function () {
        $(".loginBox").fadeIn("fast");
        $(".register-footer").fadeOut("fast", function () {
            $(".login-footer").fadeIn("fast");
        });

        $(".modal-title").html("Login with");
    });
    $(".error").removeClass("alert alert-danger").html("");
}

function openLoginModal() {
    showLoginForm();
    setTimeout(function () {
        $("#loginModal").modal("show");
    }, 230);
}
function openRegisterModal() {
    showRegisterForm();
    setTimeout(function () {
        $("#loginModal").modal("show");
    }, 230);
}

function loginAjax() {
    /*   Remove this comments when moving to server
    $.post( "/login", function( data ) {
            if(data == 1){
                window.location.replace("/home");
            } else {
                 shakeModal();
            }
        });
    */

    /*   Simulate error message from the server   */
    shakeModal();
}

function shakeModal() {
    $("#loginModal .modal-dialog").addClass("shake");
    $(".error")
        .addClass("alert alert-danger")
        .html("Invalid email/password combination");
    $('input[type="password"]').val("");
    setTimeout(function () {
        $("#loginModal .modal-dialog").removeClass("shake");
    }, 1000);
}
