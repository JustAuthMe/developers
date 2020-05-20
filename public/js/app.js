$(":checkbox[name*='require']").change(function() {
    let retrieve_checkbox = 'retrieve_'+this.name.replace('require_', '')
    if(this.checked){
        $(":checkbox[name="+retrieve_checkbox+"]").prop('checked', true);
    }
});

$(":checkbox[name*='retrieve']").change(function() {
    let required_checkbox = 'require_'+this.name.replace('retrieve_', '')
    if(!this.checked){
        $(":checkbox[name="+required_checkbox+"]").prop('checked', false);
    }
});

let hide = true;
function hideShowSecret(btn) {
    if(hide){
        $(btn).html('Cacher');
        $(":input[id='secret']").val($(":input[id='real-secret']").val())
        hide = false;
    }else{
        $(btn).html('Voir');
        $(":input[id='secret']").val('****************')
        hide = true;
    }
}
