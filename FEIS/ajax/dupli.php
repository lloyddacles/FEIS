<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Ajax Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  </head>
  <body>
    <select id="foodtypeID">
        <option value="asd">asdasd</option>
          <option value="Joshua Sapin">asdasd</option>
          <option value="2">asdasd</option>
            <option value="2">asdasd</option>
    </select>

    <div id="foodID">
asd
    </div>
    <script>
      $(document).ready(function(){
          $('#foodtypeID').change(function(){
            var getValue = $(this).val();
            alert(getValue);
            $.ajax({
              url:"friday.php",
              method:"POST",
              data:{lagayan:getValue}, //Container ayy pag sasalinan ng data na galing sa getValue
              success:function(html){
                $('#foodID').html(html); //d2 mag ooutput sa id nato
                alert("asdasd");
              }
            })
          });
      });
    </script>
  </body>
</html>
