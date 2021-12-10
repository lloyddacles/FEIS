$(document).on('click','a[data-role=Acknowledge]',function(){
  var id = $(this).data('id');
  var tc = $('#'+id).children('td[data-target=teacher]').text();
  var eva = $('#'+id).children('td[data-target=evaluator]').text();
  var tot = $('#'+id).children('td[data-target=total]').text();
  var per = $('#'+id).children('td[data-target=percent]').text();
  var dat = $('#'+id).children('td[data-target=dat]').text();
  var sta = $('#'+id).children('td[data-target=stats]').text();
  var ack = $('#'+id).children('td[data-target=ack]').text();
  $('#evalid').val(id);
  $('#atc').val(tc);
  $('#asp').val(eva);
  $('#total').val(tot);
  $('#percent').val(per);
  $('#dat').val(dat);
  $('#stats').val(sta);
  $('#ack').val(ack);
  $('#delete').modal('show');
});
$(document).on('click','a[data-role=Unacknowledge]',function(){
  var id = $(this).data('id');
  var tc = $('#'+id).children('td[data-target=teacher]').text();
  var eva = $('#'+id).children('td[data-target=evaluator]').text();
  var tot = $('#'+id).children('td[data-target=total]').text();
  var per = $('#'+id).children('td[data-target=percent]').text();
  var dat = $('#'+id).children('td[data-target=dat]').text();
  var sta = $('#'+id).children('td[data-target=stats]').text();
  var ack = $('#'+id).children('td[data-target=ack]').text();
  $('#uevalid').val(id);
  $('#uatc').val(tc);
  $('#uasp').val(eva);
  $('#utotal').val(tot);
  $('#upercent').val(per);
  $('#udat').val(dat);
  $('#ustats').val(sta);
  $('#uack').val(ack);
  $('#un').modal('show');
});


$(document).on('click','a[data-role=Send]',function(){
  var id = $(this).data('id');
  var tc = $('#'+id).children('td[data-target=teacher]').text();
  var tot = $('#'+id).children('td[data-target=total]').text();
  var per = $('#'+id).children('td[data-target=percent]').text();
  var dat = $('#'+id).children('td[data-target=dat]').text();
  var sta = $('#'+id).children('td[data-target=stats]').text();
  var ack = $('#'+id).children('td[data-target=ack]').text();
  $('#sevalid').val(id);
  $('#steacher').val(tc);
  $('#stotal').val(tot);
  $('#spercent').val(per);
  $('#sdat').val(dat);
  $('#sstats').val(sta);
  $('#sack').val(ack);
  $('#send').modal('show');
});

$(document).on('click','a[data-role=Unsend]',function(){
  var id = $(this).data('id');
  var tc = $('#'+id).children('td[data-target=teacher]').text();
  var eva = $('#'+id).children('td[data-target=evaluator]').text();
  var tot = $('#'+id).children('td[data-target=total]').text();
  var per = $('#'+id).children('td[data-target=percent]').text();
  var dat = $('#'+id).children('td[data-target=dat]').text();
  var sta = $('#'+id).children('td[data-target=stats]').text();
  var ack = $('#'+id).children('td[data-target=ack]').text();
  $('#uevalid').val(id);
  $('#uteacher').val(tc);
  $('#uevaluator').val(eva);
  $('#utotal').val(tot);
  $('#upercent').val(per);
  $('#udat').val(dat);
  $('#ustats').val(sta);
  $('#uack').val(ack);
  $('#unsend').modal('show');
});
