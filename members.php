<?php include 'inc_header.php';?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                  <button id = "add_new" type = "button" class = "btn btn-success">New Member</button>
                </h1>
            </div>
        </div>
        <div class="row">
          <div id = "pending-member-list-holder" class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                  Pending Members    
                  <span class="glyphicon glyphicon-circle-arrow-up pull-right"></span>
              </div>
              <div class="panel-body">
                <table class="table table-striped">
                  <thead>
                    <tr class = "sortable">
                      <th>Name&nbsp;<span class = "glyphicon glyphicon-sort"></span></th>
                    </tr>
                  </thead> 
                  <tbody id = "pending-member-list"></tbody>
                </table>
              </div>
            </div>
          </div>            
          <div id = "current-member-list-holder" class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                  Current Members <span class="glyphicon glyphicon-circle-arrow-down pull-right"></span>
              </div>
              <div class="panel-body hidden">
                <table class="table table-striped tablesorter">
                  <thead>
                    <tr class = "sortable">
                      <th>Name&nbsp;<span class = "glyphicon glyphicon-sort"></span></th>
                    </tr>
                  </thead> 
                  <tbody id = "current-members-list"></tbody>
                </table>
              </div>
            </div>
          </div>
          <div id = "suspended-member-list-holder" class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                  Suspended Members<span class="glyphicon glyphicon-circle-arrow-down pull-right"></span>
              </div>
              <div class="panel-body hidden">
                <table class="table table-striped"> 
                  <thead>
                    <tr class = "sortable">
                      <th>Name&nbsp;<span class = "glyphicon glyphicon-sort"></span></th>
                    </tr>
                  </thead> 
                  <tbody id = "suspended-member-list"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="new_member_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="new_member_frm_title">New Member Form</h4>
          </div>
          <form name = "new_member_frm" id = "new_member_frm" action = "#" method = "post">
            <div class="modal-body" id = "new_member_frm_body"> 
              <div class='form-group'>
                <label class = 'control-label' for = 'memberName'>Company*</label>
                <input class= 'form-control' id = 'businessName' name = 'memberName' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberContactName'>Contact Name*</label>
                <input class= 'form-control' id = 'contactName' name = 'memberContactName' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberStreetAddress'>Street Adress*</label>
                <input class= 'form-control' id = 'Address1' name = 'memberStreetAddress' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberTown'>City*</label>
                <input class= 'form-control' id = 'City' name = 'memberTown' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberState'>State*</label>
                <select id = "State" Name = "memberState" class="form-control input-sm">
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select>
              </div>
              <div class='form-group'>
                <label class = 'control-label'  for = 'memberZip'>Zip*</label>
                <input class= 'form-control' id = 'Zip' name = 'memberZip' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberContactNum'>Tel</label>
                <input class= 'form-control' id = 'Tel' name = 'memberContactNum' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'Fax'>Fax</label>
                <input class= 'form-control' id = 'Fax' name = 'Fax' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberContactEmail'>eMail</label>
                <input class= 'form-control' id = 'eMail' name = 'memberContactEmail' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberDesc'>Description*</label>
                <textarea class= 'form-control' id = 'Description' name = 'memberDesc' style = "resize:none">  </textarea>
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberWebsite'>Website</label>
                <input class= 'form-control' id = 'Website' name = 'memberWebsite' type = 'text' />
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberCatID'>Business Type*</label>
                <select id = "BusinessType" Name = "memberCatID" class="form-control input-sm">
                </select>
              </div>
              <div class='form-group'>
                <label class = 'control-label' for = 'memberNoEmp'>No. Employees</label>
                <input class= 'form-control' id = 'NoEmployees' name = 'memberNoEmp' type = 'text' />
              </div>
              <div class='form-group'>
                <label for = 'memberYrsInArea'>Years in Area</label>
                <input class= 'form-control' id = 'YearsinArea' name = 'memberYrsInArea' type = 'text' />
              </div>
              <div class='form-group'>
                <label class= 'control-label'>Membership</label>
                <div id = 'mbr-lvl-radio-box'></div>
              </div>
              <input type = "hidden" id = "pkid" name = "pkid"/>
              <button id = "new_member_submit" name = "new_member_submit" class="btn btn-primary">Submit</button>
            </div>  
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="confirm_member_delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm</h4>
          </div>
          <div class="modal-body">
          Are you sure you would like to delete this member? 
          </div>
          <div class = "modal-footer">
            <button id = "mbr_delete_yes" name = "mbr_delete_yes" class="btn btn-success">Yes</button>
            <button id = "mbr_delete_no" name = "mbr_delete_no" class="btn btn-danger">No</button>
          <div>
        </div>
      </div>
    </div>
  </body>
</html>
