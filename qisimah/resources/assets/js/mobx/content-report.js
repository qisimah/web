$(document).ready(function () {
    var current_path = window.location.pathname.split('/');
    var contents = $('#content-report').DataTable({
        responsive: true,
        columns: [
            {title: "Broadcaster", className: 'text-center'},
            {title: "Location", className: 'text-center'},
            {title: "Reach", className: 'text-center'},
            {title: "Time Played", className: 'text-center'}
        ]
    });

    $('#selRepTitle').chosen();
    const axiosrequest = axios.create({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });


    $('#selRepArtists').on('change', function () {
        $('#selRepTitle').empty();
        $('#selRepTitle').append('<option value="" selected disabled>choose title</option>');
        axiosrequest.get('/play/artist/' + $(this).val()).then(function (response) {
            $.map(response.data, function (obj) {
                $('#selRepTitle').append('<option value="' + obj.q_id + '">' + obj.title + '</option>');
            });
            $('#selRepTitle').trigger('chosen:updated');
        }).catch(function (error) {
            console.log(error);
        });
    });

    $('#fetch-content-by-date').on('click', function (e) {
        e.preventDefault();
        $('#map').hide();
        var $this = $('#fetch-content-by-date');
        const selRepTitle = $('#selRepTitle').val();
        const selRepArtists = $('#selRepArtists').val();
        if (selRepArtists === null && $('#hidRole').val() !== 'manager') {
            swal('violation', 'Artist field cannot be empty!', 'error');
        } else if (selRepTitle === null) {
            swal('violation', 'Title field cannot be empty!', 'error');
        } else {
            $this.text('fetching...');
            contents.rows().remove().draw();
            axiosrequest.get('/play/content/' + selRepTitle + '/' + $('#start-date').val() + '/' + $('#end-date').val()).then(function (response) {
                $this.text('fetch');
                $.map(response.data, function (obj) {
                    var content = {};
                    content.broadcaster = obj.broadcasters.name;
                    content.played_at = obj.created_at;
                    content.location = obj.broadcasters.city;
                    content.reach = obj.broadcasters.reach;

                    contents.row.add([obj.broadcasters.name, obj.broadcasters.city, obj.broadcasters.reach, obj.created_at]).draw();

                });
                $this.hide();
                $('#show-heat-map').show();
            }).catch(function (error) {
                console.log(error);
            });
        }

    });

    if (current_path[1] === 'report' && current_path[2] === 'heat-map') {
        var heat_map_data = [];
        axiosrequest.get('/plays/regions/1/' + current_path[3] + '/' + current_path[4] + '/' + current_path[5]).then(function (response) {
            if (response.data[0].length){
                response.data[0].map(function (obj) {
                    if (obj.plays){
                        heat_map_data.push({
                            location: new google.maps.LatLng(parseFloat(obj.lat), parseFloat(obj.lng)),
                            weight: obj.plays
                        });
                    }
                });

                var map;
                // const addMarker = function (position, map) {
                //     return new google.maps.Marker({position: position, map: map});
                // };


                (function initMap() {
                    map = new google.maps.Map(document.querySelector('#heat-map'), {
                        center: {
                            lat: 8.052222,
                            lng: -1.734722
                        },
                        zoom: 7,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        disableDefaultUI: true,
                        scrollwheel: false,
                        draggable: true,
                        maxZoom: 9
                    });

                    const styles = [
                        {
                            "featureType": "administrative.land_parcel",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.neighborhood",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "visibility": "off"
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
                            "featureType": "poi.business",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        }
                    ];

                    map.setOptions({styles: styles});

                    new google.maps.visualization.HeatmapLayer({
                        data: heat_map_data,
                        dissipating: true,
                        radius: 75,
                        map: map
                    });
                }(window, google));
            } else {
                document.querySelector('#heat-map').innerHTML = "Oops! Play data for the select content could not be" +
                    " retrieved at this time.";
            }
        });

    }

    $('#show-heat-map').on('click', function (e) {
        const $this = $(this);
        $this.text('generating...');
        $('#map').show();
        e.preventDefault();
    });
});