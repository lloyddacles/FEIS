
// Total And Percent
$(document).ready(function(){
  $('#teacher').change(function(){
    var getValue = $(this).val();
    $.ajax({
      url:"Eval_Assets2/Evaluation.php",
      method:"POST",
      data:{lagayan:getValue}, //Container ayy pag sasalinan ng data na galing sa getValue
      success:function(html){
        $('#score').html(html); //d2 mag ooutput sa id nato
      }
    })
  });
});

// Total And Percent
$(document).ready(function(){
  $('#teacher').change(function(){
    var getValue = $(this).val();
    $.ajax({
      url:"Eval_Assets2/Eval.php",
      method:"POST",
      data:{lagayan:getValue}, //Container ayy pag sasalinan ng data na galing sa getValue
      success:function(html){
        $('#evaluator').html(html); //d2 mag ooutput sa id nato
      }
    })
  });
});

// Total And Percent
$(document).ready(function(){
  $('#teacher').change(function(){
    var getValue = $(this).val();
    $.ajax({
      url:"Eval_Assets2/Eval2.php",
      method:"POST",
      data:{lagayan:getValue}, //Container ayy pag sasalinan ng data na galing sa getValue
      success:function(html){
        $('#evaluated').html(html); //d2 mag ooutput sa id nato
      }
    })
  });
});

// Total And Percent
$(document).ready(function(){
  $('#teacher').change(function(){
    var getValue = $(this).val();
    $.ajax({
      url:"Eval_Assets2/show_all.php",
      method:"POST",
      data:{userid:getValue}, //Container ayy pag sasalinan ng data na galing sa getValue
      success:function(response){
        crt.destroy();
        $('#Pie').html(response); //d2 mag ooutput sa id nato

      }
    })



  });
});


// A Result
$(document).ready(function(){
  $('#A').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_a.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#A_Modal').modal('show');
      }
    });
  });
});

// B Result
$(document).ready(function(){
  $('#B').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_b.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#B_Modal').modal('show');
      }
    });
  });
});

// C Result
$(document).ready(function(){
  $('#C').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_c.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#C_Modal').modal('show');
      }
    });
  });
});

// D Result
$(document).ready(function(){
  $('#D').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_d.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#D_Modal').modal('show');
      }
    });
  });
});

// E Result
$(document).ready(function(){
  $('#E').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_e.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#E_Modal').modal('show');
      }
    });
  });
});

// FT Result
$(document).ready(function(){
  $('#FT').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_f.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#FT_Modal').modal('show');
      }
    });
  });
});

// FL Result
$(document).ready(function(){
  $('#FL').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_l.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#FL_Modal').modal('show');
      }
    });
  });
});

// FM Result
$(document).ready(function(){
  $('#FM').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_m.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#FM_Modal').modal('show');
      }
    });
  });
});

// FC Result
$(document).ready(function(){
  $('#FC').click(function(){
    var userid = $('#teacher').val();
    $.ajax({
      url: 'Eval_Assets2/show_eval.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){
        $('.modal-content').html(response);
        $('#FC_Modal').modal('show');
      }
    });
  });
});
