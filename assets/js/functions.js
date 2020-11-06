//Registration
$pInput = $("#passwordImput"); //password
$confirmPInput = $("#confirmPasswordImput"); // comfir password
$doc = $(document);
function ValidateEmail(inputText)
{
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(inputText.match(mailformat))
    {
        return true;
    }
    else
    {
        return false;
    }
}
$pInput.change(function() {
    if ($pInput.val().length > 7){
        $pInput.removeClass("is-invalid");
        $pInput.addClass("is-valid");
        $confirmPInput.removeClass("is-valid");
        $confirmPInput.addClass("is-invalid");
    } else {
        $pInput.removeClass("is-valid");
        $pInput.addClass("is-invalid");
    }

    //console.log($pInput.val().length>7);

});

$confirmPInput.change(function() {

       if ($pInput.val().localeCompare($confirmPInput.val()) == 0){
           $confirmPInput.removeClass("is-invalid");
           $confirmPInput.addClass("is-valid");
       } else{
           $confirmPInput.removeClass("is-valid");
           $confirmPInput.addClass("is-invalid");
       }

});

$doc.on("change", "#InputEmail",function(event){
    $inputEmail = $(this);
    if (ValidateEmail($inputEmail.val())){
        $inputEmail.removeClass("is-invalid");
        $inputEmail.addClass("is-valid");
    } else{
        $inputEmail.removeClass("is-valid");
        $inputEmail.addClass("is-invalid");
    }
});
$doc.on("submit", "form.js-register",function(event){
    event.preventDefault()
    $form = $(this);
    $errorText = $(".invalid-password",$form);
    $inputEmail = $("#InputEmail",$form);
    $invalidEmail = $(".invalid-email",$form);
    if (ValidateEmail($inputEmail.val())){
        $invalidEmail.removeClass("showError")
    }else{
        $invalidEmail.addClass("showError");
    }


    if ($pInput.val().localeCompare($confirmPInput.val()) == 0 && $pInput.val().length > 7 ){
        $errorText.removeClass("showError");
        var data = {
            email: $("input[type='email']", $form).val(),
            password: $pInput.val()
        }

    } else{
        $errorText.addClass("showError");
    }

    return false;
});


//end of regitration script