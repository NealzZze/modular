function showStartModal() {
    if (localStorage.getItem('cookies-agree') != 1) {
        setTimeout(function () {
            $('#exampleModal').modal('show');
            $('#modal-yes-btn').on('click', function () {
                localStorage.setItem('cookies-agree', 1)
                $('#exampleModal').modal('hide');
            })
        }, 4000);
    }
}


showStartModal();