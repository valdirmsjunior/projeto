/* Form Reset */
function resetForm() {
    if ($('.form-reset input').length) {
        $('.form-reset input').each(function(){
            this.value = "";
        });
    }

    if ($('.form-reset select').length) {
        $('.form-reset select').each(function(){
            this.value = "";
        });
    }
}