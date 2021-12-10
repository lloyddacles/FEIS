// A Result
$(document).ready(function(){
  $('#add_sub').click(function(){
    $('#sub').modal('show');
  });
});

$(document).ready(function(){
  $('#add_train').click(function(){
    $('#training').modal('show');
  });
});


$(document).ready(function(){
  $('#add_emp').click(function(){
    $('#employee').modal('show');
  });
});

$(document).ready(function(){
  $('#add_account').click(function(){
    $('#account').modal('show');
  });
});

$(document).ready(function(){
  $('#add_sched').click(function(){
    $('#sched').modal('show');
  });
});

$(document).ready(function(){
  $('#add_sched').click(function(){
    $('#addsched').modal('show');
  });
});

$(document).ready(function(){
  $(document).on('click','a[data-role=acknow]',function(){
    var id = $(this).data('id');
    var tc = $('#'+id).children('td[data-target=teacher]').text();
    var eva = $('#'+id).children('td[data-target=evaluator]').text();
    var tot = $('#'+id).children('td[data-target=total]').text();
    var per = $('#'+id).children('td[data-target=percent]').text();
    var dat = $('#'+id).children('td[data-target=dat]').text();
    var ack = $('#'+id).children('td[data-target=ack]').text();
    $('#sevalid').val(id);
    $('#tc').val(tc);
    $('#stotal').val(tot);
    $('#spercent').val(per);
    $('#sdat').val(dat);
    $('#tc').val(eva);
    $('#sack').val(ack);
    $('#acks').modal('show');
  });

  $(document).on('click','a[data-role=delsub]',function(){
    var id = $(this).data('id');
    var cod = $('#'+id).children('td[data-target=cod]').text();
    var name = $('#'+id).children('td[data-target=name]').text();
    var des = $('#'+id).children('td[data-target=des]').text();
    var uni = $('#'+id).children('td[data-target=uni]').text();
    var typ = $('#'+id).children('td[data-target=typ]').text();
    $('#dsid').val(id);
    $('#dsname').val(name);
    $('#dscode').val(cod);
    $('#dsunit').val(uni);
    $('#dstype').val(typ);
    $('#dsdesc').val(des);
    $('#dsub').modal('show');
  });

  $(document).on('click','a[data-role=editsub]',function(){
    var id = $(this).data('id');
    var cod = $('#'+id).children('td[data-target=cod]').text();
    var name = $('#'+id).children('td[data-target=name]').text();
    var des = $('#'+id).children('td[data-target=des]').text();
    var uni = $('#'+id).children('td[data-target=uni]').text();
    var typ = $('#'+id).children('td[data-target=typ]').text();
    $('#esid').val(id);
    $('#esname').val(name);
    $('#escode').val(cod);
    $('#esunit').val(uni);
    $('#estype').val(typ);
    $('#esdesc').val(des);
    $('#esub').modal('show');
  });

  $(document).on('click','a[data-role=delemp]',function(){
    var id = $(this).data('id');
    var job = $('#'+id).children('td[data-target=job]').text();
    var emp = $('#'+id).children('td[data-target=emp]').text();
    var off = $('#'+id).children('td[data-target=off]').text();
    var gl = $('#'+id).children('td[data-target=gl]').text();
    var pos = $('#'+id).children('td[data-target=pos]').text();
    var stat = $('#'+id).children('td[data-target=stat]').text();
    var date = $('#'+id).children('td[data-target=date]').text();
    $('#did').val(id);
    $('#demp').val(emp);
    $('#doff').val(off);
    $('#dpos').val(pos);
    $('#dstat').val(stat);
    $('#djgl').val(gl);
    $('#ddate').val(date);
    $('#delemp').modal('show');
  });

  $(document).on('click','a[data-role=edittemp]',function(){
    var id = $(this).data('id');
    var job = $('#'+id).children('td[data-target=job]').text();
    var emp = $('#'+id).children('td[data-target=emp]').text();
    var off = $('#'+id).children('td[data-target=off]').text();
    var gl = $('#'+id).children('td[data-target=gl]').text();
    var pos = $('#'+id).children('td[data-target=pos]').text();
    var stat = $('#'+id).children('td[data-target=stat]').text();
    var date = $('#'+id).children('td[data-target=date]').text();
    $('#eid').val(id);
    $('#eemp').val(emp);
    $('#eoff').val(off);
    $('#epos').val(pos);
    $('#estat').val(stat);
    $('#ejgl').val(gl);
    $('#date').val(date);
    $('#editemp').modal('show');
  });

  $(document).on('click','a[data-role=deltrain]',function(){
    var id = $(this).data('id');
    var cer = $('#'+id).children('td[data-target=cer]').text();
    var name = $('#'+id).children('td[data-target=name]').text();
    var loc = $('#'+id).children('td[data-target=loc]').text();
    var date = $('#'+id).children('td[data-target=date]').text();
    $('#did').val(id);
    $('#dcerti').val(cer);
    $('#dteach').val(name);
    $('#dloc').val(loc);
    $('#ddate').val(date);
    $('#delt').modal('show');
  });

  $(document).on('click','a[data-role=edittrain]',function(){
    var id = $(this).data('id');
    var cer = $('#'+id).children('td[data-target=cer]').text();
    var name = $('#'+id).children('td[data-target=name]').text();
    var loc = $('#'+id).children('td[data-target=loc]').text();
    var date = $('#'+id).children('td[data-target=date]').text();
    $('#eid').val(id);
    $('#ecerti').val(cer);
    $('#eteach').val(name);
    $('#eloc').val(loc);
    $('#edate').val(date);
    $('#edittrain').modal('show');
  });

  $(document).on('click','a[data-role=addreg]',function(){
    var id = $(this).data('id');
    var fn = $('#'+id).children('td[data-target=fname]').text();
    var mn = $('#'+id).children('td[data-target=mname]').text();
    var ln = $('#'+id).children('td[data-target=lname]').text();
    var gn = $('#'+id).children('td[data-target=gen]').text();
    var nn = $('#'+id).children('td[data-target=num]').text();
    var bd = $('#'+id).children('td[data-target=bday]').text();
    var em = $('#'+id).children('td[data-target=email]').text();
    $('#id').val(id);
    $('#fname').val(fn);
    $('#mname').val(mn)
    $('#lname').val(ln)
    $('#gender').val(gn)
    $('#cnum').val(nn)
    $('#bday').val(bd)
    $('#email').val(em);
    $('#confirm').modal('show');
  });


  $(document).on('click','a[data-role=delreg]',function(){
    var id = $(this).data('id');
    var fn = $('#'+id).children('td[data-target=fname]').text();
    var ln = $('#'+id).children('td[data-target=lname]').text();
    $('#drid').val(id);
    $('#dfname').val(fn);
    $('#dlname').val(ln);
    $('#del').modal('show');
  });

  $(document).on('click','a[data-role=update]',function(){
    var id = $(this).data('id');
    var tc = $('#'+id).children('td[data-target=Teacher]').text();
    var eva = $('#'+id).children('td[data-target=Evaluator]').text();
    var sta = $('#'+id).children('td[data-target=start]').text();
    var end = $('#'+id).children('td[data-target=end]').text();
    var dat = $('#'+id).children('td[data-target=date]').text();
    $('#eid').val(id);
    $('#etc').val(tc);
    $('#esp').val(eva);
    $('#estart').val(sta);
    $('#eend').val(end);
    $('#edate').val(dat);
    $('#edit').modal('show');
  });




  $(document).on('click','a[data-role=delete]',function(){
    var id = $(this).data('id');
    var tc = $('#'+id).children('td[data-target=Teacher]').text();
    var eva = $('#'+id).children('td[data-target=Evaluator]').text();
    var sta = $('#'+id).children('td[data-target=start]').text();
    var end = $('#'+id).children('td[data-target=end]').text();
    var dat = $('#'+id).children('td[data-target=date]').text();
    $('#did').val(id);
    $('#dtc').val(tc);
    $('#dsp').val(eva);
    $('#dstart').val(sta);
    $('#dend').val(end);
    $('#ddate').val(dat);
    $('#delete').modal('show');
  });


  $('#delsched').on('click', function() {
    var id = $('#did').val();
    $.ajax({
      url: "Eval_Sched/del_sched.php",
      type: "POST",
      data: {
        id: id,
      },
      cache: false,
      success: function(response){
        $('#'+id).children('td[data-target=Teacher]').text(etc);
        $('#'+id).children('td[data-target=Evaluator]').text(esp);
        $('#'+id).children('td[data-target=start]').text(estart);
        $('#'+id).children('td[data-target=end]').text(eend);
        $('#'+id).children('td[data-target=date]').text(edate);
        console.log(response);
      }
    });
  });

});
