
(function ($) {

    var methods = {

        init : function(options) {
            var defaults = {
                time_constant: 200, // ms
                dist: -100, // zoom scale TODO: make this more intuitive as an option
                shift: 0, // spacing for center image
                padding: 0, // Padding between non center items
                full_width: false // Change to full width styles
            };
            options = $.extend(defaults, options);

            return this.each(function() {

                var images, offset, center, pressed, dim, count,
                    reference, referenceY, amplitude, target, velocity,
                    xform, frame, timestamp, ticker, dragged, vertical_dragged;

                // Initialize
                var view = $(this);
                // Don't double initialize.
                if (view.hasClass('initialized')) {
                    return true;
                }

                // Options
                if (options.full_width) {
                    options.dist = 0;
                    imageHeight = view.find('.carousel-item img').first().load(function(){
                        view.css('height', $(this).height());
                    });
                }

                view.addClass('initialized');
                pressed = false;
                offset = target = 0;
                images = [];
                item_width = view.find('.carousel-item').first().innerWidth();
                dim = item_width * 2 + options.padding;

                view.find('.carousel-item').each(function () {
                    images.push($(this)[0]);
                });

                count = images.length;


                function setupEvents() {
                    if (typeof window.ontouchstart !== 'undefined') {
                        view[0].addEventListener('touchstart', tap);
                        view[0].addEventListener('touchmove', drag);
                        view[0].addEventListener('touchend', release);
                    }
                    view[0].addEventListener('mousedown', tap);
                    view[0].addEventListener('mousemove', drag);
                    view[0].addEventListener('mouseup', release);
                    view[0].addEventListener('click', click);
                }

                function xpos(e) {
                    // touch event
                    if (e.targetTouches && (e.targetTouches.length >= 1)) {
                        return e.targetTouches[0].clientX;
                    }

                    // mouse event
                    return e.clientX;
                }

                function ypos(e) {
                    // touch event
                    if (e.targetTouches && (e.targetTouches.length >= 1)) {
                        return e.targetTouches[0].clientY;
                    }

                    // mouse event
                    return e.clientY;
                }

                function wrap(x) {
                    return (x >= count) ? (x % count) : (x < 0) ? wrap(count + (x % count)) : x;
                }

                function scroll(x) {
                    var i, half, delta, dir, tween, el, alignment, xTranslation;

                    offset = (typeof x === 'number') ? x : offset;
                    center = Math.floor((offset + dim / 2) / dim);
                    delta = offset - center * dim;
                    dir = (delta < 0) ? 1 : -1;
                    tween = -dir * delta * 2 / dim;

                    if (!options.full_width) {
                        alignment = 'translateX(' + (view[0].clientWidth - item_width) / 2 + 'px) ';
                        alignment += 'translateY(' + (view[0].clientHeight - item_width) / 2 + 'px)';
                    } else {
                        alignment = 'translateX(0)';
                    }

                    // center
                    el = images[wrap(center)];
                    el.style[xform] = alignment +
                        ' translateX(' + (-delta / 2) + 'px)' +
                        ' translateX(' + (dir * options.shift * tween * i) + 'px)' +
                        ' translateZ(' + (options.dist * tween) + 'px)';
                    el.style.zIndex = 0;
                    if (options.full_width) { tweenedOpacity = 1; }
                    else { tweenedOpacity = 1 - 0.2 * tween; }
                    el.style.opacity = tweenedOpacity;
                    half = count >> 1;

                    for (i = 1; i <= half; ++i) {
                        // right side
                        if (options.full_width) {
                            zTranslation = options.dist;
                            tweenedOpacity = (i === half && delta < 0) ? 1 - tween : 1;
                        } else {
                            zTranslation = options.dist * (i * 2 + tween * dir);
                            tweenedOpacity = 1 - 0.2 * (i * 2 + tween * dir);
                        }
                        el = images[wrap(center + i)];
                        el.style[xform] = alignment +
                            ' translateX(' + (options.shift + (dim * i - delta) / 2) + 'px)' +
                            ' translateZ(' + zTranslation + 'px)';
                        el.style.zIndex = -i;
                        el.style.opacity = tweenedOpacity;


                        // left side
                        if (options.full_width) {
                            zTranslation = options.dist;
                            tweenedOpacity = (i === half && delta > 0) ? 1 - tween : 1;
                        } else {
                            zTranslation = options.dist * (i * 2 - tween * dir);
                            tweenedOpacity = 1 - 0.2 * (i * 2 - tween * dir);
                        }
                        el = images[wrap(center - i)];
                        el.style[xform] = alignment +
                            ' translateX(' + (-options.shift + (-dim * i - delta) / 2) + 'px)' +
                            ' translateZ(' + zTranslation + 'px)';
                        el.style.zIndex = -i;
                        el.style.opacity = tweenedOpacity;
                    }

                    // center
                    el = images[wrap(center)];
                    el.style[xform] = alignment +
                        ' translateX(' + (-delta / 2) + 'px)' +
                        ' translateX(' + (dir * options.shift * tween) + 'px)' +
                        ' translateZ(' + (options.dist * tween) + 'px)';
                    el.style.zIndex = 0;
                    if (options.full_width) { tweenedOpacity = 1; }
                    else { tweenedOpacity = 1 - 0.2 * tween; }
                    el.style.opacity = tweenedOpacity;
                }

                function track() {
                    var now, elapsed, delta, v;

                    now = Date.now();
                    elapsed = now - timestamp;
                    timestamp = now;
                    delta = offset - frame;
                    frame = offset;

                    v = 1000 * delta / (1 + elapsed);
                    velocity = 0.8 * v + 0.2 * velocity;
                }

                function autoScroll() {
                    var elapsed, delta;

                    if (amplitude) {
                        elapsed = Date.now() - timestamp;
                        delta = amplitude * Math.exp(-elapsed / options.time_constant);
                        if (delta > 2 || delta < -2) {
                            scroll(target - delta);
                            requestAnimationFrame(autoScroll);
                        } else {
                            scroll(target);
                        }
                    }
                }

                function click(e) {
                    // Disable clicks if carousel was dragged.
                    if (dragged) {
                        e.preventDefault();
                        e.stopPropagation();
                        return false;

                    } else if (!options.full_width) {
                        var clickedIndex = $(e.target).closest('.carousel-item').index();
                        var diff = (center % count) - clickedIndex;

                        // Account for wraparound.
                        if (diff < 0) {
                            if (Math.abs(diff + count) < Math.abs(diff)) { diff += count; }

                        } else if (diff > 0) {
                            if (Math.abs(diff - count) < diff) { diff -= count; }
                        }

                        // Call prev or next accordingly.
                        if (diff < 0) {
                            $(this).trigger('carouselNext', [Math.abs(diff)]);

                        } else if (diff > 0) {
                            $(this).trigger('carouselPrev', [diff]);
                        }
                    }
                }

                function tap(e) {
                    pressed = true;
                    dragged = false;
                    vertical_dragged = false;
                    reference = xpos(e);
                    referenceY = ypos(e);

                    velocity = amplitude = 0;
                    frame = offset;
                    timestamp = Date.now();
                    clearInterval(ticker);
                    ticker = setInterval(track, 100);

                }

                function drag(e) {
                    var x, delta, deltaY;
                    if (pressed) {
                        x = xpos(e);
                        y = ypos(e);
                        delta = reference - x;
                        deltaY = Math.abs(referenceY - y);
                        if (deltaY < 30 && !vertical_dragged) {
                            // If vertical scrolling don't allow dragging.
                            if (delta > 2 || delta < -2) {
                                dragged = true;
                                reference = x;
                                scroll(offset + delta);
                            }

                        } else if (dragged) {
                            // If dragging don't allow vertical scroll.
                            e.preventDefault();
                            e.stopPropagation();
                            return false;

                        } else {
                            // Vertical scrolling.
                            vertical_dragged = true;
                        }
                    }

                    if (dragged) {
                        // If dragging don't allow vertical scroll.
                        e.preventDefault();
                        e.stopPropagation();
                        return false;
                    }
                }

                function release(e) {
                    pressed = false;

                    clearInterval(ticker);
                    target = offset;
                    if (velocity > 10 || velocity < -10) {
                        amplitude = 0.9 * velocity;
                        target = offset + amplitude;
                    }
                    target = Math.round(target / dim) * dim;
                    amplitude = target - offset;
                    timestamp = Date.now();
                    requestAnimationFrame(autoScroll);

                    e.preventDefault();
                    e.stopPropagation();
                    return false;
                }

                xform = 'transform';
                ['webkit', 'Moz', 'O', 'ms'].every(function (prefix) {
                    var e = prefix + 'Transform';
                    if (typeof document.body.style[e] !== 'undefined') {
                        xform = e;
                        return false;
                    }
                    return true;
                });



                window.onresize = scroll;

                setupEvents();
                scroll(offset);

                $(this).on('carouselNext', function(e, n) {
                    if (n === undefined) {
                        n = 1;
                    }
                    target = offset + dim * n;
                    if (offset !== target) {
                        amplitude = target - offset;
                        timestamp = Date.now();
                        requestAnimationFrame(autoScroll);
                    }
                });

                $(this).on('carouselPrev', function(e, n) {
                    if (n === undefined) {
                        n = 1;
                    }
                    target = offset - dim * n;
                    if (offset !== target) {
                        amplitude = target - offset;
                        timestamp = Date.now();
                        requestAnimationFrame(autoScroll);
                    }
                });

            });



        },
        next : function(n) {
            $(this).trigger('carouselNext', [n]);
        },
        prev : function(n) {
            $(this).trigger('carouselPrev', [n]);
        },
    };


    $.fn.carousel = function(methodOrOptions) {
        if ( methods[methodOrOptions] ) {
            return methods[ methodOrOptions ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof methodOrOptions === 'object' || ! methodOrOptions ) {
            // Default to "init"
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  methodOrOptions + ' does not exist on jQuery.carousel' );
        }
    }; // Plugin end
}( jQuery ));

(function ($) {

    var methods = {

        init : function(options) {
            var defaults = {
                indicators: true,
                height: 400,
                transition: 500,
                interval: 6000
            };
            options = $.extend(defaults, options);

            return this.each(function() {

                // For each slider, we want to keep track of
                // which slide is active and its associated content
                var $this = $(this);
                var $slider = $this.find('ul.slides').first();
                var $slides = $slider.find('li');
                var $active_index = $slider.find('.active').index();
                var $active, $indicators, $interval;
                if ($active_index != -1) { $active = $slides.eq($active_index); }

                // Transitions the caption depending on alignment
                function captionTransition(caption, duration) {
                    if (caption.hasClass("center-align")) {
                        caption.velocity({opacity: 0, translateY: -100}, {duration: duration, queue: false});
                    }
                    else if (caption.hasClass("right-align")) {
                        caption.velocity({opacity: 0, translateX: 100}, {duration: duration, queue: false});
                    }
                    else if (caption.hasClass("left-align")) {
                        caption.velocity({opacity: 0, translateX: -100}, {duration: duration, queue: false});
                    }
                }

                // This function will transition the slide to any index of the next slide
                function moveToSlide(index) {
                    // Wrap around indices.
                    if (index >= $slides.length) index = 0;
                    else if (index < 0) index = $slides.length -1;

                    $active_index = $slider.find('.active').index();

                    // Only do if index changes
                    if ($active_index != index) {
                        $active = $slides.eq($active_index);
                        $caption = $active.find('.caption');

                        $active.removeClass('active');
                        $active.velocity({opacity: 0}, {duration: options.transition, queue: false, easing: 'easeOutQuad',
                            complete: function() {
                                $slides.not('.active').velocity({opacity: 0, translateX: 0, translateY: 0}, {duration: 0, queue: false});
                            } });
                        captionTransition($caption, options.transition);


                        // Update indicators
                        if (options.indicators) {
                            $indicators.eq($active_index).removeClass('active');
                        }

                        $slides.eq(index).velocity({opacity: 1}, {duration: options.transition, queue: false, easing: 'easeOutQuad'});
                        $slides.eq(index).find('.caption').velocity({opacity: 1, translateX: 0, translateY: 0}, {duration: options.transition, delay: options.transition, queue: false, easing: 'easeOutQuad'});
                        $slides.eq(index).addClass('active');


                        // Update indicators
                        if (options.indicators) {
                            $indicators.eq(index).addClass('active');
                        }
                    }
                }

                // Set height of slider
                // If fullscreen, do nothing
                if (!$this.hasClass('fullscreen')) {
                    if (options.indicators) {
                        // Add height if indicators are present
                        $this.height(options.height + 40);
                    }
                    else {
                        $this.height(options.height);
                    }
                    $slider.height(options.height);
                }


                // Set initial positions of captions
                $slides.find('.caption').each(function () {
                    captionTransition($(this), 0);
                });

                // Move img src into background-image
                $slides.find('img').each(function () {
                    var placeholderBase64 = 'data:image/gif;base64,R0lGODlhAQABAIABAP///wAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
                    if ($(this).attr('src') !== placeholderBase64) {
                        $(this).css('background-image', 'url(' + $(this).attr('src') + ')' );
                        $(this).attr('src', placeholderBase64);
                    }
                });

                // dynamically add indicators
                if (options.indicators) {
                    $indicators = $('<ul class="indicators"></ul>');
                    $slides.each(function( index ) {
                        var $indicator = $('<li class="indicator-item"></li>');

                        // Handle clicks on indicators
                        $indicator.click(function () {
                            var $parent = $slider.parent();
                            var curr_index = $parent.find($(this)).index();
                            moveToSlide(curr_index);

                            // reset interval
                            clearInterval($interval);
                            $interval = setInterval(
                                function(){
                                    $active_index = $slider.find('.active').index();
                                    if ($slides.length == $active_index + 1) $active_index = 0; // loop to start
                                    else $active_index += 1;

                                    moveToSlide($active_index);

                                }, options.transition + options.interval
                            );
                        });
                        $indicators.append($indicator);
                    });
                    $this.append($indicators);
                    $indicators = $this.find('ul.indicators').find('li.indicator-item');
                }

                if ($active) {
                    $active.show();
                }
                else {
                    $slides.first().addClass('active').velocity({opacity: 1}, {duration: options.transition, queue: false, easing: 'easeOutQuad'});

                    $active_index = 0;
                    $active = $slides.eq($active_index);

                    // Update indicators
                    if (options.indicators) {
                        $indicators.eq($active_index).addClass('active');
                    }
                }

                // Adjust height to current slide
                $active.find('img').each(function() {
                    $active.find('.caption').velocity({opacity: 1, translateX: 0, translateY: 0}, {duration: options.transition, queue: false, easing: 'easeOutQuad'});
                });

                // auto scroll
                $interval = setInterval(
                    function(){
                        $active_index = $slider.find('.active').index();
                        moveToSlide($active_index + 1);

                    }, options.transition + options.interval
                );


                // HammerJS, Swipe navigation

                // Touch Event
                var panning = false;
                var swipeLeft = false;
                var swipeRight = false;

                $this.hammer({
                    prevent_default: false
                }).bind('pan', function(e) {
                    if (e.gesture.pointerType === "touch") {

                        // reset interval
                        clearInterval($interval);

                        var direction = e.gesture.direction;
                        var x = e.gesture.deltaX;
                        var velocityX = e.gesture.velocityX;

                        $curr_slide = $slider.find('.active');
                        $curr_slide.velocity({ translateX: x
                        }, {duration: 50, queue: false, easing: 'easeOutQuad'});

                        // Swipe Left
                        if (direction === 4 && (x > ($this.innerWidth() / 2) || velocityX < -0.65)) {
                            swipeRight = true;
                        }
                        // Swipe Right
                        else if (direction === 2 && (x < (-1 * $this.innerWidth() / 2) || velocityX > 0.65)) {
                            swipeLeft = true;
                        }

                        // Make Slide Behind active slide visible
                        var next_slide;
                        if (swipeLeft) {
                            next_slide = $curr_slide.next();
                            if (next_slide.length === 0) {
                                next_slide = $slides.first();
                            }
                            next_slide.velocity({ opacity: 1
                            }, {duration: 300, queue: false, easing: 'easeOutQuad'});
                        }
                        if (swipeRight) {
                            next_slide = $curr_slide.prev();
                            if (next_slide.length === 0) {
                                next_slide = $slides.last();
                            }
                            next_slide.velocity({ opacity: 1
                            }, {duration: 300, queue: false, easing: 'easeOutQuad'});
                        }


                    }

                }).bind('panend', function(e) {
                    if (e.gesture.pointerType === "touch") {

                        $curr_slide = $slider.find('.active');
                        panning = false;
                        curr_index = $slider.find('.active').index();

                        if (!swipeRight && !swipeLeft) {
                            // Return to original spot
                            $curr_slide.velocity({ translateX: 0
                            }, {duration: 300, queue: false, easing: 'easeOutQuad'});
                        }
                        else if (swipeLeft) {
                            moveToSlide(curr_index + 1);
                            $curr_slide.velocity({translateX: -1 * $this.innerWidth() }, {duration: 300, queue: false, easing: 'easeOutQuad',
                                complete: function() {
                                    $curr_slide.velocity({opacity: 0, translateX: 0}, {duration: 0, queue: false});
                                } });
                        }
                        else if (swipeRight) {
                            moveToSlide(curr_index - 1);
                            $curr_slide.velocity({translateX: $this.innerWidth() }, {duration: 300, queue: false, easing: 'easeOutQuad',
                                complete: function() {
                                    $curr_slide.velocity({opacity: 0, translateX: 0}, {duration: 0, queue: false});
                                } });
                        }
                        swipeLeft = false;
                        swipeRight = false;

                        // Restart interval
                        clearInterval($interval);
                        $interval = setInterval(
                            function(){
                                $active_index = $slider.find('.active').index();
                                if ($slides.length == $active_index + 1) $active_index = 0; // loop to start
                                else $active_index += 1;

                                moveToSlide($active_index);

                            }, options.transition + options.interval
                        );
                    }
                });

                $this.on('sliderPause', function() {
                    clearInterval($interval);
                });

                $this.on('sliderStart', function() {
                    clearInterval($interval);
                    $interval = setInterval(
                        function(){
                            $active_index = $slider.find('.active').index();
                            if ($slides.length == $active_index + 1) $active_index = 0; // loop to start
                            else $active_index += 1;

                            moveToSlide($active_index);

                        }, options.transition + options.interval
                    );
                });

                $this.on('sliderNext', function() {
                    $active_index = $slider.find('.active').index();
                    moveToSlide($active_index + 1);
                });

                $this.on('sliderPrev', function() {
                    $active_index = $slider.find('.active').index();
                    moveToSlide($active_index - 1);
                });

            });



        },
        pause : function() {
            $(this).trigger('sliderPause');
        },
        start : function() {
            $(this).trigger('sliderStart');
        },
        next : function() {
            $(this).trigger('sliderNext');
        },
        prev : function() {
            $(this).trigger('sliderPrev');
        }
    };


    $.fn.slider = function(methodOrOptions) {
        if ( methods[methodOrOptions] ) {
            return methods[ methodOrOptions ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof methodOrOptions === 'object' || ! methodOrOptions ) {
            // Default to "init"
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  methodOrOptions + ' does not exist on jQuery.tooltip' );
        }
    }; // Plugin end
}( jQuery ));