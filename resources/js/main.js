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
