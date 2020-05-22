// Pass id to delete modal

$('.delete-button').on('click', function (event) {
    event.preventDefault();
    const url = $(this).data('url');
    console.log(url);
    $('#deleteModalForm').attr('action', url);
});