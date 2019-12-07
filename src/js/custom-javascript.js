//Smooth Scrolling

// first add raf shim
// http://www.paulirish.com/2011/requestanimationframe-for-smart-animating/
window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame       ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame    ||
            function( callback ){
              window.setTimeout(callback, 1000 / 60);
            };
  })();

  // http://stackoverflow.com/questions/8917921/cross-browser-javascript-not-jquery-scroll-to-top-animation
  // main function
function scrollToY(scrollTargetY, speed, easing) {
    // scrollTargetY: the target scrollY property of the window
    // speed: time in pixels per second
    // easing: easing equation to use

    var scrollY = window.scrollY || document.documentElement.scrollTop,
        scrollTargetY = scrollTargetY || 0,
        speed = speed || 2000,
        easing = easing || 'easeOutSine',
        currentTime = 0;

    if( typeof scrollTargetY === "object" ) {
        let rect = scrollTargetY.getBoundingClientRect();
        scrollTargetY = rect.top + scrollY;
    }

    // min time .1, max time .8 seconds
    var time = Math.max( .1, Math.min( Math.abs( scrollY - scrollTargetY ) / speed, .8));

    console.log(scrollY);
    console.log(scrollTargetY);

    // easing equations from https://github.com/danro/easing-js/blob/master/easing.js
    var easingEquations = {
            easeOutSine: function (pos) {
                return Math.sin(pos * (Math.PI / 2));
            },
            easeInOutSine: function (pos) {
                return (-0.5 * (Math.cos(Math.PI * pos) - 1));
            },
            easeInOutQuint: function (pos) {
                if ((pos /= 0.5) < 1) {
                    return 0.5 * Math.pow(pos, 5);
                }
                return 0.5 * (Math.pow((pos - 2), 5) + 2);
            }
        };

    // add animation loop
    function tick() {
        currentTime += 1 / 60;

        var p = currentTime / time;
        var t = easingEquations[easing](p);

        if (p < 1) {
            requestAnimFrame(tick);

            window.scrollTo(0, scrollY + ((scrollTargetY - scrollY) * t));
        } else {
            console.log('scroll done');
            window.scrollTo(0, scrollTargetY);
        }
    }

    // call it once to get started
    tick();
}

// scroll it!
let scrollList = document.querySelectorAll(".scrollTo");

for(let item of scrollList) {
    item.addEventListener( 'click', function(e) {
        let elem = event.target || event.srcElement;
        let targetElemName = elem.getAttribute('href');
        let targetElem = document.querySelector(targetElemName);
        scrollToY(targetElem, 1500, 'easeInOutQuint');
    });
}


// stuff that needs jquery
(function($) {
    $("html").css({opacity: 0, visibility: "visible"}).animate({opacity: 1}, 500);

    // Cache all animated elements
    var $animation_elements = $('.animation-element');
    // var $animation_elements_quick = $('.animation-element-quick');
    var $window = $(window);
    var $window_width = $window.width();

    // actual function to check if in view
    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);
        
        $.each($animation_elements, function() {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);
            
            element_top_position = element_top_position + (window_height / 8);
            element_bottom_position = element_bottom_position - (window_height / 8);

            //check to see if this current container is within viewport
            if($window_width > 430) {
                if ((element_bottom_position >= window_top_position) &&
                    (element_top_position <= window_bottom_position)) {
                    $element.addClass('in-view');
                    // console.log($element);
                } 
            } else {
                $element.addClass('in-view');
            }
        });
    }

    // Grab scroll and resize event with callback to in_view function
    if($window.width() > 430) {
        $window.on('scroll resize', check_if_in_view);
        // Initial trigger method to fire a scroll even as soon as the window loads just in case there are things on
        // the first page to animate
        $window.trigger('scroll');
        
    } else {
        check_if_in_view();
    };
})( jQuery );

