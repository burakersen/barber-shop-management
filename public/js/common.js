$(document).ready(function(){
    $.swallSuccess = function(title, text) {
        Swal.fire({
            icon: 'success',
            title: title,
            text: text
        });
    }

    $.swallError = function(title, text) {
        Swal.fire({
            icon: 'error',
            title: title,
            text: text
        });
    }
});