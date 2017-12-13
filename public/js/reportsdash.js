$(document).ready(function () {
    function e() {
        $("#addNewEvent").modal("hide"), $("#fullcalendar").fullCalendar("renderEvent", {
            title: $("#inputTitleEvent").val(),
            start: new Date($("#start").val()),
            end: new Date($("#end").val()),
            color: $("#inputBackgroundEvent").val()
        }, !0)
    }

    // toastr.options = {
    //     closeButton: !0,
    //     progressBar: !0,
    //     showMethod: "fadeIn",
    //     hideMethod: "fadeOut",
    //     timeOut: 5e3
    // }, toastr.info("You have 6 notifications", "Welcome to Umega"), $(".counter").counterUp({
    //     delay: 10,
    //     time: 1e3
    // });
    var t = {
            AU: 12190,
            AR: 3510,
            BR: 2023,
            CA: 1563,
            CN: 5745,
            FR: 2555,
            DE: 3305,
            JP: 5390,
            RU: 2476,
            US: 14624
        },
        a = [{
            latLng: [41.9, 12.45],
            name: "Vatican City",
            earnings: "500"
        }, {
            latLng: [43.73, 7.41],
            name: "Monaco",
            earnings: "32"
        }, {
            latLng: [-.52, 166.93],
            name: "Nauru",
            earnings: "432"
        }, {
            latLng: [-8.51, 179.21],
            name: "Tuvalu",
            earnings: "321"
        }, {
            latLng: [43.93, 12.46],
            name: "San Marino",
            earnings: "510"
        }, {
            latLng: [47.14, 9.52],
            name: "Liechtenstein",
            earnings: "130"
        }, {
            latLng: [7.11, 171.06],
            name: "Marshall Islands",
            earnings: "234"
        }, {
            latLng: [17.3, -62.73],
            name: "Saint Kitts and Nevis",
            earnings: "329"
        }, {
            latLng: [3.2, 73.22],
            name: "Maldives",
            earnings: "120"
        }, {
            latLng: [35.88, 14.5],
            name: "Malta",
            earnings: "435"
        }, {
            latLng: [12.05, -61.75],
            name: "Grenada",
            earnings: "321"
        }, {
            latLng: [13.16, -61.23],
            name: "Saint Vincent and the Grenadines",
            earnings: "110"
        }, {
            latLng: [13.16, -59.55],
            name: "Barbados",
            earnings: "90"
        }, {
            latLng: [17.11, -61.85],
            name: "Antigua and Barbuda",
            earnings: "230"
        }, {
            latLng: [-4.61, 55.45],
            name: "Seychelles",
            earnings: "200"
        }, {
            latLng: [7.35, 134.46],
            name: "Palau",
            earnings: "320"
        }, {
            latLng: [42.5, 1.51],
            name: "Andorra",
            earnings: "123"
        }, {
            latLng: [14.01, -60.98],
            name: "Saint Lucia",
            earnings: "500"
        }, {
            latLng: [6.91, 158.18],
            name: "Federated States of Micronesia",
            earnings: "310"
        }, {
            latLng: [1.3, 103.8],
            name: "Singapore",
            earnings: "23"
        }, {
            latLng: [1.46, 173.03],
            name: "Kiribati",
            earnings: "58"
        }, {
            latLng: [-21.13, -175.2],
            name: "Tonga",
            earnings: "90"
        }, {
            latLng: [15.3, -61.38],
            name: "Dominica",
            earnings: "239"
        }, {
            latLng: [-20.2, 57.5],
            name: "Mauritius",
            earnings: "100"
        }, {
            latLng: [26.02, 50.55],
            name: "Bahrain",
            earnings: "225"
        }, {
            latLng: [.33, 6.73],
            name: "São Tomé and Príncipe",
            earnings: "150"
        }];

    var n = [
            [0, 57],
            [1, 58],
            [2, 93],
            [3, 11],
            [4, 40],
            [5, 93],
            [6, 29],
            [7, 19],
            [8, 87],
            [9, 14],
            [10, 130],
            [11, 91],
            [12, 80],
            [13, 49],
            [14, 59]
        ],
        // o = [{
        //     label: "Orders",
        //     data: n,
        //     color: "#17A88B"
        // }],
        r = {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 1
                },
                points: {
                    show: !0,
                    lineWidth: 0,
                    fill: !0,
                    fillColor: "#17A88B"
                },
                shadowSize: 0
            },
            grid: {
                hoverable: !0,
                borderWidth: 0
            },
            xaxis: {
                ticks: 0
            },
            yaxis: {
                ticks: 0
            },
            tooltip: {
                show: !0,
                content: "%s: %y",
                defaultTheme: !1
            },
            legend: {
                show: !1
            }
        };
    // $.plot($("#flot-order"), o, r);
    var i = [
            [0, 755],
            [1, 1133],
            [2, 1234],
            [3, 1448],
            [4, 1198],
            [5, 918],
            [6, 583],
            [7, 842],
            [8, 540],
            [9, 665],
            [10, 1195],
            [11, 742],
            [12, 1040],
            [13, 682],
            [14, 1190]
        ],
        // l = [{
        //     label: "Revenue",
        //     data: i,
        //     color: "#0667D6"
        // }],
        s = {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 1
                },
                points: {
                    show: !0,
                    lineWidth: 0,
                    fill: !0,
                    fillColor: "#0667D6"
                },
                shadowSize: 0
            },
            grid: {
                hoverable: !0,
                borderWidth: 0
            },
            xaxis: {
                ticks: 0
            },
            yaxis: {
                ticks: 0
            },
            tooltip: {
                show: !0,
                content: "%s: $%y",
                defaultTheme: !1
            },
            legend: {
                show: !1
            }
        };
    // $.plot($("#flot-revenue"), l, s);
    var d = [
            [0, 150708],
            [1, 502507],
            [2, 220627],
            [3, 821182],
            [4, 233599],
            [5, 4087866],
            [6, 364625],
            [7, 3064625],
            [8, 236585],
            [9, 1040222],
            [10, 516876],
            [11, 292003]
        ],
        c = [
            [0, 650708],
            [1, 1102507],
            [2, 417012],
            [3, 495497],
            [4, 887603],
            [5, 564775],
            [6, 2580159],
            [7, 607998],
            [8, 1906411],
            [9, 346237],
            [10, 315699],
            [11, 202003]
        ],
        m = [
            [0, "Jan"],
            [1, "Feb"],
            [2, "Mar"],
            [3, "Apr"],
            [4, "May"],
            [5, "Jun"],
            [6, "Jul"],
            [7, "Aug"],
            [8, "Sep"],
            [9, "Oct"],
            [10, "Nov"],
            [11, "Dec"]
        ],
        h = [{}, {
            data: d,
            color: "#0667D6",
            lines: {
                show: !0,
                lineWidth: 0
            }
        }, {
            label: "Total Plays",
            data: c,
            color: "#1F364F",
            lines: {
                show: !0,
                // fill: .9,
                lineWidth: 5
            },
            curvedLines: {
                apply: !0,
                monotonicFit: !0
            }
        }, {
            data: c,
            color: "#1F364F",
            lines: {
                show: !0,
                lineWidth: 0
            }
        }],
        g = {
            series: {
                curvedLines: {
                    active: !0
                },
                shadowSize: 0
            },
            grid: {
                borderWidth: 0,
                hoverable: !0,
                labelMargin: 15
            },
            xaxis: {
                ticks: m,
                tickLength: 0,
                font: {
                    color: "#9a9a9a",
                    size: 11
                }
            },
            yaxis: {
                tickLength: 0,
                tickSize: 1e6,
                font: {
                    color: "#9a9a9a",
                    size: 11
                },
                tickFormatter: function (e, t) {
                    return e > 0 ? (e / 1e6).toFixed(t.tickDecimals) + " M" : (e / 1e6).toFixed(t.tickDecimals)
                }
            },
            tooltip: {
                show: !1
            },
            legend: {
                show: !0,
                container: $("#flot-visitor-legend"),
                noColumns: 4,
                labelBoxBorderColor: "#FFF",
                margin: 0
            }
        };

    $.ajax({
        url: 'monthly',
        success: function (data) {
            var e = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            Morris.Line({
                element: "linechart",
                data: data[0],
                xkey: "date",
                ykeys: ["plys"],
                labels: ["Total Plays"],
                hideHover: "auto",
                lineColors: ["#1F364F"],
                behaveLikeLine: !0,
                lineWidth: 2,
                pointSize: 4,
                gridLineColor: "#f1f1f1",
                gridTextColor: "#9a9a9a",
                gridTextSize: 11,
                gridTextFamily: "'Poppins', sans-serif",
                resize: !0,
                xLabels: "month",
                xLabelFormat: function (a) {
                    return e[a.getMonth()]
                },
                dateFormat: function (a) {
                    return e[new Date(a).getMonth()]
                }
            });

            Morris.Donut({
                element: "region-share",
                data: data[1],
                resize: !0,
                colors: ["#1F364F", "#0667D6", "#9a9a9a", "#8E23E0", "#E6E6E6"],
                formatter: function (e) {
                    return e + "%"
                }
            });

            var c = 1;
            var r = '';
            $.each(data[2], function (i, v) {
                r += '<tr><td>' + c + '</td><td>' + i + '</td><td>' + v + '</td></tr>';
                c++;
            });
            $('#top-5-broadcaster').html(r);

            new Chartist.Bar("#bar-extreme-responsive", {
                labels: data[3][0],
                series: data[3][1]
            }, {
                stackBars: !0,
                axisX: {
                    labelInterpolationFnc: function (e) {
                        return e.split(/\s+/).map(function (e) {
                            return e[0]
                        }).join("")
                    }
                },
                axisY: {
                    offset: 20
                }
            }, [
                ["screen and (min-width: 400px)", {
                    reverseData: !0,
                    horizontalBars: !0,
                    axisX: {
                        labelInterpolationFnc: Chartist.noop
                    },
                    axisY: {
                        offset: 60
                    }
                }],
                ["screen and (min-width: 800px)", {
                    stackBars: !1,
                    seriesBarDistance: 10
                }],
                ["screen and (min-width: 1000px)", {
                    reverseData: !1,
                    horizontalBars: !1,
                    seriesBarDistance: 15
                }]
            ]);

            new Chartist.Bar("#bar-horizontal", {
                labels: data[4][0],
                series: [
                    data[4][1]
                ]
            }, {
                seriesBarDistance: 10,
                reverseData: !0,
                horizontalBars: !0,
                axisY: {
                    offset: 70
                }
            });
        }
    });


    // new Chartist.Bar("#bar-horizontal", {
    //     labels: ["Zylofone fm", "Y 107.9 fm", "Live 91.9 fm", "Joy 99.7 fm", "citi 97.3 fm"],
    //     series: [
    //         [3, 7, 5, 10, 3]
    //     ]
    // }, {
    //     seriesBarDistance: 10,
    //     reverseData: !0,
    //     horizontalBars: !0,
    //     axisY: {
    //         offset: 70
    //     }
    // });
});