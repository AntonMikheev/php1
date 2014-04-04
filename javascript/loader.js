$( document ).ready(function(){
$('#button').click(function() {
    $.ajax({
        type: 'POST',
        url: 'array.php',
        dataType: 'json',
        cache: false,
        success: function(result) {
            console.log(result);
            if (result.isSuccess === true) {
                alert(result.data.message);
            }


        }
    });
});
});