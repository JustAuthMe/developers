let hide = true;
let hideShowSecret = (btn) => {
    if (hide) {
        $(btn).html(lang_hide);
        $(":input[id='secret']").val($(":input[id='real-secret']").val())
        hide = false;
    } else {
        $(btn).html(lang_show);
        $(":input[id='secret']").val('****************')
        hide = true;
    }
}

$(window).on('load', () => {
    $(":input[name='url']").keyup(function (e) {
        $(":input[name='redirect_url']").val($(e.currentTarget).val());
    });

    $(":checkbox[name='requested_data[]']").change((e) => {
        $(":checkbox[name='required_data[]'][value="+$(e.currentTarget).val()+"]").prop('checked', false);
    });

    $(":checkbox[name='required_data[]']").change((e) => {
        $(":checkbox[name='requested_data[]'][value="+$(e.currentTarget).val()+"]").prop('checked', true);
    });

    $(":checkbox[id*='all_requested']").change(function (e) {
        let table = $(e.currentTarget).closest('table');
        $(table).find(':checkbox[name*="requested_data[]"]').prop('checked', this.checked);
        if(!this.checked){
            $(table).find(':checkbox[name*="required_data[]"]').prop('checked', this.checked);
            $(":checkbox[id*='all_required']").prop('checked', false);
        }
    });

    $(":checkbox[id*='all_required']").change(function (e) {
        let table = $(e.currentTarget).closest('table');
        if(this.checked){
            $(table).find(":checkbox[id*='all_requested']").prop('checked', true);
            $(table).find(':checkbox[name*="requested_data[]"]').prop('checked', true);
        }
        $(table).find(':checkbox[name*="required_data[]"]').prop('checked', this.checked);
    });
});
