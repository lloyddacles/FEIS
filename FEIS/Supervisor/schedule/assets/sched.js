// Total And Percent
$(document).ready(function(){
  $('#teacher').change(function(){
    var getValue = $(this).val();
    $.ajax({
      url:"assets/select_sched.php",
      method:"POST",
      data:{lagayan:getValue}, //Container ayy pag sasalinan ng data na galing sa getValue
      success:function(html){
        $('#con').html(html); //d2 mag ooutput sa id nato
        alert(getValue);
      }
    })
  });
});
