<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
    <li class="nav-item TabNavigator" Reason='VehicleTable'>
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span>Vehicle</span>
        </a>
    </li>
    <li class="nav-item TabNavigator" Reason='EquipmentTable'>
        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
            <span>Equipment</span>
        </a>
    </li>
    <li class="nav-item TabNavigator" Reason='ProjectTable'>
        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
            <span>Project</span>
        </a>
    </li>
    <li class="nav-item TabNavigator" Reason='DesignationTable'>
        <a role="tab" class="nav-link" id="tab-3" data-toggle="tab" href="#tab-content-3">
            <span>Designation</span>
        </a>
    </li>
    <li class="nav-item TabNavigator" Reason='EmployeeTable'>
        <a role="tab" class="nav-link" id="tab-4" data-toggle="tab" href="#tab-content-4">
            <span>Employee</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-md-3">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add Or Edit Vehicles</h5>
                        <div class="position-relative form-group">
                            <input type="hidden" id="VehicleID">
                            <label for="VehicleDate" class="">Date</label>
                            <input id="VehicleDate" value="<?php echo date('d-m-Y'); ?>" type="text" class="form-control" disabled='true'>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                	<label for="VehicleVC" class="">Vehicle ID</label>
                                    <div class="input-group">
                                        <input id="VehicleVC" placeholder="Vehicle ID" type="text" class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="IsthimaraNumber" class="">Isthimara No</label>
                                    <input id="IsthimaraNumber" style="text-transform: uppercase;" placeholder="Isthimara Number" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="VehicleName" class="">Vehicle Name</label>
                            <input id="VehicleName" placeholder="Please Enter the Vehicle Name" type="text" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="VehicleNumber" class="">Vehicle Number</label>
                                    <input id="VehicleNumber" style="text-transform: uppercase;" placeholder="Vehicle No" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="InsuranceExpiry" class="">Insurance Expiry</label>
                                    <input id="InsuranceExpiry" style="text-transform: uppercase;" placeholder="Insurance Expiry" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="VehicleNativeBranch" class="">Vehicle Now at</label>
                                    <select id="VehicleNativeBranch" class="chzn-select form-control BranchList"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="ComputerExpiry" class="">Computer Expiry</label>
                                    <input id="ComputerExpiry" style="text-transform: uppercase;" placeholder="Computer Expiry" type="text" class="form-control">
                                </div>  
                            </div>
                        </div>
                        <button class="mt-1 btn btn-primary SubmitButton" Reason='Vehicle' id="AddVehicle">Add New Vehicle</button>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Vehicles List</h5>
                        <table id="VehicleTable" width="100%" border="1">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>C.Date</th>
                                    <th>Veh.ID</th>
                                    <th>Veh.Name</th>
                                    <th>Veh.No</th>
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
    <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
        <div class="row">
            <div class="col-md-3">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add Or Edit Equipments</h5>
                        <div class="position-relative form-group">
                            <input type="hidden" id="EquipmentID">
                            <label for="EquipmentDate" class="">Date</label>
                            <input id="EquipmentDate" value="<?php echo date('d-m-Y'); ?>" type="text" class="form-control" disabled='true'>
                        </div>
                        <div class="position-relative form-group">
                            <label for="EquipmentVC" class="">Equipment ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"> 15- </span></div>
                                <input id="EquipmentVC" placeholder="Equipment ID" type="text" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="EquipmentName" class="">Equipment Name</label>
                            <input id="EquipmentName" placeholder="Please Enter the Equipment Name" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="EquipmentNativeBranch" class="">Equipment Now at</label>
                            <select id="EquipmentNativeBranch" class="chzn-select form-control BranchList" style="width: 250%;"></select>
                        </div>
                        <div class="position-relative form-group">
                            <label for="EquipmentStickerExpiry" class="">Equipment Sticker Expiry</label>
                            <input id="EquipmentStickerExpiry" placeholder="Please Enter the Sticker Expiry" type="text" class="form-control">
                        </div>
                        <button class="mt-1 btn btn-primary SubmitButton" Reason='Equipment' id="AddEquipment">Add New Equipment</button>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Equipments List</h5>
                        <table id="EquipmentTable" width="100%" border="1">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>C.Date</th>
                                    <th>Equipment.ID</th>
                                    <th>Equipment.Name</th>
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
    <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
        <div class="row">
            <div class="col-md-3">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add Or Edit Projects</h5>
                        <div class="position-relative form-group">
                            <input type="hidden" id="ProjectID">
                            <label for="ProjectDate" class="">Date</label>
                            <input id="ProjectDate" value="<?php echo date('d-m-Y'); ?>" type="text" class="form-control" disabled='true'>
                        </div>
                        <div class="position-relative form-group">
                            <label for="ProjectVC" class="">Project ID</label>
                            <div class="input-group">
                                <!-- <div class="input-group-prepend"><span class="input-group-text"> PR_ </span></div> -->
                                <input id="ProjectVC" placeholder="Project ID" type="text" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="ProjectClient" class="">Project Client</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"> C </span></div>
                                <input id="ProjectClient" placeholder="Client Name" type="text" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="ProjectName" class="">Project Name</label>
                            <input id="ProjectName" placeholder="Please Enter the Project Name" type="text" class="form-control">
                        </div>
                        <button class="mt-1 btn btn-primary SubmitButton" Reason='Project' id="AddProject">Add New Project</button>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Projects List</h5>
                        <table id="ProjectTable" width="100%" border="1">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>C.Date</th>
                                    <th>Client</th>
                                    <th>Proj.ID</th>
                                    <th>Proj.Name</th>
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
    <div class="tab-pane tabs-animation fade" id="tab-content-3" role="tabpanel">
        <div class="row">
            <div class="col-md-3">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add Or Edit Designation</h5>
                        <div class="position-relative form-group">
                            <input type="hidden" id="DesignationID">
                            <label for="DesignationDate" class="">Date</label>
                            <input id="DesignationDate" value="<?php echo date('d-m-Y'); ?>" type="text" class="form-control" disabled='true'>
                        </div>
                        <div class="position-relative form-group">
                            <label for="DesignationName" class="">Designation Label</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"> D </span></div>
                                <input id="DesignationName" placeholder="Designation Label" type="text" class="form-control">
                            </div>
                        </div>
                        <button class="mt-1 btn btn-primary SubmitButton" Reason='Designation' id="AddDesignation">Add New Designation</button>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Designation List</h5>
                        <table id="DesignationTable" width="100%" border="1">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>C.Date</th>
                                    <th>Designation</th>
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
    <div class="tab-pane tabs-animation fade" id="tab-content-4" role="tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add Or Edit Employer</h5>
                        <form id="EmployeeForm" enctype="multipart/form-data" onsubmit="return false;">
	                        <div class="row">
		                        <div class="position-relative form-group col-md-4">
		                            <input type="hidden" id="EmployeeID" name="EmployeeID">
		                            <label for="EmployeeDate" class="">Date</label>
		                            <input id="EmployeeDate" value="<?php echo date('d-m-Y'); ?>" type="text" class="form-control" disabled='true' name="EmployeeDate">
		                        </div>
		                        <div class="position-relative form-group col-md-4">
		                            <label for="EmployeeVC" class="">Employee ID</label>
			                        <div class="input-group">
			                            <input class="form-control col-md-2" id="EmployeeID1" name="EmployeeID1">
			                            <input id="EmployeeID2" placeholder="Employee ID" type="text" class="form-control" name="EmployeeID2">
			                        </div>
		                        </div>
                                <div class="position-relative form-group col-md-4">
                                    <label for="Iqama_Number" class="">Iqama Number</label>
                                    <div class="input-group">
                                        <input id="Iqama_Number" placeholder="Iqama Number" type="text" class="form-control" name="Iqama_Number">
                                    </div>
                                </div>
		                    </div>
		                    <div class="row">
		                        <div class="position-relative form-group col-md-4">
		                            <label for="EmployeeName" class="">Employee Name</label>
		                            <div class="input-group">
		                                <div class="input-group-prepend"><span class="input-group-text"> E </span></div>
		                                <input id="EmployeeName" placeholder="Employee Name" type="text" class="form-control" name="EmployeeName">
		                            </div>
		                        </div>
		                        <div class="position-relative form-group col-md-4">
		                            <label for="EmployeeImage" class="">Employee Photo</label>
                                    <div class="input-group">
                                        <input id="EmployeeImage" type="file" name="EmployeeImage" accept="image/*">
                                    </div>
		                        </div>
                                <div class="position-relative form-group col-md-4">
                                    <label for="Iqama_Expiry" class="">Iqama Expiry</label>
                                    <div class="input-group">
                                        <input id="Iqama_Expiry" placeholder="Iqama Expiry" type="text" class="form-control" name="Iqama_Expiry">
                                    </div>
                                </div>
	                    	</div>
	                    	<div class="row">
		                        <div class="position-relative form-group col-md-4">
		                            <label for="Address" class="">Address</label>
		                            <textarea id="EmployeeAddress" placeholder="Please Enter the Employee Address" class="form-control" rows='4' name="EmployeeAddress"></textarea>
		                        </div>
		                        <div class="col-md-4"><img id="EmployeeImagePreview" src="#" alt="your image" width="200" height="200" /></div>
                                <div class="position-relative form-group col-md-4">
                                    <label for="Aramco_ID_Number" class="">Aramco ID Number</label>
                                    <div class="input-group">
                                        <input id="Aramco_ID_Number" placeholder="Aramco ID Number" type="text" class="form-control" name="Aramco_ID_Number">
                                    </div>
                                </div>
		                    </div>
		                    <div class="row">
		                    	<div class="position-relative form-group col-md-4">
		                            <label for="EmployeeContact" class="">Employee Contact</label>
		                            <div class="input-group">
		                                <div class="input-group-prepend"><span class="input-group-text"> C </span></div>
		                                <input id="EmployeeContact" name="EmployeeContact" placeholder="Employee Contact" type="number" class="form-control">
		                            </div>
		                        </div>
		                        <div class="position-relative form-group col-md-4">
		                            <label for="EmployeeEmail" class="">Employee Email</label>
		                            <div class="input-group">
		                                <div class="input-group-prepend"><span class="input-group-text"> @ </span></div>
		                                <input id="EmployeeEmail" placeholder="Employee Email" name="EmployeeEmail" type="email" class="form-control">
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row">
		                    	<div class="position-relative form-group col-md-4">
		                            <label for="EmployeeVehicle" class="">Employee Vehicle</label><br>
		                            <select id="EmployeeVehicle" class="chzn-select form-control" style="width: 150%;" name="EmployeeVehicle">
		                            </select>
		                        </div>
		                        <div class="position-relative form-group col-md-4">
		                            <label for="EmployeeDesignation" class="">Employee Designation</label><br>
		                            <select id="EmployeeDesignation" class="chzn-select form-control" style="width: 150%;" name="EmployeeDesignation">
		                            </select>
		                        </div>
                                <div class="position-relative form-group col-md-4">
                                    <label for="EmployeeNativeBranch" class="">Employee Working at</label><br/>
                                    <select id="EmployeeNativeBranch" class="chzn-select form-control BranchList" style="width: 150%;" name="EmployeeNativeBranch"></select>
                                </div>
		                    </div>
	                        <button type="submit" class="mt-1 btn btn-primary" Reason='Project' id="AddEmployee">Add New Employee</button>
	                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Employers List</h5>
                        <table id="EmployeeTable" width="100%" border="1">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Emp.Name</th>
                                    <th>Emp.ID</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>VID</th>
                                    <th>Designation</th>
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
</div>
<script type="text/javascript">
function readEmployeeImage(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
	  		$('#EmployeeImagePreview').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]); // convert to base64 string
	}
}

function LoadVehicleDesignation(){
	$.ajax({
        url:"Backend/Admin/AddNewProcedure.php?LoadVehicleDesignation",
        success: function(data){
        	var split = data.split("^");
        	var DesignationNames = split[0].split('$');
        	var VehicleIDs = split[1].split('$');
        	for(i=0;i<DesignationNames.length;i++)
        		$('#EmployeeDesignation').append("<option value='"+DesignationNames[i].split('|')[1]+"'>"+DesignationNames[i].split('|')[0]+"</option>").trigger("liszt:updated");
        	for(i=0;i<VehicleIDs.length;i++)
        		$('#EmployeeVehicle').append("<option value='"+VehicleIDs[i].split('|')[1]+"'>"+VehicleIDs[i].split('|')[0]+"</option>").trigger("liszt:updated");
        }
    });
}

$("#EmployeeImage").change(function() {
	readEmployeeImage(this);
});

function LoadDetails(Content, ContentID){
	var Reason = Content.substring(0, Content.indexOf("Table"));
    $.ajax({
        url:"Backend/Admin/AddNewProcedure.php?InsUp"+Reason,
        type:"POST",
        data:{ ContentID: ContentID, Action:'S' },
        success: function(data){
            var split = data.split('^');
            if(Reason == 'Vehicle')
            	var array = [ "VehicleID", "Date", "VehicleVC", "VehicleName", "VehicleNumber", "VehicleNativeBranch", "IsthimaraNumber", "InsuranceExpiry", "ComputerExpiry" ];
            else if(Reason == 'Equipment')
            	var array = [ "EquipmentID", "Date", "EquipmentVC", "EquipmentName", "EquipmentNativeBranch", "EquipmentStickerExpiry"];
            else if(Reason == 'Project')
            	var array = [ "ProjectID", "Date", "ProjectVC", "ProjectClient", "ProjectName"];
            else if(Reason == 'Designation')
            	var array = [ "DesignationID", "Date", "DesignationName"];
            else if(Reason == 'Employee'){
                var array = [ "EmployeeID", "EmployeeDate", "EmployeeID2", "EmployeeName", "EmployeeAddress", "EmployeeContact", "EmployeeEmail", "EmployeeVehicle", "EmployeeDesignation", "EmployeeNativeBranch", "Iqama_Number", "Iqama_Expiry", "Aramco_ID_Number"];
            }
            for(i=0;i<split.length;i++){
                $('#'+array[i]).val(split[i].trim()).trigger("liszt:updated");
            }
            if(Reason == 'Employee') $('#EmployeeImagePreview').attr('src', 'Uploaded/'+split[split.length-1]);
            $('#Add'+Reason).text('Update '+Reason+' Details');
            notifications('Edit : ','You can make your Editings Here!','primary','icon-check');
        }
    });
}

function DeleteDetails(Content, ContentID){
    if(confirm("Are you sure to Delete this Data")){
        var DataType = Content.substring(0, Content.indexOf("Table"));
        $.ajax({
            url:"Backend/Admin/AddNewProcedure.php?DeleteData=true&DataType="+DataType,
            type:"POST",
            data:{ ContentID: ContentID, Action:'S' },
            success: function(data){
                if(data === 'SUCCESS'){
                    notifications('Success : ',DataType+' have Successfully Removed !','success','icon-check');
                    $('#'+DataType+'Table').DataTable().ajax.reload();
                }
                else
                    notifications('error : ',DataType+' cannot be removed !','danger','icon-check');
            }
        });
    }
}

function LoadTableContent(DataContent){
	$('#'+DataContent).DataTable().destroy();
    if(DataContent == 'VehicleTable'){
        var columns = [
            {mData: "Sno", "width":"1%", "className": "text-center" },
            {mData: "Date", "width":"30%"},
            {mData: "VehicleID", "width":"15%"},
            {mData: "VehicleName", "width":"25%","className": "text-right"},
            {mData: "VehicleNumber", "width":"45%","className": "text-right"},            
            {mData: "Edit", "width":"35%","className": "text-right"},
        ];
    }
    else if(DataContent == 'EquipmentTable'){
        var columns = [
            {mData: "Sno", "width":"1%", "className": "text-center" },
            {mData: "Date", "width":"30%"},
            {mData: "EquipmentID", "width":"25%"},
            {mData: "EquipmentName", "width":"15%","className": "text-right"},
            {mData: "Edit", "width":"35%","className": "text-right"},
        ];   
    }
    else if(DataContent == 'ProjectTable'){
        var columns = [
            {mData: "Sno", "width":"1%", "className": "text-center" },
            {mData: "Date", "width":"30%"},
            {mData: "ClientName", "width":"25%"},
            {mData: "ProjectID", "width":"25%"},
            {mData: "ProjectName", "width":"15%","className": "text-right"},
            {mData: "Edit", "width":"35%","className": "text-right"},
        ];   
    }
    else if(DataContent == 'DesignationTable'){
        var columns = [
            {mData: "Sno", "width":"1%", "className": "text-center" },
            {mData: "Date", "width":"30%"},
            {mData: "DesignationName", "width":"25%"},
            {mData: "Edit", "width":"5%","className": "text-right"},
        ];   
    }
    else if(DataContent == 'EmployeeTable'){
        var columns = [
            {mData: "Sno", "width":"1%", "className": "text-center" },
            {mData: "EmployeeName", "width":"25%"},
            {mData: "EmployeeID", "width":"25%"},
            {mData: "ContactNo", "width":"25%"},
            {mData: "EmailID", "width":"25%"},
            {mData: "VehicleID", "width":"25%"},
            {mData: "DesignationName", "width":"25%"},
            {mData: "Edit", "width":"35%","className": "text-right"},
        ];   
    }
    // alert(sessionStorage.getItem("AuthenticateBy"));
    // if(sessionStorage.getItem("AuthenticateBy") === 'admin')
        columns.push({mData: "Delete", "width":"5%","className": "text-right"});
    $('#'+DataContent).DataTable({
        ajax: {
            "url": 'Backend/Admin/AddNewProcedure.php?ContentTable=true&DataContent='+DataContent,
            "type" : "GET",
            "dataSrc": function ( json ) {
                return json.data;
            }
        },
        responsive: true,
        scrollX: true,
        "aoColumns":columns,
    });
    setTimeout(function(){ $('#'+DataContent).DataTable().columns.adjust().draw(); },200);
}
$(document).ready(function(){
	$('.chzn-select').chosen();
    $('#InsuranceExpiry, #ComputerExpiry, #EquipmentStickerExpiry, #Iqama_Expiry').datepicker({ format: 'yyyy-mm-dd' });
	LoadVehicleDesignation()
	LoadTableContent('VehicleTable');
    $.get('Backend/Branches.json', function (data){
        var splitter = data.split('\n');
        for(i=0;i<splitter.length;i++)
            $('.BranchList').append("<option value='"+splitter[i].split("|")[0]+"'>"+splitter[i].split("|")[1]+"</option>").trigger("liszt:updated");
    }, 'text');
});
$('.TabNavigator').on('click', function(){
	//alert();
	LoadTableContent($(this).attr('Reason'));
	//document.getElementById($(this).attr('Reason')).click();
});
$('.SubmitButton').on('click', function(){
    var Reason = $(this).attr('Reason');
    if($('#'+Reason+'ID').val() == '') Action = 'I'; else Action = 'U';    
    if(Reason == 'Vehicle')
        var data = { VehicleVC: $('#VehicleVC').val(), VehicleName:$('#VehicleName').val(), VehicleDate:$('#VehicleDate').val(), VehicleNumber:$('#VehicleNumber').val(), Action:Action, VehicleID:$('#VehicleID').val(), NativeBranch:$('#VehicleNativeBranch').val(), Isthimara_Number:$('#IsthimaraNumber').val(),  Insurance_Expiry:$('#InsuranceExpiry').val(), Computer_Expiry:$('#ComputerExpiry').val() };
    else if(Reason == 'Equipment'){
        $('#'+Reason+'VC').val( $('#EquipmentVC').val() == '' ? " " : $('#EquipmentVC').val() )
        var data = { EquipmentVC: "15-"+$('#EquipmentVC').val().trim(), EquipmentName:$('#EquipmentName').val(), EquipmentDate:$('#EquipmentDate').val(), Action:Action, EquipmentID:$('#EquipmentID').val(), NativeBranch:$('#EquipmentNativeBranch').val(), EquipmentStickerExpiry:$('#EquipmentStickerExpiry').val() };
    }
    else if(Reason == 'Project')
        var data = { ProjectVC: $('#ProjectVC').val(), ProjectName:$('#ProjectName').val(), ProjectDate:$('#ProjectDate').val(), Action:Action, ProjectID:$('#ProjectID').val(), ProjectClient:$('#ProjectClient').val() };
    else if(Reason == 'Designation')
        var data = { DesignationDate:$('#DesignationDate').val(), Action:Action, DesignationID:$('#DesignationID').val(), DesignationName:$('#DesignationName').val() };
    if($('#'+Reason+'VC').val() != '' && $('#'+Reason+'Name').val() != ''){
        $.ajax({
            url:"Backend/Admin/AddNewProcedure.php?InsUp"+Reason,
            type:"POST",
            data:data,
            success: function(data){
                var splitter = data.split(':');
                $('input').val('');
                $('#'+Reason+'Date').val("<?php echo date('d-m-Y'); ?>");
                if(splitter[0] == 'Success')
                    $('#Add'+Reason).text('Add New '+Reason);
                $('input[id$="Date"]').val("<?php echo date('d-m-Y'); ?>");
                $('#'+Reason+'VC').focus();
                $('#'+Reason+'Table').DataTable().ajax.reload();
                notifications(splitter[0]+' : ',splitter[1],splitter[0].toLowerCase(),'icon-check');
            }
        });
    }
    else
        notifications('Error : ','Please Enter the Credentials!','danger','icon-check');
});
$('form#EmployeeForm').submit(function(e){
    e.preventDefault();
    var form_data = new FormData(this);
    if($('#EmployeeID').val() == '')
    	Action = 'I';
    else Action = 'U';
    $.ajax({
        url: "Backend/Admin/AddNewProcedure.php?InsUpEmployee=true&Action="+Action,
        type: 'POST',
        data: form_data,
        success: function (data) {
        	var splitter = data.split(':');
        	var Reason = 'Employee';
        	if(splitter[0] == 'Success')
                $('#Add'+Reason).text('Add New '+Reason);
            $('input[id$="Date"]').val("<?php echo date('d-m-Y'); ?>");
            $('#'+Reason+'VC').focus();
            $('#'+Reason+'Table').DataTable().ajax.reload();
            notifications(splitter[0]+' : ',splitter[1],splitter[0].toLowerCase(),'icon-check');
            $('#EmployeeForm').trigger("reset");
            $('#EmployeeImagePreview').attr('src','');
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
</script>