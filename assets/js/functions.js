//Registration
$inputEmail = $("");
$pInput = $("#passwordImput"); //password
$confirmPInput = $("#confirmPasswordImput"); // comfir password
$inputEmail = $("#InputEmail1");

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
$inputEmail.change(function(){
   if (ValidateEmail($inputEmail.val())){
       $inputEmail.removeClass("is-invalid");
       $inputEmail.addClass("is-valid");
   } else{
       $inputEmail.removeClass("is-valid");
       $inputEmail.addClass("is-invalid");
   }
});


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

//end of regitration script