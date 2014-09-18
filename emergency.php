<?php include "inc_header.php";?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h2>Urgent Request</h2>
          <form id = "rqst_frm" method = "POST" action = "#" role="form">  
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
            <button id = "rqst_sbmt" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>                
    </div>
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
  </body>
</html>
