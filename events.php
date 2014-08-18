<?php include 'inc_header.php';?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            <button id = "add_new_event" type = "button" class = "btn btn-success">
              <span class="glyphicon glyphicon glyphicon-plus"></span>
              &nbsp;Add Event
            </button>
          </h1>
        </div>
        </div>
        <div class="row">
        <div id = "upcoming-event-list-holder" class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Upcoming Events   
            <span class="glyphicon glyphicon-circle-arrow-up pull-right"></span>
          </div>
          <div class="panel-body">
            <table class="table table-striped"> 
              <tbody id = "upcoming-event-list"></tbody>
            </table>
          </div>
        </div>
      </div>                
      <!--div id = "past-event-list-holder" class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Past Events 
            <span class="glyphicon glyphicon-circle-arrow-down pull-right"></span>
        </div>
        <div class="panel-body hidden">
          <table class="table table-striped"> 
            <tbody id = "past-event-list"></tbody>
          </table>
        </div>
      </div-->
      <div id = "deleted-event-list-holder" class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
          Upcoming Deleted Events <span class="glyphicon glyphicon-circle-arrow-down pull-right"></span>
          </div>
          <div class="panel-body hidden">
            <table class="table table-striped"> 
              <tbody id = "deleted-event-list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="event_frm_hldr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Event Edit Form</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" name="event_frm" id="event_frm" method="post" action="#">
            <div class='form-group'>
              <label class = 'control-label' for = 'eventName'>Event Name*</label>
              <input class= 'form-control required' id = 'eventName' name = 'eventName' type = 'text' />
            </div>
            <div class='form-group'>
              <label class = 'control-label' for = 'eventDesc'>Event Description*</label>
              <input class= 'form-control required' id = 'eventDesc' name = 'eventDesc' type = 'text' />
            </div>
            <div class='form-group'>
              <label class = 'control-label' for = 'eventDate'>Event Date(mm/dd/yyyy)*</label>
              <input class= 'form-control required' id = 'eventDate' name = 'eventDate' type = 'text' />
            </div>
            <div class='form-group'>
              <label class = 'control-label' for = 'eventLoc'>Event Location*</label>
              <input class= 'form-control required' id = 'eventLoc' name = 'eventLoc' type = 'text' />
            </div>
            <div class='form-group'>
              <label class = 'control-label' for = 'eventTime'>Event Time*</label>
              <input class= 'form-control required' id = 'eventTime' name = 'eventTime' type = 'text' />
            </div>
            <div class='form-group'>
              <label class = 'control-label' for = 'eventPrice'>Event Price</label>
              <input class= 'form-control' id = 'eventPrice' name = 'eventPrice' type = 'text' />
            </div>
            <div class='form-group'>
            <select name = "eventType" id = "eventType" class="form-control">
            </select>
            </div>
            <input type = "hidden" name = "pkid" id = "pkid" value="0"/> 
          </form>
          <button id = "event_frm_submit" name = "event_frm_submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="confirm_event_delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirm</h4>
        </div>
        <div class="modal-body">
        Are you sure you would like to delete this event? 
        </div>
        <div class = "modal-footer">
          <button id = "event_delete_yes" name = "event_delete_yes" class="btn btn-success">Yes</button>
          <button id = "event_delete_no" name = "event_delete_no" class="btn btn-danger">No</button>
        <div>
      </div>
    </div>
  </div>

  </body>
</html>
