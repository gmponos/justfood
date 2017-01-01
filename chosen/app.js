/**
 * Eat Oye
 */

/**
 * Delay
 * Creates a way to delay events
 */
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
                cursorcolor: "#8C0B00",
                cursorwidth: "7px",
                cursorborder: "1px solid #8C0B00",
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
            var isValid = true;
            var validator = $("#aspnetForm").validate();
            //var validator = $("#MainForm").validate();

            var settings = validator.settings;
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
                $('#btn-subscribe').attr('disabled', 'true');
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
                // ------------------------------------------- START ---------------------------------------------------------------------------------------
                // Added By     : Junaid Hassan 
                // Dated        : 2013-12-04
                // JIRA Task ID : EAT-100 Load More Function on Search Pages not working correctly or # outlet count not being shown correctly
                href = href.replace(/\s/g, "%20");
                // ------------------------------------------- END ---------------------------------------------------------------------------------------

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

                    /////////////////////////////////////// START /////////////////////////////////////////////////////////////////////
                    //// Added By : Junaid Hassan 
                    //// Dated    : 2013-12-02
                    //// Purpose  : call Search When more Data Loaded from server.                    
                    // JIRA ID      : EAT-179  // http://support.arpatech.com/browse/EAT-179
                    var searchTerm = $("#search-text").val('');
                    /////////////////////////////////////// END /////////////////////////////////////////////////////////////////////

                    /////////////////////////////////////// START /////////////////////////////////////////////////////////////////////
                    //// Added By : Junaid Hassan 
                    //// Dated    : 2013-12-02
                    //// Purpose  : call Search When more Data Loaded from server.                    
                    // JIRA ID      : EAT-98  // http://support.arpatech.com/browse/EAT-98                    
                    JqueryLiveSearch();
                    /////////////////////////////////////// END /////////////////////////////////////////////////////////////////////

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

            /*            $('#change-location').on('click', function (event) {
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
            
                        });*/
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
                            fillColor: '#8C0B00',
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
                scr
            });

            $('#btn-reservation').on('click', function (event) {
                event.preventDefault();
                $('#btn-reservation').html('processing..');
                $('#btn-reservation').attr('disabled', 'true');
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
            // OLD EAT-146
            //function LoadData(URL) {
            //    $('<div>').load(URL, function () {

            //        alert('here 1');

            //        var options = $(this).find('.ItemOptions').html();
            //        $('#ItemOptions').html(options);

            //        var htm = $(this).find('.CartArea').html();

            //        //$('#CartWidget').fadeOut();
            //        $('#CartWidget').html(htm);
            //        //$('#CartWidget').fadeIn();

            //        var ele = $('#CartWidget').find('.cart-items');                    
            //            ele.stop().animate({
            //                scrollTop: ele[0].scrollHeight
            //            }, 100);                   

            //        var Total = parseInt($('#TotalAmount').html().replace('Rs.', ''));

            //        // --------------------------------------------------------- START ----------------------------------------------------------------------------            
            //        //Added BY        : Junaid Hassan
            //        //Dated           : 2013-11-21
            //        // purpose Add the OrderType in QueryString
            //        //Jira Task ID    : EAT-73--
            //        var OrderType = 'Delivery';
            //        OrderType = $('#hdnOrderType').val();                    
            //        // --------------------------------------------------------- END ----------------------------------------------------------------------------            

            //        if (OrderType == 'Delivery') {
            //            $('#DivDeliveryArea').show();

            //            if (Total >= $('#MinOrder').val() && Total > $('#deliveryfeenew').val()) {

            //                $('#BtnOrder').removeAttr('disabled');
            //                $('#minordernote').addClass('hide');

            //            }
            //            else {
            //                $('#BtnOrder').attr('disabled', 'true');
            //                $('#minordernote').removeClass('hide');
            //            }
            //        }
            //        else {
            //            $('#DivDeliveryArea').hide();

            //            if (Total > 0) {
            //                $('#BtnOrder').removeAttr('disabled');
            //                $('#minordernote').addClass('hide');

            //            }
            //            else {
            //                $('#BtnOrder').attr('disabled', 'true');
            //                $('#minordernote').removeClass('hide');
            //            }

            //        }
            //    });
            //}
            // OLD EAT-146

            function LoadData(URL) {

                var ele = $('#CartWidget').find('.cart-items');


                $("<div>").load(URL, function () {

                    var options = $(this).find('.ItemOptions').html();
                    $('#ItemOptions').html(options);

                    var htm = $(this).find('.CartArea').html();
                    //$('#CartWidget').fadeOut();
                    $('#CartWidget').html(htm);
                    //$('#CartWidget').fadeIn();

                    var Total = parseInt($('#TotalAmount').html().replace('Rs.', ''));

                    // --------------------------------------------------------- START ----------------------------------------------------------------------------            
                    //Added BY        : Junaid Hassan
                    //Dated           : 2013-11-21
                    // purpose Add the OrderType in QueryString
                    //Jira Task ID    : EAT-73--
                    var OrderType = 'Delivery';
                    OrderType = $('#hdnOrderType').val();
                    // --------------------------------------------------------- END ----------------------------------------------------------------------------            

                    if (OrderType == 'Delivery') {
                        $('#DivDeliveryArea').show();
                        $('#DivDeliveryfee').show();
                        $('#liDeliveryTime').show();
                        $('#liDeliveryFee').show();
                        $('#liMinOrder').show();
                        $('#li1').hide();
                        $('#li2').hide();
                        $('#li3').hide();

                        if (Total >= $('#MinOrder').val() && Total > $('#deliveryfeenew').val()) {

                            $('#BtnOrder').removeAttr('disabled');
                            $('#minordernote').addClass('hide');

                        }
                        else {
                            $('#BtnOrder').attr('disabled', 'true');
                            $('#minordernote').removeClass('hide');
                        }
                    }
                    else {
                        $('#DivDeliveryArea').hide();
                        $('#DivDeliveryfee').hide();
                        $('#liDeliveryTime').hide();
                        $('#liDeliveryFee').hide();
                        $('#liMinOrder').hide();
                        $('#li1').show();
                        $('#li2').show();
                        $('#li3').show();

                        if (Total > 0) {
                            $('#BtnOrder').removeAttr('disabled');
                            $('#minordernote').addClass('hide');

                        }
                        else {
                            $('#BtnOrder').attr('disabled', 'true');
                            $('#minordernote').removeClass('hide');
                        }

                    }


                });







            }

            $('.add-to-cart').click(function (event) {
                event.preventDefault();

                var ItemID = $(this).parent().parent().find('#ItemID').val();
                var SizeID = $(this).parent().parent().find('#SizeID').val();
                var ItemPrice = $(this).parent().parent().find('#ItemPrice').val();
                var OutletID = $('#outletid').val();
                $('#cartarea').show();
                $('#BtnOrder').show();
                $('#OrderForm').hide();
                $('#OrderSuccess').hide();

                // --------------------------------------------------------- START ----------------------------------------------------------------------------            
                //Added BY        : Junaid Hassan
                //Dated           : 2013-11-21
                // purpose Add the OrderType in QueryString
                //Jira Task ID    : EAT-73--
                var OrderType = 'Delivery';
                OrderType = $('#hdnOrderType').val();
                // --------------------------------------------------------- END ----------------------------------------------------------------------------            

                LoadData('/Handler/Cart.aspx?ItemID=' + ItemID + '&SizeID=' + SizeID + '&Price=' + ItemPrice + '&Qty=1&OutletID=' + OutletID + '&OrderType=' + OrderType);


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
                    else {
                        //Commented and added by Aman Mansoor for EAT-52 (validation issue)
                        //validate = true;
                        $(item).parent().attr('style', 'color:black');
                    }

                });

                if (validate) {
                    LoadData(passURL + '&Optslt=1&' + Options);
                }

            });



            //START
            //Added BY        : Junaid Hassan
            //Dated           : 2013-11-21
            //Purpose         : This Function Moved to Handler\Cart.aspx as It was not firing from there on Outlet Page.
            //Jira Task ID    : EAT-73
            // ---------------------------------------------------------------------------------------------------------------------------------------
            ///// Order type Radio Button 
            //$("input[name='OrderType']").click(function (event) {

            //    alert('Radio Button');

            //    if ($("input[name='OrderType']:checked").val() == 'Delivery') {



            //        $('#pickupblock').hide();
            //        $('#deliveryblock').slideDown();
            //        var OutletID = $('#outletid').val();
            //        $('<div>').load('/Handler/Cart.aspx?OutletID=' + OutletID + '#CartArea', function () {
            //            var htm = $(this).find('.CartArea').html();


            //            document.getElementById('hdnOrderType').value = htm;

            //            $('#CartWidget').html(htm);

            //            var Total = parseInt($(this).find('#TotalAmount').html().replace('Rs.', ''));

            //            if (Total >= $('#MinOrder').val() && Total > $('#deliveryfeenew').val()) {
            //                $('#BtnOrder').removeAttr('disabled');
            //                $('#minordernote').addClass('hide');
            //            }
            //            else {
            //                $('#BtnOrder').attr('disabled', 'true');
            //                $('#minordernote').removeClass('hide');
            //            }
            //        });

            //    }
            //    else {
            //        alert($('#hdnMinOrder').val());

            //        $('#deliveryblock').slideUp();

            //        $('#pickupblock').show();
            //        $('#BtnOrder').removeAttr('disabled');

            //    }
            //});

            // ---------------------------------------------------------------------------------------------------------------------------------------


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

                // --------------------------------------------------------- START ----------------------------------------------------------------------------            
                //Added BY        : Junaid Hassan
                //Dated           : 2013-11-21
                // purpose Add the OrderType in QueryString
                //Jira Task ID    : EAT-73--
                var OrderType = 'Delivery';
                OrderType = $('#hdnOrderType').val();
                // --------------------------------------------------------- END ----------------------------------------------------------------------------            

                LoadData('/Handler/Cart.aspx?CartID=' + Cid + '&Qty=' + newqty + '&OutletID=' + OutletID + '&OrderType=' + OrderType);

            });


            $('#CartWidget').on('click', '.minus', function (event) {
                event.preventDefault();
                var Cid = $(this).parent().find('#cartid').val();
                var qty = $(this).parent().find('.qty-box').val();
                var OutletID = $('#outletid').val();
                var newqty = parseInt(qty) - 1;

                // --------------------------------------------------------- START ----------------------------------------------------------------------------            
                //Added BY        : Junaid Hassan
                //Dated           : 2013-11-21
                // purpose Add the OrderType in QueryString
                //Jira Task ID    : EAT-73--
                var OrderType = 'Delivery';
                OrderType = $('#hdnOrderType').val();
                // --------------------------------------------------------- END ----------------------------------------------------------------------------            

                LoadData('/Handler/Cart.aspx?CartID=' + Cid + '&Qty=' + newqty + '&OutletID=' + OutletID + '&OrderType=' + OrderType);
            });

            $('#CartWidget').on('click', '#clearcart', function (event) {
                event.preventDefault();
                var Cid = $(this).parent().find('#cartid').val();
                var OutletID = $('#outletid').val();

                // --------------------------------------------------------- START ----------------------------------------------------------------------------            
                //Added BY        : Junaid Hassan
                //Dated           : 2013-11-21
                // purpose Add the OrderType in QueryString
                //Jira Task ID    : EAT-73--
                var OrderType = 'Delivery';
                OrderType = $('#hdnOrderType').val();
                // --------------------------------------------------------- END ----------------------------------------------------------------------------            

                LoadData('/Handler/Cart.aspx?CartID=' + Cid + '&empty=true&OutletID=' + OutletID + '&OrderType' + OrderType);
            });

            $('#CartWidget').on('click', '.enable-request', function (event) {
                $(this).fadeOut(300);
                $('.extrascont').slideDown();
            });


            $('#CartWidget').on('change', '#DeliveryArea', function (event) {
                event.preventDefault();

                var OutletID = $('#outletid').val();

                // --------------------------------------------------------- START ----------------------------------------------------------------------------            
                //Added BY        : Junaid Hassan
                //Dated           : 2013-11-21
                // purpose Add the OrderType in QueryString
                //Jira Task ID    : EAT-73--
                var OrderType = 'Delivery';
                OrderType = $('#hdnOrderType').val();
                // --------------------------------------------------------- END ----------------------------------------------------------------------------            

                LoadData('/Handler/Cart.aspx?OutletID=' + OutletID + '&Area=' + $(this).val().replace(/ /g, '-') + '&OrderType=' + OrderType);
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

                if ($('#DeliveryArea').val() != '' || $("input[name='OrderType']:checked").val() != 'Delivery') {
                    $('#BtnOrder').hide();
                    $('#calltext').hide();

                    $('#cartarea').fadeOut(400, function () {
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
                    $('#cartarea').fadeIn('slow');
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
                        deliverytime = $('#Span2').html();
                    }


                    //outletname = outletname.replace("'", "");
                    username = username.replace('"', '');
                    deliveryaddress = deliveryaddress.replace('"', '');
                    DeliveryArea = DeliveryArea.replace('"', '');
                    //notes = notes.replace("'", "");


                    // alert('{"OutletID":"' + OutletID + '","OutletName":"' + outletname + '","CustomerName":"' + username + '","CustomerPhone":"' + usernum + '","DeliveryAddress":"' + deliveryaddress + '","DeliveryFee":"' + deliveryfee + '","OrderType":"' + ordertype + '","DeliveryArea":"' + DeliveryArea + '","Notes":"' + notes + '","discount":"' + outletdiscount + '","otherdiscount":"0","tax":"' + outlettax + '","deliverytime":"' + deliverytime + '"}');
                    // data: "{'OutletID':'" + OutletID + "','OutletName':'" + outletname + "','CustomerName':'" + username + "','CustomerPhone':'" + usernum + "','DeliveryAddress':'" + deliveryaddress + "','DeliveryFee':'" + deliveryfee + "','OrderType':'" + ordertype + "','DeliveryArea':'" + DeliveryArea + "','Notes':'" + notes + "','discount':'" + outletdiscount + "','otherdiscount':'0','tax':'" + outlettax + "','deliverytime':'" + deliverytime + "'}",
                    $.ajax({
                        url: '/Handler/Actions.aspx/ProcessOrder',
                        type: "POST",
                        data: '{"OutletID":"' + OutletID + '","OutletName":"' + outletname + '","CustomerName":"' + username + '","CustomerPhone":"' + usernum + '","DeliveryAddress":"' + deliveryaddress + '","DeliveryFee":"' + deliveryfee + '","OrderType":"' + ordertype + '","DeliveryArea":"' + DeliveryArea + '","Notes":"' + notes + '","discount":"' + outletdiscount + '","otherdiscount":"0","tax":"' + outlettax + '","deliverytime":"' + deliverytime + '"}',
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            data = $.parseJSON(data.d);

                            // Success
                            if (data.success) {
                                $('#OrderForm').fadeOut(400, function () {

                                    // alert($('#pickupblock').html());

                                    $('#orderaddress').html('<strong>Pickup Address</strong> ' + $('#pickupblock').html().replace('Pick Up Address', ''));
                                    if (ordertype == 'Delivery') {
                                        $('#orderaddress').html('<strong>Delivery Address:</strong> ' + deliveryaddress);
                                    }

                                    $('#OrderSuccess').html($('#OrderSuccess').html().replace('{name}', username).replace('{orderamount}', totalamount).replace('{deliverytime}', deliverytime).replace('{NewOrderID}', data.NewOrderID));
                                    $('#OrderSuccess').fadeIn('slow');
                                });
				// ////////////////////////////////// START //////////////////////////////////////////////////////////////////////////////////
                                // Added By     : Junaid Hassan 
                                // Dated        : 2014-01-10
                                // Jira         : EAT-283
                                $('#BtnPlaceOrder').html('Place Order');
                                $('#BtnPlaceOrder').removeAttr('disabled');
                                // ////////////////////////////////// END  //////////////////////////////////////////////////////////////////////////////////

                            }
                                //Added By Aman Mansoor on 28-Nov-2013 for displaying message if order is not saved (Issue # EAT-97)
                            else {

                                $('#OrderForm').fadeOut(400, function () {
                                    $('#orderaddress').html('<strong>Pickup Address</strong> ' + $('#pickupblock').html().replace('Pick Up Address', ''));
                                    if (ordertype == 'Delivery') {
                                        $('#orderaddress').html('<strong>Delivery Address:</strong> ' + deliveryaddress);
                                    }

                                });
                                // ////////////////////////////////// START //////////////////////////////////////////////////////////////////////////////////
                                // Added By     : Junaid Hassan 
                                // Dated        : 2014-01-10
                                // Jira         : EAT-283
                                $('#BtnPlaceOrder').html('Place Order');
                                $('#BtnPlaceOrder').removeAttr('disabled');
                                // ////////////////////////////////// END  //////////////////////////////////////////////////////////////////////////////////
                                $('#OrderFailure').fadeIn('slow');
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
                                fillColor: '#8C0B00',
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

            // --------------------------------------------------------- START ----------------------------------------------------------------------------            
            //Added BY        : Junaid Hassan
            //Dated           : 2013-11-21
            // purpose Add the OrderType in QueryString
            //Jira Task ID    : EAT-73--
            var OrderType = 'Delivery';
            $('#hdnOrderType').val('Delivery');
            OrderType = $('#hdnOrderType').val();
            // --------------------------------------------------------- END ----------------------------------------------------------------------------            

            $('<div>').load('/Handler/Cart.aspx?OutletID=' + OutletID + '&OrderType=' + OrderType + '#CartArea', function () {
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

                $('#DivDeliveryArea').show();
                $('#DivDeliveryfee').show();
                $('#liDeliveryTime').show();
                $('#liDeliveryFee').show();
                $('#liMinOrder').show();
                $('#li1').hide();
                $('#li2').hide();
                $('#li3').hide();

            });
        }

    });

    $(window).load(function () {

        //eat_oye.home_controller.searchorder();
        //eat_oye.home_controller.searchhotel();
        //  eat_oye.home_controller.search();
    });

})(jQuery);

/* =============================================================
 * bootstrap-combobox.js v1.1.5
 * =============================================================
 * Copyright 2012 Daniel Farrell
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */

!function ($) {

    "use strict";

    /* COMBOBOX PUBLIC CLASS DEFINITION
     * ================================ */

    var Combobox = function (element, options) {
        this.options = $.extend({}, $.fn.combobox.defaults, options);
        this.$source = $(element);
        this.$container = this.setup();
        this.$element = this.$container.find('input[type=text]');
        this.$target = this.$container.find('input[type=hidden]');
        this.$button = this.$container.find('.dropdown-toggle');
        this.$menu = $(this.options.menu).appendTo('body');
        this.matcher = this.options.matcher || this.matcher;
        this.sorter = this.options.sorter || this.sorter;
        this.highlighter = this.options.highlighter || this.highlighter;
        this.shown = false;
        this.selected = false;
        this.refresh();
        this.transferAttributes();
        this.listen();
    };

    Combobox.prototype = {

        constructor: Combobox

    , setup: function () {
        var combobox = $(this.options.template);
        this.$source.before(combobox);
        this.$source.hide();
        return combobox;
    }

    , parse: function () {
        var that = this
          , map = {}
          , source = []
          , selected = false
          , selectedValue = '';
        this.$source.find('option').each(function () {
            var option = $(this);
            if (option.val() === '') {
                that.options.placeholder = option.text();
                return;
            }
            map[option.text()] = option.val();
            source.push(option.text());
            if (option.prop('selected')) {
                selected = option.text();
                selectedValue = option.val();
            }
        })
        this.map = map;
        if (selected) {
            this.$element.val(selected);
            this.$target.val(selectedValue);
            this.$container.addClass('combobox-selected');
            this.selected = true;
        }
        return source;
    }

    , transferAttributes: function () {
        this.options.placeholder = this.$source.attr('data-placeholder') || this.options.placeholder;
        this.$element.attr('placeholder', this.options.placeholder);
        this.$target.prop('name', this.$source.prop('name'));
        this.$target.val(this.$source.val());
        this.$source.removeAttr('name');  // Remove from source otherwise form will pass parameter twice.
        this.$element.attr('required', this.$source.attr('required'));
        this.$element.attr('rel', this.$source.attr('rel'));
        this.$element.attr('title', this.$source.attr('title'));
        this.$element.attr('class', this.$source.attr('class'));
        this.$element.attr('tabindex', this.$source.attr('tabindex'));
        this.$source.removeAttr('tabindex');
    }

    , select: function () {
        var val = this.$menu.find('.active').attr('data-value');
        this.$element.val(this.updater(val)).trigger('change');
        this.$target.val(this.map[val]).trigger('change');
        this.$source.val(this.map[val]).trigger('change');
        this.$container.addClass('combobox-selected');
        this.selected = true;
        return this.hide();
    }

    , updater: function (item) {
        return item;
    }

    , show: function () {
        var pos = $.extend({}, this.$element.position(), {
            height: this.$element[0].offsetHeight
        });

        this.$menu
          .insertAfter(this.$element)
          .css({
              top: pos.top + pos.height
          , left: pos.left
          })
          .show();

        this.shown = true;
        return this;
    }

    , hide: function () {
        this.$menu.hide();
        this.shown = false;
        return this;
    }

    , lookup: function (event) {
        this.query = this.$element.val();
        return this.process(this.source);
    }

    , process: function (items) {
        var that = this;

        items = $.grep(items, function (item) {
            return that.matcher(item);
        })

        items = this.sorter(items);

        if (!items.length) {
            return this.shown ? this.hide() : this;
        }

        return this.render(items.slice(0, this.options.items)).show();
    }

    , matcher: function (item) {
        return ~item.toLowerCase().indexOf(this.query.toLowerCase());
    }

    , sorter: function (items) {
        var beginswith = []
          , caseSensitive = []
          , caseInsensitive = []
          , item;

        while (item = items.shift()) {
            if (!item.toLowerCase().indexOf(this.query.toLowerCase())) { beginswith.push(item); }
            else if (~item.indexOf(this.query)) { caseSensitive.push(item); }
            else { caseInsensitive.push(item); }
        }

        return beginswith.concat(caseSensitive, caseInsensitive);
    }

    , highlighter: function (item) {
        var query = this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, '\\$&');
        return item.replace(new RegExp('(' + query + ')', 'ig'), function ($1, match) {
            return '<strong>' + match + '</strong>';
        })
    }

    , render: function (items) {
        var that = this;

        items = $(items).map(function (i, item) {
            i = $(that.options.item).attr('data-value', item);
            i.find('a').html(that.highlighter(item));
            return i[0];
        })

        items.first().addClass('active');
        this.$menu.html(items);
        return this;
    }

    , next: function (event) {
        var active = this.$menu.find('.active').removeClass('active')
          , next = active.next();

        if (!next.length) {
            next = $(this.$menu.find('li')[0]);
        }

        next.addClass('active');
    }

    , prev: function (event) {
        var active = this.$menu.find('.active').removeClass('active')
          , prev = active.prev();

        if (!prev.length) {
            prev = this.$menu.find('li').last();
        }

        prev.addClass('active');
    }

    , toggle: function () {
        if (this.$container.hasClass('combobox-selected')) {
            this.clearTarget();
            this.triggerChange();
            this.clearElement();
        } else {
            if (this.shown) {
                this.hide();
            } else {
                this.clearElement();
                this.lookup();
            }
        }
    }

    , clearElement: function () {
        this.$element.val('').focus();
    }

    , clearTarget: function () {
        this.$source.val('');
        this.$target.val('');
        this.$container.removeClass('combobox-selected');
        this.selected = false;
    }

    , triggerChange: function () {
        this.$source.trigger('change');
    }

    , refresh: function () {
        this.source = this.parse();
        this.options.items = this.source.length;
    }

    , listen: function () {
        this.$element
          .on('focus', $.proxy(this.focus, this))
          .on('blur', $.proxy(this.blur, this))
          .on('keypress', $.proxy(this.keypress, this))
          .on('keyup', $.proxy(this.keyup, this));

        if (this.eventSupported('keydown')) {
            this.$element.on('keydown', $.proxy(this.keydown, this));
        }

        this.$menu
          .on('click', $.proxy(this.click, this))
          .on('mouseenter', 'li', $.proxy(this.mouseenter, this))
          .on('mouseleave', 'li', $.proxy(this.mouseleave, this));

        this.$button
          .on('click', $.proxy(this.toggle, this));
    }

    , eventSupported: function (eventName) {
        var isSupported = eventName in this.$element;
        if (!isSupported) {
            this.$element.setAttribute(eventName, 'return;');
            isSupported = typeof this.$element[eventName] === 'function';
        }
        return isSupported;
    }

    , move: function (e) {
        if (!this.shown) { return; }

        switch (e.keyCode) {
            case 9: // tab
            case 13: // enter
            case 27: // escape
                e.preventDefault();
                break;

            case 38: // up arrow
                e.preventDefault();
                this.prev();
                break;

            case 40: // down arrow
                e.preventDefault();
                this.next();
                break;
        }

        e.stopPropagation();
    }

    , keydown: function (e) {
        this.suppressKeyPressRepeat = ~$.inArray(e.keyCode, [40, 38, 9, 13, 27]);
        this.move(e);
    }

    , keypress: function (e) {
        if (this.suppressKeyPressRepeat) { return; }
        this.move(e);
    }

    , keyup: function (e) {
        switch (e.keyCode) {
            case 40: // down arrow
            case 39: // right arrow
            case 38: // up arrow
            case 37: // left arrow
            case 36: // home
            case 35: // end
            case 16: // shift
            case 17: // ctrl
            case 18: // alt
                break;

            case 9: // tab
            case 13: // enter
                if (!this.shown) { return; }
                this.select();
                break;

            case 27: // escape
                if (!this.shown) { return; }
                this.hide();
                break;

            default:
                this.clearTarget();
                this.lookup();
        }

        e.stopPropagation();
        e.preventDefault();
    }

    , focus: function (e) {
        this.focused = true;
    }

    , blur: function (e) {
        var that = this;
        this.focused = false;
        var val = this.$element.val();
        if (!this.selected && val !== '') {
            this.$element.val('');
            this.$source.val('').trigger('change');
            this.$target.val('').trigger('change');
        }
        if (!this.mousedover && this.shown) { setTimeout(function () { that.hide(); }, 200); }
    }

    , click: function (e) {
        e.stopPropagation();
        e.preventDefault();
        this.select();
        this.$element.focus();
    }

    , mouseenter: function (e) {
        this.mousedover = true;
        this.$menu.find('.active').removeClass('active');
        $(e.currentTarget).addClass('active');
    }

    , mouseleave: function (e) {
        this.mousedover = false;
    }
    };

    /* COMBOBOX PLUGIN DEFINITION
     * =========================== */

    $.fn.combobox = function (option) {
        return this.each(function () {
            var $this = $(this)
              , data = $this.data('combobox')
              , options = typeof option == 'object' && option;
            if (!data) { $this.data('combobox', (data = new Combobox(this, options))); }
            if (typeof option == 'string') { data[option](); }
        });
    };

    $.fn.combobox.defaults = {
        template: '<div class="combobox-container"><input type="hidden" /><input type="text" autocomplete="off" /><span class="add-on dropdown-toggle" data-dropdown="dropdown"><span class="caret"/><span class="combobox-clear"><i class="icon-remove"/></span></span></div>'
    , menu: '<ul class="typeahead typeahead-long dropdown-menu"></ul>'
    , item: '<li><a href="#" style="text-decoration:none"></a></li>'
    };

    $.fn.combobox.Constructor = Combobox;

}(window.jQuery);

var data = {
    reviews: [
        {
            review: "&nbsp;&nbsp;111-HUNGRY"
        },
        {
            review: "&nbsp;&nbsp;111-486479"
        }
    ]
};

$.each(data.reviews, function (i, itemData) {
    var p = $('<p>')/*.html('<span class="icon-phone" aria-hidden="true"></span>')*/.append(itemData.review);
    if (i == 0) p.addClass('active');
    else p.css({ opacity: 0.0 });
    $('#callToOrder').append(p);
});

function showNextReview() {
    var $active = $('#callToOrder p.active');
    if ($active.length == 0) $active = $('#callToOrder p:last');
    var $next = $active.next().length ? $active.next() : $('#callToOrder p:first');

    $active.removeClass('active').animate({ opacity: 0.0 }, 1000, function () {
        $active.hide();
        $next.show().addClass('active').animate({ opacity: 1.0 }, 1000);
    });
}

setInterval(showNextReview, 5000);

/*Search Filter*/
$(document).ready(function () {
    drilldownsearch();
});


function JqueryLiveSearch() {

    //$(this).addClass('hidden');

    var searchTerm = $("#search-text").val();
    var listItem = $('#listing-container').children('article');

    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

    //extends :contains to be case insensitive
    $.extend($.expr[':'], {
        'containsi': function (elem, i, match, array) {
            return (elem.textContent || elem.innerText || '').toLowerCase()
            .indexOf((match[3] || "").toLowerCase()) >= 0;
        }
    });

    $("#listing-container article").not(":containsi('" + searchSplit + "')").each(function (e) {
        $(this).addClass('hiding out').removeClass('in');
        setTimeout(function () {
            $('.out').addClass('hidden');
        }, 300);
    });

    $("#listing-container article:containsi('" + searchSplit + "')").each(function (e) {
        $(this).removeClass('hidden out').addClass('in');
        setTimeout(function () {
            $('.in').removeClass('hiding');
        }, 1);
    });

    var jobCount = $('#listing-container .in').length;
    $('.list-count').text(jobCount + ' items');

    //shows empty state text when no jobs found
    if (jobCount == '0') {
        $('.empty-item').show();
        $('#listing').addClass('empty');
        // $('a.load-more').hide();

    }
    else {
        $('#listing').removeClass('empty');
        $('.empty-item').hide();

        // $('a.load-more').show();
    }

}

function drilldownsearch() {



    var jobCount = $('#listing-container .in').length;
    $('.list-count').text(jobCount + ' items');

    $("#search-text").keyup(function () {
        // Edited By   : Junaid Hassan
        // Dated        : 2013-12-02
        // Purpose      : So that I can call search Again After load More button press.
        // JIRA ID      : EAT-98  // http://support.arpatech.com/browse/EAT-98
        // Moved the Code From this to JQueryLiveSearch Function

        JqueryLiveSearch();

    });





    /*  
    An extra! This function implements
    jQuery autocomplete in the searchbox.
    Uncomment to use :)

function searchList() {                
   //array of list items
   var listArray = [];

    $("#list li").each(function() {
   var listText = $(this).text().trim();
     listArray.push(listText);
   });

   $('#search-text').autocomplete({
       source: listArray
   });

 }

 searchList();
*/
}
//@ sourceURL=pen.js

$(document).ready(function () {
    $("#cartOpenBtn").click(function () {
        $("#cartOrderDetails").toggleClass("cartTabOpen");
        $(".icon-angle-up").toggleClass("icon-angle-down");

    })
    $(".order-tab-close-btn").click(function () {
        $("#cartOrderDetails").removeClass("cartTabOpen");
    })
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('#scrollup').fadeIn();
    } else {
        $('#scrollup').fadeOut();
    }
});
$('#scrollup').click(function () {
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});


//Responsive JQuery Start
function jqUpdateSize() {
    // Get the width of the viewport
    var viewportWidth = $(window).width();
    var accordionList = $("#accordion ul").length;
    if (viewportWidth < 980) {
        $("#cartOrderDetails").removeClass("cartpinned");
        $("#cartOrderDetails").addClass("cartTab");
        $('#accordion > ul').slideUp(300);
        if (accordionList == 2) {
            $('#accordion > li').addClass('reservationAccordian');
        } else {
            $('#accordion > li').removeClass('reservationAccordian');
        }
    } else {
        $("#cartOrderDetails").removeClass("cartTab");
        $("#cartOrderDetails").removeClass("cartTabOpen");
        $("#cartOrderDetails").addClass("cartpinned");
    }

    // For StickyFloat Cuisines
    $('.newpin').stickyfloat({ startOffset: 490, duration: 0, delay: 0 });
    $('.cartpinned').stickyfloat({ startOffset: 475, duration: 0, delay: 0 });
    $('.pinned').stickyfloat({ startOffset: 150, duration: 0, delay: 0 });
    $('.sticky-review').stickyfloat({ startOffset: 360, duration: 0, delay: 0 });

    if (viewportWidth < 481) {
        $('.pinned').stickyfloat({ startOffset: 210, duration: 0, delay: 0 });
    }
    if (viewportWidth < 361) {
        $('.pinned').stickyfloat({ startOffset: 260, duration: 0, delay: 0 });
    }

    // For Cart Slide Panel
    if (viewportWidth < 321) {
        $("#cartOpenBtn").click(function () {
            $("#header").toggleClass("hide");
        })
        //$(".order-tab-close-btn").click(function () {
        //    $("#header").removeClass("hide");
        //})
    }
};
$(document).ready(jqUpdateSize);    // When the page first loads
$(window).resize(jqUpdateSize);     // When the browser changes size
//Responsive JQuery Ends