$(document).ready(function() {
  const inputNumber = $('#input-number');

  $('.minus').on('click', function() {
    $myval = $(this).parent().find('input').val();
    if($myval > 0) {
        $(this).parent().find('input').val( parseInt($myval)-1);
    }
// console.log($(this).parent().find('input').val());
    
  });

  $('.plus').on('click', function() {
    $myval = $(this).parent().find('input').val();
        $(this).parent().find('input').val( parseInt($myval)+1);
  });


  $(".InMuber").attr("disabled", true);
  $(".number-input button").attr("disabled", true);





  $('.option-input.radio').on('click', function() {
    $('.Price').find('button').attr("disabled", true);
    $(this).parent().parent().parent().parent(3).parent().find('button').attr("disabled", false);
    console.log($('Price').find('button').html() );
     
  });




});
