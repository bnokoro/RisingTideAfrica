import Axios from 'axios';

// Init Bootstrap Datepicker


// Pass id to delete modal
$('.delete-button').on('click', function (event) {
    event.preventDefault();
    const url = $(this).data('url');
    console.log(url);
    $('#deleteModalForm').attr('action', url);
});


const inputs = $('.other-inputs');

// Hide all inputs except email
inputs.hide();
$('#email-error').hide();
$('#mentor-email').bind('blur keypress', function (e) {
    $('#email-error').hide();
    if (e.type == 'blur' || e.keyCode == 13) {
        e.preventDefault();
        inputs.hide();
        const email = $(this).val();
        if (!email) {
            $('#email-error').show();
            return;
        }

        Axios.post('check-email', {email}).then(response => {
            if (response.data.status === true) {
                const user = response.data.user;
                inputs.show();
                $('[name="first_name"]').val(user.first_name);
                $('[name="last_name"]').val(user.last_name);
            } else {
                inputs.hide();
                $('#email-error').show();
            }

        })
    }
});



$('#date-error').hide();
Axios.get('/sessions/active').then(res => {
    const session = res.data.data;

    $(function () {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "yy-mm-dd",
            startDate: new Date(session.start_date),
            endDate: new Date(session.end_date)
        }).datepicker('update', new Date());
    });

    $('.day_choosen_mentor').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yy-mm-dd",
        startDate: new Date(session.start_date),
        endDate: new Date(session.end_date)
    })
        .on('changeDate', function (e) {
            $('#date-error').hide();
            const selectedDate = new Date(Date.parse(e.date)).toLocaleDateString();
            $('#selected_date_input').val(selectedDate);
            if (selectedDate) {
                Axios.post('check-date', {selectedDate}).then(response => {
                    if (response.data.slot_exists) {
                        $('#date-error').show();
                        $('.mentor-submit').attr('disabled', "true");
                    } else {
                        $('.mentor-submit').removeAttr('disabled');
                    }
                })
            }
        });

    $('.day_choosen_mentee').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yy-mm-dd",
        startDate: new Date(session.start_date),
        endDate: new Date(session.end_date)
    })
        .on('changeDate', function (e) {
            $('#date-error').hide();
            $('[name="time_choosen"]').val('');
            const selectedDate = new Date(Date.parse(e.date)).toLocaleDateString();
            $('#selected_date_input').val(selectedDate);
            if (selectedDate) {
                Axios.post('check-date-mentee', {selectedDate}).then(response => {
                    if (!response.data.mentor_exists) {
                        $('#date-error').text('There is no available mentor for selected date. Please choose another');
                        $('#date-error').show();
                        $('.mentee-submit').attr('disabled', "true");
                    } else {
                        if (response.data.slot_exists) {
                            $('#date-error').text('Slot is occupied. Choose another date.');
                            $('#date-error').show();
                            $('.mentee-submit').attr('disabled', "true");
                        } else {
                            $('.mentee-submit').removeAttr('disabled');
                            const timeChoosen = response.data.time;
                            if (timeChoosen) {
                                let time = timeChoosen.start_time + ' - ' + timeChoosen.end_time;
                                $('[name="time_choosen"]').val(time);
                            }
                        }
                    }
                })
            }
        });
})
$('#no-slot-mentor').hide();
$('#no-slot-mentee').hide();
// Check sessions is occupied
Axios.get('/slots-available').then(res => {
    const {mentor, mentee} = res.data;
    if (!mentor) {
        $('#no-slot-mentor').show();
        $('#mentor-content').hide();
    }

    if (mentor) {
        $('#no-slot-mentor').hide();
        $('#mentor-content').show();
    }

    if (!mentee) {
        $('#no-slot-mentee').show();
        $('#mentee-content').hide();
    }

    if (mentee) {
        $('#no-slot-mentee').hide();
        $('#mentee-content').show();
    }
})


$('#stage-error').hide();
$('.mentorship-stage-select').on('change', function () {
    $('#stage-error').hide();
    console.log($(this).val());
    if ($(this).val() === '1') {
        $('#stage-error').show();
    }
});

$('#mentee-company-file').click(function(e) {
    e.preventDefault();
    const url = $(this).attr('href');
    console.log(url);
    window.location.href = url;
    // window.location.href = 'uploads/file.doc';
});
