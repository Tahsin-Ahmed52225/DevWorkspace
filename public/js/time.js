
var timer = document.getElementById('stopwatch');
var hr = 0;
var min = 0;
var sec = 0;
var stoptime = true;

function startTimer() {
    if (stoptime == true) {
        localStorage.setItem('start_button', 'clicked');
        localStorage.setItem('stoptime', false);
        stoptime = false;
        timerCycle();
    }

}
function timerCycle() {

    if (stoptime == false || localStorage.getItem('stoptime') != null) {

        sec = parseInt(sec);
        min = parseInt(min);
        hr = parseInt(hr);

        sec = sec + 1;

        if (sec == 60) {
            min = min + 1;
            sec = 0;
        }
        if (min == 60) {
            hr = hr + 1;
            min = 0;
            sec = 0;
        }

        if (sec < 10 || sec == 0) {
            sec = '0' + sec;
        }
        if (min < 10 || min == 0) {
            min = '0' + min;
        }
        if (hr < 10 || hr == 0) {
            hr = '0' + hr;
        }
        localStorage.setItem('hr', hr);
        localStorage.setItem('min', min);
        localStorage.setItem('sec', sec);








        if (document.getElementById('page_name') == null) {
            var time_title = document.getElementById("time_title")
            time_title.innerHTML = hr + ':' + min + ':' + sec;
        } else {
            timer.innerHTML = hr + ':' + min + ':' + sec;
        }


        setTimeout("timerCycle()", 1000);
    }
}

//moving timer into side panel;

if (document.getElementById('page_name') == null) {
    window.addEventListener('load', function () {
        sec = localStorage.getItem('sec');
        min = localStorage.getItem('min');
        hr = localStorage.getItem('hr');

        stoptime = localStorage.getItem('stoptime');

        timerCycle();

    })


    // var time_title = document.getElementById("time_title")
    // time_title.innerHTML = hr + ':' + min + ':' + sec;
}
else if (localStorage.getItem('start_button') == 'clicked') {
    window.addEventListener('load', function () {
        sec = localStorage.getItem('sec');
        min = localStorage.getItem('min');
        hr = localStorage.getItem('hr');

        stoptime = localStorage.getItem('stoptime');

        timerCycle();

    })

}
//
if (document.getElementById('timer_submit') != null) {
    document.getElementById('timer_submit').addEventListener("click", function () {
        if (stoptime == false) {
            stoptime = true;
        }
        var description = document.getElementById("timer_description").value;
        saveData(hr, min, sec, description);
        localStorage.clear();
        timer.innerHTML = '00:00:00';
        var hr = 0;
        var min = 0;
        var sec = 0;



    })
}
function saveData(hr, min, sec, description) {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/tdg/dashboard/timer',
        data: {

            'hr': hr,
            'min': min,
            'sec': sec,
            'description': description,

        },
        success: function (data) {
            document.getElementById("time_msg").innerHTML = data.msg;
            $("#time_msg").slideDown(1000);
            $("#time_msg").delay(3000).slideUp(1000);
        },
        error: function (data, textStatus, errorThrown) {
            console.log("Error:");
            console.log(data);

        },
    });

}


