import Axios from 'axios';

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

$('#mentor-email').on('blur', function (event) {
    event.preventDefault();
    inputs.hide();
    const email = $(this).val();
    if (!email) {
        return;
    }

    Axios.post('check-email', {email}).then(response => {
        if (response.data === true) {
            console.log('here');
            inputs.show();
        } else {
            inputs.hide();
        }
        
    })
})