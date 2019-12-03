<!-- 
<div class="footer">
  <p class="footer-text">Copyright &copy; 2019. All Rights Reserved | Design by Tinotenda Denzel Ndaipa ( C16129413P )</p>
</div>
-->
<?php include 'includes/modals.php'; ?>


<!-- javascripts -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/chart.js"></script>
<!--custome script for all page-->
<script src="js/scripts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
  $(function () {
    $('#toggleButton').click(function () {
      $('#chapter1').toggle('15000', function () {
        if ($('#chapter1').is(':visible')) {
          $('#plus').val('-')
        } else {
          $('#plus').val('+')
        }
      });
    });
    $('#toggleButton2').click(function () {
      $('#chapter2').toggle('15000', function () {
        if ($('#chapter2').is(':visible')) {
          $('#plus2').val('-')
        } else {
          $('#plus2').val('+')
        }
      });
    });
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#avatar')
          .attr('src', e.target.result)
          .width(300)
          .height(400);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
  $(document).ready(function () {
    $('#tasks_data').DataTable({
      "columnDefs": [
        { "searchable": false, "targets": 6 }
      ]
    });
    $('#tasks_data_assigned').DataTable({
      "columnDefs": [
        { "searchable": false, "targets": 7 }
      ]
    });
    $('#tasks_data_assigns').DataTable();
    $('#marks').DataTable();
    $('#leads_table_history').DataTable();
    $('#all_users').DataTable(
      {
        "columnDefs": [
          { "searchable": false, "targets": 5 }
        ]
      });
    $('#tasks_data_homepage').DataTable();
    $('#archived_tender_responses').DataTable({
      "columnDefs": [
          { "searchable": false, "targets": 4 }
        ]
    });
    $('#document_archive').DataTable();
    $('#leads_table').DataTable({
      "columnDefs": [
          { "searchable": false, "targets": 6 }
        ]
    });
    $('#requests').DataTable();
    $('#rejected_requests').DataTable({
      "columnDefs": [
          { "searchable": false, "targets": 5 }
        ]
    });
    $('#assignments').DataTable({
      "columnDefs": [
          { "searchable": false, "targets": 4 }
        ]
    });
    $('#confirm_new_password').keyup(function () {
      var p = $('#new_password').val();
      var cp = $('#confirm_new_password').val();
      if (!p.includes(cp)) {
        $("#warn_me").html("Passwords Do Not Match !");
      } else {
        $("#warn_me").html("");
      }

      $('#result').html(checkStrength($('#new_password').val()))
    });
    $('#new_password').keyup(function () {
      $('#result').html(checkStrength($('#new_password').val()))
    });
    function checkStrength(password) {
      var strength = 0
      if (password.length < 6) {
        $('#result').removeClass()
        $('#result').addClass('label label-danger')
        return 'Too short'
      }
      if (password.length > 7) strength += 1
      // If password contains both lower and uppercase characters, increase strength value.
      if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
      // If it has numbers and characters, increase strength value.
      if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
      // If it has one special character, increase strength value.
      if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
      // If it has two special characters, increase strength value.
      if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
      // Calculated strength value, we can return messages
      // If value is less than 2
      if (strength < 2) {
        $('#result').removeClass()
        $('#result').addClass('label label-danger')
        return 'Weak'
      } else if (strength == 2) {
        $('#result').removeClass()
        $('#result').addClass('label label-warning')
        return 'Good'
      } else {
        $('#result').removeClass()
        $('#result').addClass('label label-success')
        return 'Strong'
      }
    }

    $(document).on('click','save_comment',function(){
      var response_id = $(this).attr('id');
      $.ajax({  
          url :"includes/save_comment.php",  
          method:"POST",
          data:{response_id:response_id},
          success:function(data){  
              alert('Save Successful');
          }  
      })
    });
  });

</script>
</body>

</html>