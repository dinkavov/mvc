$(document).ready(function () {
    var map;
    var coordinates = {lat: 34.1012441, lng: -118.3458723};
    var wizardForm = $('#wizard-form');

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: coordinates,
            zoom: 16
        });

        var marker = new google.maps.Marker({
            position: coordinates,
            map: map
        });

        var infowindow = new google.maps.InfoWindow({
            content: "<b>7060 Hollywood Blvd, Los Angeles, CA</b>"
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }

    //Map initialization
    if (!$('#map').length == 0) {
        initMap();
    }

    //Show User card
    $('.btn-view-profile').on('click', function (e) {
        e.preventDefault();

        var userId = $(this).attr('data-user');
        var modalTable = $('#profile-modal-content');

        $.ajax({
            url: 'allmembers/view',
            type: 'POST',
            data: {user_id: userId}
        })
        .done(function(data) {
            modalTable.html(data);
        })
        .fail(function() {
            console.log("error");
        });
    });

    //DatePicker & phone mask initialization
    if ($('#datepicker').length != 0) {
        $('#datepicker').datepicker().on('changeDate', function(){
            $('#datepicker').datepicker('hide');
        });

        $('#phone-number').mask('+0 (000) 000-0000');
    }

    //Validate first form
    $('#first-form').validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            birthday: {
                required: true
            },
            report_subject: {
                required: true
            },
            country: {
                required: true
            },
            phone: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: '/main/check',
                    type: 'post',
                    data: {
                        email: function() {
                            return $('#first-form :input[name="email"]').val();
                        }
                    }
                }
            }
        },
        messages: {
            email: {
                remote: 'User with this email already exists.'
            }
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                url: '/main/first',
                type: 'post',
                success: function (data) {
                    wizardForm.html(data);
                }
            });

        }
    });

    //Submit second form
    $('#second-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/main/second',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
        })
        .done(function(data) {
            wizardForm.html(data);
        })
        .fail(function() {
            console.log("Second form request error.");
        });
    });

});