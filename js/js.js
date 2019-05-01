jQuery(function($){
   $("#phone").mask("+7 (999) 999-99-99");
});


$(document).ready(function(){ 

  $("#listing > #foreleven").addClass("del");
  $(".remove").addClass("del");
  $('#baza').change(function(){
    if ($('#baza option:selected').hasClass("nine")) {
      $("#listing > #foreleven").addClass("del");
      $("#listing > #fornine").removeClass("del");
    } else
    if ($('#baza option:selected').hasClass("eleven")) {
      $("#listing > #fornine").addClass("del");
      $("#listing > #foreleven").removeClass("del");
    }
  });
 

  $(".btn").click(function(){ 
    $("#listing").toggleClass("visible");
  });
  var i = 0;
  $(".link").click(function(){
  i++;
  if(this.classList.contains('active')){
    alert("Эта специальность уже выбрана!!!!!");
  } 
  else
  if(i>3){
    alert("Нельзя выбрать более трех специальностей");
    throw "stop";
  } 
  else
    document.getElementById("special").value+=i+". "+this.innerHTML+"\n";
    $(".remove").removeClass("del");
    $(".btn").html("Выбрать еще одну специальность");
    $(this).addClass("active");
      $("#listing").removeClass("visible");
      $("#listing").addClass("hide");
    });



  $(".remove").click(function(){ 
   document.querySelector('textarea').value="" ;
   $(".link").removeClass("active");
    $(".btn").html("Выберите специальность");
    i=0;
    $(this).addClass("del")
 
  });


});