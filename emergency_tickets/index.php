<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Urgent Request Form</title>
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <h1><img src = "jg-hires-trans-cropped.png" id ='jglogo' style="height:50px;" alt="JG Web Consulting" /></h1>
        </div>
      </div>
    </nav>
    <form id = "rqst_frm" method = "POST" action = "#" role="form" class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Urgent Request Form</h2>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label" for="rqstr_nm">Requester:</label>
            <input type="text" class="form-control" name="rqstr_nm" id="rqstr_nm" placeholder="name">
          </div>
          <div class="form-group">
            <label class="control-label" for="rqstr_eml">Requester's Email Address:</label>
            <input type="text" class="form-control" name="rqstr_eml" id="rqstr_eml" placeholder="email address">
          </div>
          <div class="form-group">
            <label class="control-label">Enter Your Request:</label> 
            <textarea class="form-control" name="rqst_txt" id="rqst_txt" rows="3"></textarea>
          </div>
          <div class="checkbox">
            <input type="checkbox" name = "accept_pay" id = "accept_pay" value="">
            <label> I understand that this request is being submitted for expedited service and agree to pay the fifty dollar ($50.00) for this service. </label>
          </div>   
        </div>
        <div class="panel-footer">
          <button type="submit" id = "rqst_sbmt" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
    <hr/>
    <footer>
      <p class="text-center">Copyright  &#169; 2014 | <a href="http://jgwebconsulting.com" target="_blank">JG Web Consulting</a> | All Rights Reserved.</p>
    </footer>
    <div class="modal fade" id="tx_mdl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Thank You</h4>
          </div>
          <div class="modal-body">
            Your request has been submitted.  Please allow 24 hours for your request to becompleted.  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
     <div class="modal fade" id="generic_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Request Not Submitted</h4>
          </div>
          <div class="modal-body">
            Your form has errors.  Please correct those fields that are highlighed in red and resubmit.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="cbx_err" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Request Not Submitted</h4>
          </div>
          <div class="modal-body">
            Please agree to the terms of expedited requests.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap-3.1.1-dist/js/bootstrap.min.js"></script> 
    <script src="../bootstrap-3.1.1-dist/bootstrap-switch.js"></script>
    <script>
      $('document').ready(function(){
        $("#accept_pay").bootstrapSwitch('size', 'small');
        $("#accept_pay").bootstrapSwitch('onText', 'Yes');
        $("#accept_pay").bootstrapSwitch('offText', 'No');
        $("#accept_pay").bootstrapSwitch('offColor', 'danger');
        $("#rqst_sbmt").click(function(e){
          e.preventDefault();
          $(".has-error").removeClass("has-error");
          var email_valid = 0;
          var error = false;
          var cbx_error = false;
          var data =  $("#rqst_frm").serialize();
          email_valid = isValidEmailAddress($("#rqstr_eml").val());
          message_valid = isBlank($("#rqst_txt").val());
          name_valid = isBlank($("#rqstr_nm").val());
          if(!email_valid){
            error = true;
            $("#rqstr_eml").parent().addClass("has-error");
          } 
          if(!message_valid){
            error = true;
            $("#rqst_txt").parent().addClass("has-error");
          }
          if(!name_valid){
            error = true;
            $("#rqstr_nm").parent().addClass("has-error");
          }
          if($("#accept_pay:checked").size() != 1){
            cbx_error = true;
          }
          if (error){$('#generic_error').modal({keyboard: false});}
          else if (cbx_error){$('#cbx_err').modal({keyboard: false});}
          else if (!error&&!cbx_error){
            $.ajax({
              type: "post",
              url: "rqst_frm_process.asp",
              data: data, 
              success:  function(data){
                $('#tx_mdl').modal({keyboard: false});
              }
            }) 
          }
        })
      })
      function isValidEmailAddress(emailAddress) {
        var pattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
        return pattern.test(emailAddress);
      };
      function isBlank(val) {
        var err = false;
        if ($.trim(val) != "") err = true;
        return err;
      }
    </script>
  </body> 
</html>