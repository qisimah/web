/**
 * Created by MEST on 3/28/2017.
 */
var forecast =[
    {day: 'Monday', rain: false, humidity: 10},
    {day: 'Tuesday', rain: true, humidity: 100},
    {day: 'Wednesday', rain: true, humidity: 100},
    {day: 'Thursday', rain: false, humidity: 25},
    {day: 'Friday', rain: true, humidity: 100},
    {day: 'Saturday', rain: false,humidity: 15},
    {day: 'Sunday', rain: false, humidity: 100},
];

humidity = forecast.map(function (obj) {
    return obj.humidity;
});


// Function

var num = [1, 3, 5, 7, 9 ];
tripled = num.map(function (value) {
    return value * 3;
});

var num2 = [ 1, 2, 3, 4, 5];
num2.map(value => return value * 2);
console.log(num2);