

(function($){

    window.sr = ScrollReveal({origin: 'bottom',delay:200,duration:500,reset:true,mobile: false});
    sr.reveal('.offers-r');
    sr.reveal('.games-r');
    sr.reveal('.prices-r');
    sr.reveal('.about-r');
    sr.reveal('.blog-r');
    sr.reveal('.contact-r');
    var scroll = new SmoothScroll('a[href*="#"]');
    var sections = {};
    $(window).scroll(function () {
        if(!$("#nav").hasClass('black-bgr') && $(window).width() > 1055){
            $("#nav").addClass('black-bgr')
        }else if($(window).scrollTop() == 0){
            $("#nav").removeClass('black-bgr')
        }
    })
    setTimeout(function () {
        gumshoe.init({
            selector: '[data-gumshoe] a', // Default link selector (must use a valid CSS selector)
            selectorHeader: '[data-gumshoe-header]', // Fixed header selector (must use a valid CSS selector)
            container: window, // The element to spy on scrolling in (must be a valid DOM Node)
            offset: 0, // Distance in pixels to offset calculations
            activeClass: 'active', // Class to apply to active navigation link and its parent list item
            scrollDelay: false, // Wait until scrolling has stopped before updating the navigation
            callback: function (nav) {
                // alert(1)
            }
        });
    });

    if($.fancybox !== undefined){
        $.fancybox.defaults.animationEffect = "fade";
    }

    $(document).on('click','.toggler',function () {
        $('.nav').toggleClass('opened')
    })

    function initMap() {
        var mapblock = $("#map");
        if(mapblock.length > 0){
            var uluru = {lat: Number(mapblock.data('lat')), lng: Number(mapblock.data('lng'))};
            var map = new google.maps.Map(document.getElementById('map'), {

                zoom: Number(mapblock.data('zoom')),
                styles:[
                    {
                        "featureType": "all",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#081e3f"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "gamma": 0.01
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "saturation": -31
                            },
                            {
                                "lightness": -33
                            },
                            {
                                "weight": 2
                            },
                            {
                                "gamma": 0.8
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "lightness": 30
                            },
                            {
                                "saturation": 30
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "saturation": 20
                            },
                            {
                                "color": "#2364c8"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#005ae1"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "lightness": 20
                            },
                            {
                                "saturation": -20
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "lightness": 10
                            },
                            {
                                "saturation": -30
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "saturation": 25
                            },
                            {
                                "lightness": 25
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#081e3f"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#081e3f"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#081e3f"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "lightness": -20
                            }
                        ]
                    }
                ],
                center: uluru,
                disableDefaultUI: true
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }

    }
    initMap();



    var prevImg = '<?xml version=\'1.0\' encoding=\'utf-8\'?><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"> <g> <path style="fill:#000" d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/> </g> </svg>'
    var prevImgWhite = '<?xml version=\'1.0\' encoding=\'utf-8\'?><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"> <g> <path style="fill:#fff" d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/> </g> </svg>'
    var nextImg = '<?xml version=\'1.0\' encoding=\'utf-8\'?> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path style="fill:#000" d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/></g></svg>'
    var nextImgWhite = '<?xml version=\'1.0\' encoding=\'utf-8\'?> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path style="fill:#fff" d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/></g></svg>'
    // if($('.home-slider.owl-carousel').length > 0){
    //     $('.home-slider.owl-carousel').owlCarousel({
    //         loop:true,
    //         margin:0,
    //         nav:false,
    //         dots:true,
    //         navText: [prevImgWhite,nextImgWhite],
    //         responsive:{
    //             0:{
    //                 items:1
    //             },
    //             600:{
    //                 items:1
    //             },
    //             1000:{
    //                 items:1
    //             }
    //         }
    //     });
    //
    // }



    if($('.about-videos.owl-carousel').length > 0){
        $('.about-videos.owl-carousel').owlCarousel({
            items:1,
            loop:true,
            margin:0,
            video:true,
            lazyLoad:true,
            center:true,
            dotsContainer:"#custom-dots1"
        });
        $('.vr-info .about-videos.owl-carousel').owlCarousel({
            items:1,
            loop:true,
            margin:0,
            video:true,
            lazyLoad:true,
            center:true,
            dotsContainer:"#custom-dots2"
        });
    }
    if($('.screens-slider').length>0){
        $('.screens-slider.owl-carousel').owlCarousel({
            loop:true,
            margin:13,
            items:5,
            navText: [prevImgWhite,nextImgWhite],
        });
    }

    if($('.partners-slider').length > 0){
        $('.partners-slider.owl-carousel').owlCarousel({
            loop:true,
            margin:20,
            items:5,
            navText: [prevImgWhite,nextImgWhite],
        });
    }



    if($('.prices-slider').length > 0){
        $('.prices-slider.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            items:1,
            navText: [prevImgWhite,nextImgWhite],
        })
    }
    $(".blog-items-carousel").flickity({
        pageDots: false,
        cellAlign: 'left',
        contain: true,
        arrowShape: {
            x0: 20,
            x1: 55, y1: 35,
            x2: 60, y2: 35,
            x3: 25
        }
    });
    $(".prices").flickity({
        pageDots: false,
        arrowShape: {
            x0: 20,
            x1: 55, y1: 35,
            x2: 60, y2: 35,
            x3: 25
        }
    });

    $('.fs-carousel').flickity({
        cellAlign: 'left',
        contain: true,
        imagesLoaded: true,
        prevNextButtons: true,
        wrapAround: true,
        pageDots: true,
        autoPlay: 5000,
        draggable: false,
        arrowShape: {
            x0: 20,
            x1: 55, y1: 35,
            x2: 60, y2: 35,
            x3: 25
        }
    });
    $('.blog-inner-slider').flickity({
        cellAlign: 'left',
        contain: true,
        imagesLoaded: true,
        prevNextButtons: true,
        pageDots: false,
        wrapAround: false,
        autoPlay: 5000,
        draggable: false,
        arrowShape: {
            x0: 20,
            x1: 55, y1: 35,
            x2: 60, y2: 35,
            x3: 25
        }
    });

    $(".blog-slider").flickity({
        pageDots: false,
        prevNextButtons:false,
        wrapAround:true
    });
    $(".blog-inner-gallery-slider").flickity({
        pageDots: false,
        prevNextButtons:false,
        wrapAround:true
    });
    $(".offers").flickity({
        pageDots: false,
        prevNextButtons:true,
        cellAlign: 'left',
        contain: true,
        arrowShape: {
            x0: 20,
            x1: 55, y1: 35,
            x2: 60, y2: 35,
            x3: 25
        }
    });






    
    
    $(".game-filters-list li a").on('click',function () {
        $("#category-input").val($(this).data('id'));
        $("#filters-form").submit();
    })

    $("#filters-form .selectbox select").on('change',function () {
        $("#filters-form").submit();
    })


    $(".header-filter ul li").on('click',function () {
        $(".sorted").html('');
        var _this = $(this);
        var ID = _this.data('id');
        $(".header-filter ul li").removeClass('active');
        $(this).addClass('active');
        if(ID == ""){
            $(".orig").fadeIn(150);
        }else{
            var sorted='';
            $(".orig").fadeOut(150,function () {
                $(".games-list ul li").each(function () {
                    if($.inArray(String(ID),$(this).attr('data-category').split(",")) != -1){
                        sorted +=$(this)[0].outerHTML
                    }
                });
                $(".sorted").html(sorted)

            });

        }

    })




    var c  = $('.about-carousel').flickity({
        // options
        cellAlign: 'center',
        prevNextButtons: false,
        contain: true,
        draggable:false
    });
    $('.about-carousel').data('carousel',c);

    var vrC  = $('.vr-carousel').flickity({
        // options
        cellAlign: 'center',
        prevNextButtons: false,
        contain: true,
        draggable:false
    });
    $('.vr-carousel').data('carousel',vrC);

    $(".section-change input[type='checkbox']").on('click',function () {
        $(".vr-info-bgr").toggleClass('active');
        $(".about-container").toggleClass('slide-about');
        $(".vr-info").toggleClass('slide-vr');
        $.each(players,function (k,v) {
            v.stopVideo()
        })
        $(".thumb").fadeIn()
    })


    $('.rateyo').each(function () {
        $(this).rateYo({
            rating    : $(this).data('rating'),
            readOnly: true,
            starWidth: "16px",
            ratedFill: "#04b8de",
            normalFill:"#ffffff"
        });
    })


    $(".game-descr:not(.mob) .text").mCustomScrollbar();

    // $(".reservation-form-popup").on('submit',function (e) {
    //     e.preventDefault();
    //     $(".reservation-form-popup .submit-btn").attr('disabled',true)
    //     var valid = [];
    //
    //     $(".reservation-form-popup input, .reservation-form-popup textarea").each(function () {
    //         if($(this).val().trim().length == 0){
    //             $(this).addClass('error');
    //             valid.push(false);
    //         }else{
    //             $(this).removeClass('error');
    //         }
    //     });
    //     var data = new FormData($(this)[0]);
    //     data.append('action','reserve-form');
    //
    //     if(!valid.length){
    //
    //         $.ajax({
    //             url:location.pathname,
    //             data:data,
    //             method:'post',
    //             dataType:'json',
    //             contentType:false,
    //             processData:false,
    //             cache:false,
    //         }).success(function (data) {
    //             if(data.errors.length == 0){
    //                 $(".reservation-form-popup").fadeOut(300,function () {
    //                     $(".success").text(data.success).fadeIn(300,function () {
    //                         setTimeout(function () {
    //                             $(".reservation-form-popup input, .reservation-form-popup textarea").each(function () {
    //                                 $(this).val('')
    //                             });
    //
    //
    //                             $("#reservation-popup").fadeOut(300,function () {
    //                                 $(".backdrop").fadeOut(300)
    //                                 $(".success").fadeOut(300,function () {
    //                                     $(".reservation-form-popup").fadeIn(300);
    //                                     $(".reservation-form-popup .submit-btn").attr('disabled',false)
    //                                 })
    //                             });
    //
    //                         },5000)
    //                     })
    //                 })
    //             }
    //         }).error(function (err) {
    //             $(".reservation-form-popup .submit-btn").attr('disabled',false)
    //         })
    //     }
    //
    //
    // })
    // $(".reservation-form").on('submit',function (e) {
    //     e.preventDefault();
    //     $(".reservation-form .submit-btn").attr('disabled',true)
    //     var valid = [];
    //
    //     $(".reservation-form input, .reservation-form textarea").each(function () {
    //         if($(this).val().trim().length == 0){
    //             $(this).addClass('error');
    //             valid.push(false);
    //         }else{
    //             $(this).removeClass('error');
    //         }
    //     });
    //     var data = new FormData($(this)[0]);
    //     data.append('action','contact-form');
    //
    //     if(!valid.length){
    //
    //         $.ajax({
    //             url:location.pathname,
    //             data:data,
    //             method:'post',
    //             dataType:'json',
    //             contentType:false,
    //             processData:false,
    //             cache:false,
    //         }).success(function (data) {
    //             if(data.errors.length == 0){
    //                 $(".reservation-form").fadeOut(300,function () {
    //                     $(".success").text(data.success).fadeIn(300,function () {
    //                         setTimeout(function () {
    //                             $(".reservation-form input, .reservation-form textarea").each(function () {
    //                                 $(this).val('')
    //                             })
    //                             $(".success").fadeOut(300,function () {
    //                                 $(".reservation-form").fadeIn(300);
    //                                 $(".submit-btn").attr('disabled',false)
    //                             })
    //                         },5000)
    //                     })
    //                 })
    //             }
    //         }).error(function (err) {
    //             $(".submit-btn").attr('disabled',false)
    //         })
    //     }
    //
    //
    // })
    $('.phone').mask('+00000-000-00-00');

    $(document).on('click','.open-form',function () {
        if($('body').find('div.backdrop').length == 0){
            $('body').append('<div class="backdrop" style="display:none;"></div>');

        }
        var _this = $(this);
        $('.backdrop').fadeIn(150,function () {
               $("#"+_this.data('toggle')).fadeIn(150)
        })
    })
    $(document).on('click','.backdrop, .closer',function () {
        $(".popup").fadeOut(150)
        $(".backdrop").fadeOut(150)
    })


   

})(jQuery,window);


    
    
    
