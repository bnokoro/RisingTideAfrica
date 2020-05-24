import Axios from 'axios';

// Init Bootstrap Datepicker
$(function () {
    $("#datepicker").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yy-mm-dd",
        startDate: new Date('2020-6-01'),
        endDate: new Date('2020-6-30')
    }).datepicker('update', new Date());
});

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
$('.day_choosen_mentor').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: "yy-mm-dd",
    startDate: new Date('2020-6-01'),
    endDate: new Date('2020-6-30')
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
    startDate: new Date('2020-6-01'),
    endDate: new Date('2020-6-30')
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
                        const timeChoosen = response.data.time_choosen;
                        if (timeChoosen) {
                            let time = '';
                            if (timeChoosen == 5) {
                                time = '5pm - 6pm';
                            } else if (timeChoosen == 6) {
                                time = '6pm - 7pm';
                            }
                            $('[name="time_choosen"]').val(time);
                        }
                    }
                }
            })
        }
    });

$('#stage-error').hide();
$('.mentorship-stage-select').on('change', function () {
    $('#stage-error').hide();
    console.log($(this).val());
    if ($(this).val() === '1') {
        $('#stage-error').show();
    }
});
