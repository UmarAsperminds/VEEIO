<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
    <li class="nav-item TabNavigator" Reason='AddNewUser'>
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span>Add / Edit User Details</span>
        </a>
    </li>
    <li class="nav-item TabNavigator" Reason='UserRights'>
        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
            <span>Set User Rights</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-md-5">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add Or Edit User</h5>
                        <div class="position-relative form-group">
                            <input type="hidden" id="UMUserID">
                            <label for="UMDate" class="">Date</label>
                            <input id="UMDate" value="<?php echo date('Y-m-d'); ?>" type="text" class="form-control" disabled='true'>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="UMUserName" class="">User Name</label>
                                    <div class="input-group">
                                        <input id="UMUserName" placeholder="User Name" type="text" class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="UMContactNo" class="">Contact No</label>
                                    <input id="UMContactNo" placeholder="Contact No" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="UMEmail" class="">Email</label>
                            <input id="UMEmail" placeholder="Email Address" type="text" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="UMPassword" class="">Password</label>
                                    <input id="UMPassword" placeholder="Password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="UMRePassword" class="">Re-Password</label>
                                    <input id="UMRePassword" placeholder="Re-Type Password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="UMIsAdmin" class="">Admin Access</label>
                                    <select id="UMIsAdmin" class="form-control">
                                        <option value="0"> False </option>
                                        <option value="1"> True </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="mt-1 btn btn-primary SubmitButton" Reason='User' id="AddNewUser">Add New User</button>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Existing User List</h5>
                        <table id="UserMasterTable" width="100%" border="1">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane tabs-animation fade active" id="tab-content-1" role="tabpanel">
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Set Rights to the User</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="RightsUserName" class="">User Name</label>
                                    <div class="input-group">
                                        <select id="RightsUserName" class="chzn-select col-md-12"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="AllowedPages" class="">Access Controls</label>
                                    <select id="AllowedPages" class="chzn-select col-md-12" multiple=""></select>
                                </div>
                            </div>
                        </div>
                        <button class="mt-1 btn btn-primary SubmitButton" id="UpdateUserRights">Update User Access</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function LoadTableContent(DataContent){
    $('#'+DataContent).DataTable({
        ajax: {
            "url": 'Backend/Admin/UserMasterProcedure.php?ContentTable=true',
            "type" : "GET",
            "dataSrc": function ( json ) {
                $('#RightsUserName').empty().trigger('liszt:updated')
                var UsersList = "<option value=''></option>";
                $(json.data).each(function(val){
                    UsersList += "<option value='"+json.data[val].UserID+"'>"+json.data[val].UserName+"</option>";
                })
                $('#RightsUserName').append(UsersList).trigger('liszt:updated')
                return json.data;
            }
        },
        responsive: true,
        scrollX: true,
        columns: [
            { data: "Sno" },
            { data: "UserName" },
            { data: "Email" },
            { data: "ContactNo" },
            { data: "Edit" },
            { data: "Delete" }
        ],
    });
}
function LoadDetails(ContentID){
    $.ajax({
        url:"Backend/Admin/UserMasterProcedure.php?InsUpUser",
        type:"POST",
        data:{ ContentID: ContentID, Action:'S' },
        success: function(data){
            var split = data.split('^');
            var array = [ "UMUserID", "UMDate", "UMUserName", "UMContactNo", "UMEmail", "UMRePassword", "UMPassword"];
            for(i=0;i<split.length;i++){
                $('#'+array[i]).val(split[i].trim()).trigger("liszt:updated");
            }
            $('#AddNewUser').text('Update User Details');
            notifications('Edit : ','You can make your Editings Here!','primary','icon-check');
        }
    });
}
function DeleteDetails(ContentID){
    if(confirm("Are you sure to Delete this Data")){
        $.ajax({
            url:"Backend/Admin/UserMasterProcedure.php?DeleteData=true",
            type:"POST",
            data:{ ContentID: ContentID },
            success: function(data){
                if(data === 'SUCCESS'){
                    notifications('Success : ','User have Successfully Removed !','success','icon-check');
                    $('#UserMasterTable').DataTable().ajax.reload();
                }
                else
                    notifications('error : ','User cannot be removed !','danger','icon-check');
            }
        });
    }
}
$(document).ready(function(){
    $('#RightsUserName, #AllowedPages').chosen();
    LoadTableContent('UserMasterTable');
    $.get('assets/Pages.txt', function(data){
        $('#AllowedPages').append(data).trigger('liszt:updated');
    });
});
$('#AddNewUser').on('click', function(){
    var Action = "I";
    if($('#UMUserID').val() !== '') Action = "U";
    $.ajax({
        url:'Backend/Admin/UserMasterProcedure.php?InsUpUser=true',
        type:"POST",
        data:{ UserName:$('#UMUserName').val(), UserID:$('#UMUserID').val(), Password:$('#UMPassword').val(), Email:$('#UMEmail').val(), PhoneNo:$('#UMContactNo').val(), Date:$('#UMDate').val(), Action:Action, IsAdmin:$('#UMIsAdmin').val() },
        success: function(data){
            $('#UserMasterTable').DataTable().ajax.reload();
            $('input').val('');
            $('#UMDate').val('<?php echo date("Y-m-d"); ?>');
            notifications('Success : ','User Details '+((Action === 'I') ? 'Created' : 'Updated') +' Successfully!','success','icon-check');
            $('#AddNewUser').text('Add New User');
        }
    })
})
$('#UpdateUserRights').on('click', function(){
    $.ajax({
        url:'Backend/Admin/UserMasterProcedure.php?UpdateUserRights=true',
        type:"POST",
        data:{ AllowedPages:$('#AllowedPages').val().toString(), UserID:$('#RightsUserName').val() },
        success: function(data){
            if(data === 'SUCCESS'){
                notifications('Success : ','User Rights Updated Successfully!','success','icon-check');
                $('#RightsUserName, #AllowedPages').val('').trigger('liszt:updated');
            }
            else
                notifications('Error : ','User Rights Cannot be Updated!','danger','icon-check');
        }
    })  
});
</script>