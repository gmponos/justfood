
(function ($) {
    $.fn.delay = function (time, func) {
        return this.each(function () {
            //setTimeout(func,time);
        });
    };
})(jQuery);

; (function ($) {

    // Logger
    $.log = function (text) {
        if (typeof (window['console']) != 'undefined') console.log(text);
    };

    $.validator.addMethod('checkselect', function (value, element, arg) {
        return (value != '0');
    });

    $.validator.classRuleSettings.checkselect = { checkselect: true };


    eat_oye = {

        init: function () {
            this.home_controller.init();
            this.listing_controller.init();
            this.single_controller.init();
            this.content_controller.init();

            // Common
            this.location_changer();
            //this.smooth_scrolling();
            this.phone_fader();
            this.rating();
            this.newsletter();

            $('[data-toggle=tooltip]').tooltip();

            // Disable default/auto binding of all buttons
            $("#aspnetForm").validate({
                onsubmit: false,
                ignore: ':hidden',
                focusInvalid: true,
                errorClass: 'field-error',
                errorPlacement: function (label, elem) {
                    return true;
                }
            });

            $('html').niceScroll({
                zindex: 99999,
                cursorcolor: "#E21A0A",
                cursorwidth: "10px",
                cursorborder: "1px solid #E21A0A",
                cursorborderradius: "5px",
                railpadding: {
                    top: 6,
                    right: 1,
                    bottom: 6
                },
            });

        },

        validateGroup: function (evt) {
            // Get Validator & Settings
            var isValid = true,
                validator = $("#aspnetForm").validate(),
                settings = validator.settings,
                $group = $(evt.currentTarget).parents('.validationGroup');

            // Grab all the input elements (minus items listed below)
            $group
                .find(":input").not(":submit, :reset, :image, [disabled]").not(settings.ignore)
                .each(function (i, item) {
                    // Don't validate items without rules
                    if (!validator.objectLength($(item).rules())) return true;

                    if (!$(item).valid()) isValid = false;
                });

            // If any control is the group fails, prevent default actions (aka: Submit)

            return isValid;
        },

        newsletter: function () {
            var eo = eat_oye;

            $('#btn-subscribe').on('click', function (event) {
                event.preventDefault();
                $('#btn-subscribe').html('processing');
                $('#btn-subscribe').attr('disabled','true');
                // Validation
                if (eo.validateGroup(event)) {
                    var email = $('#footer-subscriber').val(),
                        $container = $('#subscribe-thankyou'),
                        $form = $('#newsletter-form');

                    $.ajax({
                        url: '/Handler/Actions.aspx/ProcessSubscribers',
                        type: "POST",
                        data: "{'email':'" + email + "','City':'" + $('#cityname').val() + "'}",
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            data = $.parseJSON(data.d);
                            // Success
                            if (data.success) {
                                $form.fadeOut(400, function () {
                                    $container.addClass('alert-success');
                                    $container.find('p').html(data.message);
                                    $container.fadeIn();
                                });
                            }
                            else {
                                $form.fadeOut(400, function () {
                                    $container.addClass('alert-info');
                                    $container.find('h4').html('Go easy tiger!');
                                    $container.find('p').html(data.message);
                                    $container.fadeIn();
                                });
                            }
                        },
                        error: function () {
                            $form.fadeOut(400, function () {
                                $container.addClass('alert-error');
                                $container.find('h4').html('Oops!');
                                $container.find('p').html('Something went wrong.');
                                $container.fadeIn();
                            });
                        }

                    }); //end_ajax

                } // end_if
                else {
                    $('#btn-subscribe').html('Subscribe');
                    $('#btn-subscribe').removeAttr('disabled');
                }

            });
        },

        rating: function () {
            $ratings = $('.item-star-rating');

            $ratings.each(function () {
                var $this = $(this),
                    rating = $this.data('rating'),
                    whole = Math.floor(rating),
                    fraction = rating - whole;

                for (i = 0; i < 5; i++) {
                    if (i < whole)
                        $this.append('<span aria-hidden="true" class="icon-star"></span>');
                    else if (fraction) {
                        $this.append('<span aria-hidden="true" class="icon-star-2"></span>');
                        fraction = false;
                    }
                    else
                        $this.append('<span aria-hidden="true" class="icon-star-3"></span>');
                }
            });
        },

        location_changer: function () {

            $('.changer-button').on('click', function (event) {
                event.preventDefault();

                $head = $('#header');
                $head.toggleClass('opentop');
                $('.changer-button').find('span').toggleClass('icon-caret-up');

                var myNav = navigator.userAgent.toLowerCase();
                if (myNav.indexOf('msie') != -1) {


                    if ($head.hasClass('opentop')) {
                        $('#location-selector').slideToggle(0);
                        $head.css({

                            'border-bottom': '2px solid #bbb'

                        });


                    } else {
                        $('#location-selector').slideToggle(0);

                        $head.css({
                            'border-bottom': 'none'

                        });
                    }


                } else {
                    $('#location-selector').slideToggle();
                }


            });
        },

        

        phone_fader: function () {

            var $this = $('.phone-fader'),
                $text = $('.phone-text', $this),
                $num = $('.phone-no', $this);

            $num.everyTime(2500, 'phone', function () {
                $num.fadeOut(500, function () {
                    $text.fadeIn(500).delay(2000, function () {
                        $text.fadeOut(500, function () {
                            $num.fadeIn(500);
                        });
                    });
                });
            }, 10);
        },

        smooth_scrolling: function () {

            $('a[href^="#"]').not('.no-scroll, .elastislide-list a, .accordion-toggle, .add-to-cart, .flex-direction-nav a').click(function (e) {
                e.preventDefault();
                $target = $(this.hash);

                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top
                }, 500, 'swing', function () {
                    window.location.hash = target;
                });
            });
        }
    };

    // Home
    eat_oye.home_controller = {

        init: function () {
            this.slider();            
            //this.search();            
            //this.searchorder();
            //this.searchhotel();
            
            
            this.how_it_works();
        },

        how_it_works: function () {
            $('#btn-how-work').on('click', function (event) {
                event.preventDefault();
                var $this = $(this),
                    $how = $this.parent().next();

                if ($this.hasClass('active')) {
                    $this.removeClass('active');//.find('span').removeClass('icon-angle-left').addClass('icon-angle-down');
                    $how.animate({ 'left': '100%' }, 'slow');
                    $this.html('<span aria-hidden="true" class="icon-angle-right"></span>How<br /> it works?');
                }
                else {
                    $this.addClass('active');//.find('span').removeClass('icon-angle-down').addClass('icon-angle-left');
                    $how.animate({ 'left': '0%' }, 'slow');
                    $this.html('<span aria-hidden="true" class="icon-angle-right"></span>Why<br />EatOye?');
                }

            });
        },

        slider: function () {

            $('.flexslider', '#slider-wrapper').flexslider({
                controlNav: false,
                directionNav: false,
                useCSS: false,
            });
        },

        search: function () {

            $search = $('.search-field', '#search');
            var data = new Array,
                processing = false;

            if (data.length < 1 && !processing) {
                processing = true;
                var city = $('#cityname').val();
                var otype = $('#outlettype').val();
                $.get('/handler/outlets.aspx?city=' + city + '&OutletType=' + otype, function (response) {
                    response = $.parseJSON(response);

                    for (var i in response) {
                        data.push(response[i]['Name'] + "#" + response[i]['Logo'] + "#" + response[i]['Address']);
                    }

                    $search.typeahead({
                        source: data,
                        items: 4,

                        highlighter: function (item) {
                            parts = item.split('#');
                            cssclass = '';
                            if (parts[1].indexOf('area.png') > 0)
                                cssclass = ' class="search-map"';
                            return '<img' + cssclass + ' src="' + parts[1] + '" /><strong>' + parts[0] + '</strong><br/><span>' + parts[2] + '</span>';
                        },

                        updater: function (item) {
                            var parts = item.split('#');

                            if (parts[1].indexOf('area.png') > 0) {
                                $('.SearchCity').val(parts[2]);
                            }
                            else {
                                $('.SearchCity').val('');
                            }
                            return parts[0];
                        },

                        matcher: function (item) {
                            var parts = item.split('#');
                            if (parts[0].toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                                return true;
                            }
                        }
                    });
                });

            }

            $search.on('keyup', function (event) {
                event.preventDefault();

                if (event.which == 13)
                    $('.search-button', '#search').trigger('mouseover');
                return false;
            });

            $('.search-button', '#search').on('mouseover', function (event) {
                event.preventDefault();
                $(this).addClass('active').next().slideDown();
            });

            $('#search').on('mouseleave', function () {
                $(this).find('.search-options').hide().prev().removeClass('active');
            });
            
           
        },

        searchhotel: function () {
        
            $search = $('.search-fieldnew', '#reservetable');
            var data = new Array,
                processing = false;

            if (data.length < 1 && !processing) {
                processing = false;
                var city = $('#cityname').val();
                var otype = $('#outlettype').val();
                $.get('/handler/outlets.aspx?city=' + city + '&OutletType=d', function (response) {
                    response = $.parseJSON(response);
                    
                    for (var i in response) {
                        data.push(response[i]['Name'] + "#" + response[i]['Logo'] + "#" + response[i]['Address']);
                    }
                    
                    $search.typeahead({
                        source: data,
                        items: 4,

                        highlighter: function (item) {
                            parts = item.split('#');
                            cssclass = '';
                            if (parts[1].indexOf('area.png') > 0)
                                cssclass = ' class="search-map"';
                            
                            return '<img' + cssclass + ' src="' + parts[1] + '" /><strong>' + parts[0] + '</strong><br/><span>' + parts[2] + '</span>';
                            //return '<strong>' + parts[0] + '</strong><br/><span>' + parts[2] + '</span>';
                        },

                        updater: function (item) {
                            var parts = item.split('#');                            

                            if (parts[1].indexOf('area.png') > 0) {
                                $('.SearchCity').val(parts[2]);
                            }
                            else {
                                $('.SearchCity').val('');
                            }
                            return parts[0];
                        },

                        matcher: function (item) {
                            var parts = item.split('#');
                            if (parts[0].toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                                return true;                                
                            }
                        }
                    });
                });

            }

            $search.on('keyup', function (event) {
                event.preventDefault();
                
                if (event.which == 13)
                    $('.search-buttonnew', '#search').trigger('mouseover');
                return false;
            });

            $('.search-buttonnew', '#search').on('mouseover', function (event) {
                event.preventDefault();
                $(this).addClass('active').next().slideDown();
            });

            $('#search').on('mouseleave', function () {
                $(this).find('.search-options').hide().prev().removeClass('active');
            });


        },    

        searchorder: function () {
            
            //    $search = $('#keyword', '#searchhotel');
            $search = $('.search-fieldnew', '#searchhotel');
            
            var data = new Array,                
                processing = false;

            if (data.length < 1 && !processing) {
                processing = true;
                var city = $('#cityname').val();
                var otype = $('#outlettype').val();
                $.get('/handler/outlets.aspx?city=' + city + '&OutletType=r', function (response) {
                    response = $.parseJSON(response);
                    
                    for (var i in response) {
                        data.push(response[i]['Name'] + "#" + response[i]['Logo'] + "#" + response[i]['Address']);
                    }                    
                    
                    $search.typeahead({
                        source: data,
                        items: 4,

                        highlighter: function (item) {
                            parts = item.split('#');
                            cssclass = '';
                            if (parts[1].indexOf('area.png') > 0)
                                cssclass = ' class="search-map"';
                            
                            return '<img' + cssclass + ' src="' + parts[1] + '" /><strong>' + parts[0] + '</strong><br/><span>' + parts[2] + '</span>';
                            //return '<strong>' + parts[0] + '</strong><br/><span>' + parts[2] + '</span>';
                        },                        
                        updater: function (item) {
                            var parts = item.split('#');

                            if (parts[1].indexOf('area.png') > 0) {
                                $('.SearchCity').val(parts[2]);
                            }
                            else {
                                $('.SearchCity').val('');
                            }
                            return parts[0];                            
                        },

                        matcher: function (item) {
                            var parts = item.split('#');
                            if (parts[0].toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                                return true;
                            }
                        }
                    });
                });

            }

            $search.on('keyup', function (event) {
                event.preventDefault();                
                if (event.which == 13)
                    $('.search-buttonnew', '#search').trigger('mouseover');
                return false;
            });

            $('.search-buttonnew', '#search').on('mouseover', function (event) {
                event.preventDefault();
                $(this).addClass('active').next().slideDown();
            });

            $('#search').on('mouseleave', function () {
                $(this).find('.search-options').hide().prev().removeClass('active');
            });


        }


        //*/
    }

    // Listing
    eat_oye.listing_controller = {

        init: function () {
            this.search();
            
            this.load_more();
        },

        load_more: function () {
            $('#listing').on('click', 'a.load-more', function (event) {
                var $this = $(this),
                    href = $this.attr('href'),
                    pos = $this.offset().top - 20;

                $this.prev().show();
                $this.hide();

                $('<div>').load(href + ' #listing-container', function () {
                    $this.parent().remove();
                    $('#listing-container').append($(this).find('#listing-container'));
                    /*****************Reload & Update rating ****************/
                    $ratings = $('#listing-container').find('.item-star-rating');
                    $ratings.html('');
                    $ratings.each(function () {
                        var $this = $(this),
                            rating = $this.data('rating'),
                            whole = Math.floor(rating),
                            fraction = rating - whole;

                        for (i = 0; i < 5; i++) {
                            if (i < whole)
                                $this.append('<span aria-hidden="true" class="icon-star"></span>');
                            else if (fraction) {
                                $this.append('<span aria-hidden="true" class="icon-star-2"></span>');
                                fraction = false;
                            }
                            else
                                $this.append('<span aria-hidden="true" class="icon-star-3"></span>');
                        }
                    });

                    /*********************************/
                    $('html, body').stop().animate({
                        scrollTop: pos
                    }, 1500);
                });
                return false;

            });

            $('#bloglisting').on('click', 'a.load-more', function (event) {
                event.preventDefault();

                var $this = $(this),
                    href = $this.attr('href'),
                    pos = $this.offset().top - 20;

                $this.prev().show();
                $this.hide();

                $('<div>').load(href + ' #bloglisting', function () {
                    $this.parent().remove();
                    $('#bloglisting').append($(this).find('#bloglisting'));
                    $('html, body').stop().animate({
                        scrollTop: pos
                    }, 1500);
                });
                return false;

            });
        },

        search: function () {

            $('#change-location').on('click', function (event) {
                event.preventDefault();
                var $search = $('#search');

                if ($search.hasClass('active')) {
                    $search.removeClass('active');
                    $search.fadeOut();
                }
                else {
                    $search.addClass('active');
                    $search.slideDown();
                }

            });
        }
    }

    // Single
    eat_oye.content_controller = {
        init: function () {
            this.contact_page();
        },

        contact_page: function () {


            var $gmap = $('#google-map', '.contact-page'),
                    initalize = false;

            $('#btn-contact').on('click', function (event) {
                event.preventDefault();
                // Validation
                if (eat_oye.validateGroup(event)) {

                    var cname = $('#cname').val(),
                        cemail = $('#cemail').val(),
                        cphone = $('#cphone').val(),
                        csubject = $('#csubject').val(),
                        cmessage = $('#cmessage').val(),
                        Validate = true;
                    //Remove Pre Validated input styles
                    $('#cname').removeAttr('style');
                    $('#cphone').removeAttr('style');
                    $('#cemail').removeAttr('style');

                    //Validate Form Fields
                    if (cname == "") {
                        $('#cname').attr('style', 'border:1px solid red');
                        Validate = false;
                    }
                    if (cemail == "") {
                        $('#cemail').attr('style', 'border:1px solid red');
                        Validate = false;
                    }
                    if (cphone == "") {
                        $('#cphone').attr('style', 'border:1px solid red');
                        Validate = false;
                    }

                    if (Validate == false)
                    { return; }

                    //Submit Values
                    $.ajax({
                        url: '/Handler/Actions.aspx/ProcessContact',
                        type: "POST",
                        data: "{'name':'" + cname + "','email':'" + cemail + "','phone':'" + cphone + "','subject':'" + csubject + "','message':'" + cmessage + "'}",
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            data = $.parseJSON(data.d);
                            // Success
                            if (data.success) {
                                $('#contact-form').fadeOut(400, function () {
                                    $('#contact-thankyou').fadeIn();
                                });
                            }
                            else {
                                $('#contact-form').fadeOut(400, function () {

                                });
                            }
                        },
                        error: function () {
                            $('#contact-form').fadeOut(400, function () {
                            });
                        }
                    });
                }
            });

            if ($gmap.length > 0 && !initalize) {

                map_coordinates = [$gmap.data('lat'), $gmap.data('long')];
                initalize = true;
                map = $gmap.gmap3({
                    map: {
                        options: {
                            center: map_coordinates,
                            zoom: 15,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            mapTypeControl: false,
                            navigationControl: true,
                            scrollwheel: false,
                            streetViewControl: false
                        }
                    },
                    marker: {
                        latLng: map_coordinates,
                        options: {
                            icon: new google.maps.MarkerImage(
                                '/assets/img/map_marker1.png', null, null, null,
                                new google.maps.Size(34, 40, "px", "px")
                            ),
                            shadow: new google.maps.MarkerImage(
                                '/assets/img/map_marker_shadow1.png',
                                new google.maps.Size(55, 40),
                                new google.maps.Point(0, 0),
                                new google.maps.Point(17, 40)
                            )
                        }
                    },
                    circle: {
                        options: {
                            center: map_coordinates,
                            radius: 100,
                            fillColor: '#F86E01',
                            fillOpacity: .19,
                            strokeWeight: 0
                        }
                    }
                });
            }
        }
    }


    /**/
    /* Designers Customization*/




    $('.newpin').stickyfloat({ startOffset: 360, duration: 0, delay: 0 });
    $('.cartpinned').stickyfloat({ startOffset: 300, duration: 0, delay: 0 });
    $('.pinned').stickyfloat({ startOffset: 60, duration: 0, delay: 0 });
    $('.sticky-review').stickyfloat({ startOffset: 360, duration: 0, delay: 0 });
    /*jQuery(document).ready(function () {
        window.onscroll = function () {
            if (window.pageYOffset >= 378) {
                jQuery('.cartpinned').css({ margin-top: '75px;'});
            stickyfloat
            else {
                jQuery('.cartpinned').css({ margin-top: '0'});
            }
        }
    });*/

    //active state  
    $(function () {
        $('ul.nav-pills li').click(function (e) {
            //e.preventDefault();
            $('li').removeClass('active');
            $(this).addClass('active');
        });


    });

    $('ul.nav-pills li a[href^="#"]').bind('click.smoothscroll', function (e) {
        var target = this.hash,
        $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 40
        }, 900, 'swing', function () {
            window.location.hash = target;
        });

    });

    // Go to Section
    $(document).ready(function () {
        $('a.scrollbottom').click(function () {
            $('body,html').animate({
                scrollTop: 500
            }, 800);
            return false;
        });

    });



    function create(template, vars, opts) {
        return $notiContainer.notify("create", template, vars, opts);
    }
    $(function () {
        $notiContainer = $("#noti-container").notify();
        $("#notify_click").click(function () {
            var n = create("notify_01", { title: 'Notification', text: 'This is a simple notification you can put your message here via javascript.' }, {
                expires: false
            });
            n.widget().delegate("input", "click", function () {
                n.close();
            });
        });
    });



    $("#accordion > li").click(function () {
        if (false == $(this).next().is(':visible')) {
            $('#accordion > ul').slideUp(300);
        }
        $(this).next().slideToggle(300);
    });
    $('#accordion > ul:eq(0)').show();


    // Single
    eat_oye.single_controller = {

        init: function () {
            this.tabs();
            this.add_to_cart();
            this.range_slider();
            this.ratings();
            this.reservation();

            var hash = window.location.hash;
            /*
            hash && $('ul.item-tabs a[href="' + hash + '"]').tab('show');
        
            $( '.nav-pills li', '#menu' ).eq(1).addClass( 'active' );
            
            $( '.tab-pane:first-child', '#menu' ).addClass( 'active in' );*/
        },




        reservation: function () {

            $('#btnBack').on('click', function (event) {
                $('#reservation_error').fadeOut();
                $form = $('#reservation-form');
                $form.fadeIn();
            });


            $('#ctl00_BodyContent_SearchArea').on('click', function (event) {
                event.preventDefault();
                var keyword = $('#ctl00_BodyContent_ddlsearch1').val();
                
                $.ajax({
                    url: '/Handler/Actions.aspx/ProcessSearch',
                    type: "POST",
                    data: "{'SearchKeyword':'" + keyword + "','SearchType':'delivery'}",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (data) {
                        // Success
                        
                        window.location = data.d;
                        
                    },
                    error: function () {
                       // alert('error');
                    }
                }); //end_ajax

            });


            $('#ctl00_BodyContent_SearchReserve').on('click', function (event) {
                event.preventDefault();
                var keyword = $('#ctl00_BodyContent_ddlsearch2').val();
                
                $.ajax({
                    url: '/Handler/Actions.aspx/ProcessSearch',
                    type: "POST",
                    data: "{'SearchKeyword':'" + keyword + "','SearchType':'reservation'}",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (data) {
                        // Success

                        window.location = data.d;

                    },
                    error: function () {
                       // alert('error');
                    }
                }); //end_ajax

            });
            

            $('#subscribe').click(function () {
                var targetOffset = $('#footer-subscriber').offset().top;
                $('html, body').animate({ scrollTop: targetOffset }, 'slow');
            });

            $('#btn-reservation').on('click', function (event) {
                event.preventDefault();
                $('#btn-reservation').html('processing..');
                $('#btn-reservation').attr('disabled','true');
                // Validation
                if (eat_oye.validateGroup(event)) {
                    var day = $('#ctl00_BodyContent_ddlDay').val(),
                        time = $('#ctl00_BodyContent_ddlTime').val(),
                        pax = $('.guests-slider').val(),
                        uname = $('#full-name').val(),
                        umobile = $('#phone').val(),
                        srequest = $('#txtRequest').val(),
                        $thanks = $('#thank-you'),
                        $container = $('.alert', $thanks),
                        $form = $('#reservation-form');

                    $.ajax({
                        url: '/Handler/Actions.aspx/ProcessReservation',
                        type: "POST",
                        data: "{'oid':'" + $('#outletid').val() + "','oname':'" + $('#outletname').val() + "','username':'" + uname + "','usernumber':'" + umobile + "','ReservationDateTime':'" + day + " " + time + "','SpecialRequest':'" + srequest + "','pax':'" + pax + "'}",
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            data = $.parseJSON(data.d);

                            // Success
                            if (data.success) {
                                $form.fadeOut(400, function () {

                                    var message = $container.html();
                                    message = message.replace("{Name}", uname).replace("{PAX}", pax).replace("{Reservation_Date}", day).replace("{Reservation_Time}", time);
                                    $container.addClass('alert-success');
                                    $container.html(message);
                                    $thanks.fadeIn();
                                });
                            }
                            else {
                                $form.fadeOut(400, function () {
                                    //$container.addClass('alert-error');
                                    //$container.html('<h4>Oops!</h4><p>Something went wrong.</p>');
                                    // $thanks.fadeIn();
                                    $('#btn-reservation').html('Complete free reservation');
                                    $('#btn-reservation').removeAttr('disabled');
                                    $('#reservation_error').fadeIn();
                                });
                            }

                        },
                        error: function () {

                            $form.fadeOut(400, function () {
                                //$container.addClass( 'alert-error' );
                                //$container.html( '<h4>Oops!</h4><p>Something went wrong.</p>' );
                                //$thanks.fadeIn();
                                $('#btn-reservation').html('Complete free reservation');
                                $('#btn-reservation').removeAttr('disabled');
                                $('#reservation_error').fadeIn();
                            });
                        }
                    }); // end_ajax
                } // end_if
                else {
                    $('#btn-reservation').html('Complete free reservation');
                    $('#btn-reservation').removeAttr('disabled');
                }
            });
        },

        ratings: function () {

            $('#btn-review').on('click', function (event) {
                event.preventDefault();

                // Validation
                if (eat_oye.validateGroup(event)) {
                    var userreviewname = $('#txtName').val(),
                        userphnumber = $('#txtMobile').val(),
                        userreview = $('#txtReview').val().replace(/'/g, ''),
                        userrating = $('.experience-slider').val(),
                        $container = $('#review-thankyou'),
                        $form = $('#review-form');
                   // alert(userreview);
                    $.ajax({
                        url: '/Handler/Actions.aspx/ProcessReview',
                        type: "POST",
                        data: "{'oid':'" + $('#outletid').val() + "','username':'" + userreviewname + "','usernumber':'" + userphnumber + "','Review':'" + userreview + "','userrating':'" + userrating + "'}",
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            data = $.parseJSON(data.d);
                            // Success
                            if (data.success) {
                                $form.fadeOut(400, function () {
                                    $container.addClass('alert-success');
                                    $container.find('p').html(data.message);
                                    $container.fadeIn();
                                });

                                var message = $container.html();
                                $container.html(message.replace("{Name}", userreviewname));
                                $container.fadeIn();
                            }
                        },
                        error: function () {
                            $form.fadeOut(400, function () {
                                $container.addClass('alert-error');
                                $container.html('<h4>Oops!</h4><p>Something went wrong.</p>');
                                $container.fadeIn();
                            });
                        }
                    }); //end_ajax

                } // enf_if
            });
        },



        add_to_cart: function () {

            function LoadData(URL) {
                $('<div>').load(URL, function () {

                    var options = $(this).find('.ItemOptions').html();
                    $('#ItemOptions').html(options);

                    var htm = $(this).find('.CartArea').html();
                    //$('#CartWidget').fadeOut();
                    $('#CartWidget').html(htm);
                    //$('#CartWidget').fadeIn();
                    var Total = parseInt($('#TotalAmount').html().replace('Rs.', ''));

                    if (Total >= $('#MinOrder').val() && Total > $('#deliveryfeenew').val()) {
                        $('#BtnOrder').removeAttr('disabled');
                        $('#minordernote').addClass('hide');

                    }
                    else {
                        $('#BtnOrder').attr('disabled', 'true');
                        $('#minordernote').removeClass('hide');
                    }
                });
            }

            $('.add-to-cart').click(function (event) {
                event.preventDefault();

                var ItemID = $(this).parent().parent().find('#ItemID').val();
                var SizeID = $(this).parent().parent().find('#SizeID').val();
                var ItemPrice = $(this).parent().parent().find('#ItemPrice').val();
                var OutletID = $('#outletid').val();
                $('#CartWidget').show();
                $('#BtnOrder').show();
                $('#OrderForm').hide();
                $('#OrderSuccess').hide();

                LoadData('/Handler/Cart.aspx?ItemID=' + ItemID + '&SizeID=' + SizeID + '&Price=' + ItemPrice + '&Qty=1&OutletID=' + OutletID);
            });


            $('#ItemOptions').on('click', '#AddOption', function (event) {
                var passURL = $('#PageURL').val();
                var Options = $('#ItemOptions :input').serialize();
                var nme = $("input[class='required']").attr('name');

                var validate = true;
                $('#ItemOptions').find('.Option').find("input[class='required']").each(function (i, item) {
                    var nme = $(item).attr('name');

                    if ($("input[name='" + nme + "']:checked").length < 1) {
                        $(item).parent().attr('style', 'color:red');
                        validate = false;
                    }
                    else { validate = true; }

                });

                if (validate) {
                    LoadData(passURL + '&Optslt=1&' + Options);
                }

            });

            $("input[name='OrderType']").click(function (event) {
                if ($("input[name='OrderType']:checked").val() == 'Delivery') {

                    $('#pickupblock').hide();
                    $('#deliveryblock').slideDown();

                }
                else {
                    $('#deliveryblock').slideUp();
                    $('#pickupblock').show();
                }
            });

            $('#ItemOptions').on('click', '#CancelOption', function (event) {
                $('.Modal').fadeOut('slow');
            });

            $('.closebox').on('click', function (event) {
                $('.Modal').fadeOut('slow');
            });

            $('input:radio.required').each(function () {
                var sThisVal = (this.checked ? $(this).val() : "");
            });

            $('#CartWidget').on('click', '.add', function (event) {
                event.preventDefault();
                var Cid = $(this).parent().find('#cartid').val();
                var qty = $(this).parent().find('.qty-box').val();
                var newqty = parseInt(qty) + 1;
                var OutletID = $('#outletid').val();
                LoadData('/Handler/Cart.aspx?CartID=' + Cid + '&Qty=' + newqty + '&OutletID=' + OutletID);
            });


            $('#CartWidget').on('click', '.minus', function (event) {
                event.preventDefault();
                var Cid = $(this).parent().find('#cartid').val();
                var qty = $(this).parent().find('.qty-box').val();
                var OutletID = $('#outletid').val();
                var newqty = parseInt(qty) - 1;
                LoadData('/Handler/Cart.aspx?CartID=' + Cid + '&Qty=' + newqty + '&OutletID=' + OutletID);
            });

            $('#CartWidget').on('click', '#clearcart', function (event) {
                event.preventDefault();
                var Cid = $(this).parent().find('#cartid').val();
                var OutletID = $('#outletid').val();
                LoadData('/Handler/Cart.aspx?CartID=' + Cid + '&empty=true&OutletID=' + OutletID);
            });

            $('#CartWidget').on('click', '.enable-request', function (event) {
                $(this).fadeOut(300);
                $('.extrascont').slideDown();
            });


            $('#CartWidget').on('change', '#DeliveryArea', function (event) {
                event.preventDefault();

                var OutletID = $('#outletid').val();

                LoadData('/Handler/Cart.aspx?OutletID=' + OutletID + '&Area=' + $(this).val().replace(/ /g, '-'));
            });

            $("#searchhotel").hover(function () {
                $(this).addClass("expand");
                $(this).removeClass("shrunk");
                $("#reservetable").addClass("shrunk");
                $("#reservetable").removeClass("expand");
               // $(".chzn-select").trigger("liszt:open");
            });

            $("#reservetable").hover(function () {
                $(this).addClass("expand");
                $(this).removeClass("shrunk");
                $("#searchhotel").addClass("shrunk");
                $("#searchhotel").removeClass("expand");
                //$(".chzn-select").trigger("liszt:open");
            });

            $('#ShowRemarks').click(function (event) {
                event.preventDefault();
                $('#Remarks').slideToggle();
                $('#ShowRemarks').hide();
                $('#Coupon').hide();
                $('#showCoupon').show();

            });
            $('#showCoupon').click(function (event) {
                event.preventDefault();
                $('#Coupon').slideToggle();
                $('#showCoupon').hide();
                $('#Remarks').hide();
                $('#ShowRemarks').show();


            });
            $('#coupon-btn').click(function (event) {
                event.preventDefault();
            });

            $('#BtnOrder').click(function (event) {
                event.preventDefault();

                if ($('#DeliveryArea').val() != '') {
                    $('#BtnOrder').hide();
                    $('#calltext').hide();

                    $('#CartWidget').fadeOut(400, function () {
                        $('#DeliveryArea').removeClass('field-error');
                        $('#OrderForm').fadeIn('slow');
                        $('#deliveryaddress').html($('#DeliveryArea').val() + ', ' + $('#city').val());
                    });
                }
                else {
                    $('#DeliveryArea').addClass('field-error');
                }
            });

            $('#btnBackOrder').click(function (event) {
                event.preventDefault();

                $('#OrderForm').fadeOut(400, function () {
                    $('#CartWidget').fadeIn('slow');
                    $('#BtnOrder').fadeIn('slow');
                });
            });

            $('#BtnPlaceOrder').click(function (event) {
                event.preventDefault();
                $('#BtnPlaceOrder').html('Processing..');
                $('#BtnPlaceOrder').attr('disabled', 'true');
                // Validation
                if (eat_oye.validateGroup(event)) {
                    var OutletID = $('#outletid').val(),
                        username = $('#OrderUser').val(),
                        usernum = $('#OrderUserPhone').val(),
                        deliveryfee = $('#deliveryfeenew').val(),
                        outletname = $('#outletname').val(),
                        remarks = $('#Remarks').val(),
                        ordertype = $("input[name='OrderType']:checked").val(),
                        totalamount = $('#TotalAmount').html(),
                        deliveryaddress = $('#DeliveryAddress').val().replace(/'/g, ''),
                        DeliveryArea = $('#DeliveryArea').val(),
                        notes = $('#Remarks').val().replace(/'/g, ''),
                        outlettax = $('#outlettax').val(),
                        outletdiscount = $('#outletdiscountvalue').val(),
                        deliverytime = $('#deliverytime').html();
                   
                    if ($("input[name='OrderType']:checked").val() != 'Delivery') {
                        deliveryfee = "0";
                    }

                    $.ajax({
                        url: '/Handler/Actions.aspx/ProcessOrder',
                        type: "POST",
                        data: "{'OutletID':'" + OutletID + "','OutletName':'" + outletname + "','CustomerName':'" + username + "','CustomerPhone':'" + usernum + "','DeliveryAddress':'" + deliveryaddress + "','DeliveryFee':'" + deliveryfee + "','OrderType':'" + ordertype + "','DeliveryArea':'" + DeliveryArea + "','Notes':'" + notes + "','discount':'"+outletdiscount+"','otherdiscount':'0','tax':'"+outlettax+"'}",
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            data = $.parseJSON(data.d);
                            // Success
                            if (data.success) {
                                $('#OrderForm').fadeOut(400, function () {
                                    $('#orderaddress').html('<strong>Pickup Address:</strong> ' + $('#pickupblock').html().replace('Pick Up Address', ''));
                                    if (ordertype == 'Delivery') {
                                        $('#orderaddress').html('<strong>Delivery Address:</strong> ' + deliveryaddress);
                                    }

                                    $('#OrderSuccess').html($('#OrderSuccess').html().replace('{name}', username).replace('{orderamount}', totalamount).replace('{deliverytime}', deliverytime));
                                    $('#OrderSuccess').fadeIn('slow');
                                });
                            }
                        },
                        error: function () {
                            alert('Error');
                        }
                    }); //end_ajax

                } // enf_if
                else {
                    $('#BtnPlaceOrder').html('Place Order');
                    $('#BtnPlaceOrder').removeAttr('disabled');
                }
            });
        },


        range_slider: function () {

            $label = $('.guest-label');
            $('.guests-slider').noUiSlider({
                range: [2, 31],
                start: 2,
                handles: 1,
                step: 1,
                connect: 'lower',
                slide: function () {
                    val = $(this).val();

                    if (val > 30)
                        $label.html('30+ Guests');
                    else
                        $label.html(val + ' Guests');
                }
            });

            $experience = $('.experience-slider');
            $experience.noUiSlider({
                range: [1, 5],
                handles: 1,
                start: 4,
                step: 1,
                connect: 'lower',
                slide: function () {
                    var $this = $(this),
                        $strong = $this.prev().find('strong'),
                        val = $this.val();

                    switch (val) {
                        default:
                        case 1:
                            $strong.html('Poor');
                            break;
                        case 2:
                            $strong.html('Fair');
                            break;
                        case 3:
                            $strong.html('Good');
                            break;
                        case 4:
                            $strong.html('Very Good');
                            break;
                        case 5:
                            $strong.html('Excellent');
                            break;
                    }
                }
            });
        },

        tabs: function () {

            $('.item-tabs a', '#single-outlet').on('shown', function (e) {

                var $gmap = $('#google-map'),
                    initalize = false;

                if ('#reservation' == e.target.hash && $gmap.length > 0 && !initalize) {

                    map_coordinates = [$gmap.data('lat'), $gmap.data('long')];
                    initalize = true;
                    map = $gmap.gmap3({
                        map: {
                            options: {
                                center: map_coordinates,
                                zoom: 15,
                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                mapTypeControl: false,
                                navigationControl: true,
                                scrollwheel: false,
                                streetViewControl: false
                            }
                        },
                        marker: {
                            latLng: map_coordinates,
                            options: {
                                icon: new google.maps.MarkerImage(
                                    '/assets/img/map_marker1.png', null, null, null,
                                    new google.maps.Size(34, 40, "px", "px")
                                ),
                                shadow: new google.maps.MarkerImage(
                                    '/assets/img/map_marker_shadow1.png',
                                    new google.maps.Size(55, 40),
                                    new google.maps.Point(0, 0),
                                    new google.maps.Point(17, 40)
                                )
                            }
                        },
                        circle: {
                            options: {
                                center: map_coordinates,
                                radius: 100,
                                fillColor: '#F86E01',
                                fillOpacity: .19,
                                strokeWeight: 0
                            }
                        }
                    });
                }
            });

            $('.item-tabs .active a', '#single-outlet').trigger('shown');
        }
    };

    // Init Engine
    $(document).ready(function () {
        eat_oye.init();
        //$.lockfixed("#pinned", { offset: { top: 80, bottom: 300 } });
        //$.lockfixed(".newpin", { offset: { top: 80, bottom: 300 } });
        //$.lockfixed(".cartpinned", { offset: { top: 90, bottom: 310 } });
        var OutletID = $('#outletid').val();
        if (typeof OutletID != 'undefined') {
            $('<div>').load('/Handler/Cart.aspx?OutletID=' + OutletID + '#CartArea', function () {
                var htm = $(this).find('.CartArea').html();

                $('#CartWidget').html(htm);

                var Total = parseInt($(this).find('#TotalAmount').html().replace('Rs.', ''));

                if (Total >= $('#MinOrder').val() && Total > $('#deliveryfeenew').val()) {
                    $('#BtnOrder').removeAttr('disabled');
                    $('#minordernote').addClass('hide');
                }
                else {
                    $('#BtnOrder').attr('disabled', 'true');
                    $('#minordernote').removeClass('hide');
                }
            });
        }

    });

    $(window).load(function () {
    
        //eat_oye.home_controller.searchorder();
        //eat_oye.home_controller.searchhotel();
      //  eat_oye.home_controller.search();
    });

})(jQuery);