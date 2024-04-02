<div class="row">
    <div class="col-md-6" id="Card1Div">
        <h5 class="card-title" style="text-align: center; font-size: 18px;">SEMICO<br><br>Check In/Out Panel - <?php echo date('d-m-Y'); ?></h5>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title" style="width: 100%;">Security Grid <button class="btn btn-danger" style="margin-left: 35%;" id="Reset">RESET</button></h5>
                <div class="row">
                    <table width="100%">
                        <tr id="GatePassRow">
                            <td>
                                <div class="position-relative form-group col-md-3">
                                    <label for="GatePassID" class="">GatePassID</label>
                                    <input id="GatePassID" type="text" class="form-control" >
                                </div>
                            </td>
                            <td><button class="btn btn-primary" style="margin-top: 20%;" id="VerifyGatePass">>></button></td>
                        </tr>
                        <tr id="VehicleNumberRow">
                            <td>
                                <div class="position-relative form-group col-md-3">
			                        <label for="VehicleNumberCheck" class="">Vehicle ID</label>
			                        <input id="VehicleNumberCheck" type="number" class="form-control">
			                    </div>
                            </td>
                            <td><button class="btn btn-primary" style="margin-top: 20%;" id="VerifyVehicleNumber">>></button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="display: none;" id="GatePassPreview">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title" style="font-size: 20px; text-align: center;">SEMICO</h5>
                <table width="100%">
                    <tr>
                        <td width="50%"><b>Driver Name : </b><br><font id="DriverName"></font></td>
                        <td rowspan="2"><b>Driver Photo : </b><img src="" id="DriverImage" width="150"></td>
                    </tr>
                    <tr>
                        <td><b>Project Name : </b><br><font id="ProjectName"></font></td>
                    </tr>
                </table><br>
                <table id="PreviewTable" width="100%" border="1">
                    <thead>
                        <tr>
                            <th>Quantity</th>
                            <th style="text-align: center;">Description</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table><br>
                <table width="100%">
                    <tr>
                        <td width="50%"><b>Vehicle : </b><br><font id="VehicleNumber"></font></td>
                        <td><b>Authorized By : </b><font id="AuthorizedBy"></font></td>
                    </tr>
                </table><br>
                <button class="btn btn-success form-control" id="GatePassCheckInOut"></button>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="display: none;" id="VehicleNumberPreview">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title" style="font-size: 20px; text-align: center;">SEMICO</h5>
                <table width="100%">
                    <tr>
                        <td width="50%"><b>Driver Name : </b><br><font id="VehicleDriverName"></font></td>
                        <td rowspan="2"><b>Driver Photo : </b><img src="" id="VehicleDriverImage" width="150"></td>
                    </tr>
                    <tr>
                        <td><b>Designation : </b><br><font id="Designation"></font></td>
                    </tr>
                </table><br>
                <table width="100%">
                    <tr>
                        <td width="50%"><b>Vehicle Number : </b><br><input type="hidden" id="VehicleID"><font id="VehicleNo"></font></td>
                        <td><b>Vehicle Name : </b><font id="VehicleName"></font></td>
                    </tr>
                </table><br>
                <button class="btn btn-success form-control" id="VehicleCheckInOut"></button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function LoadGatePass(GatePassID){
    //$.fn.dataTable.ext.errMode = 'none';
    var SecurityBranchID = window.location.search.split('?')[1].split('&')[1].split('=')[1];
    $('#PreviewTable').DataTable().destroy();
    $('#PreviewTable').DataTable({
        ajax: {
            "url": 'Backend/Security/EntryProcedure.php?GetGatePass=true&GatePassID='+GatePassID+"&SecurityBranchID="+SecurityBranchID,
            "dataSrc": function ( json ) {
                console.log(json);
                if(json.Result.match("Danger")){
                    var splitter = json.Result.split(':');
                    notifications(splitter[0]+' : ',splitter[1],splitter[0].toLowerCase(),'icon-check');
                }
                else{
                    if(json.CheckInOutVehicle == "")
                        notifications('Error : ','Vehicle already Check In to Next Branch!','danger','icon-check');    
                    else{
                        $('#GatePassPreview').show();
                        var FieldArray = ["DriverName","ProjectName","VehicleNumber","AuthorizedBy","GatePassCheckInOut"];
                        for(i=0;i<FieldArray.length;i++)
                            $('#'+FieldArray[i]).val(json.data[0][FieldArray[i]]).text(json.data[0][FieldArray[i]]);
                        $('#DriverImage').attr('src',"Uploaded/"+json.data[0].Image);
                        $('#GatePassCheckInOut').attr('Status',json.CheckInOutVehicle.split(' ')[1]).text(json.CheckInOutVehicle);
                        return json.data;
                    }
                }
            }
        },
        "aoColumns":[
            {mData: "Quantity", "width":"1%", "className": "text-center" },
            {mData: "EquipmentName", "width":"50%"},
            {mData: "Remarks", "width":"10%","className": "text-center"}
        ],
        searching: false, paging: false, info: false,
        "createdRow": function(row, data, index){
            var CheckInOut = $('#GatePassCheckInOut').text();
            console.log(data.GatePassCheckInOut);
            if(data.GatePassCheckInOut != CheckInOut)
                $(row).hide();
        }
    });
}
function PreviewReset(){
	$('#GatePassRow, #VehicleNumberRow').show().find('input').val('');
	$('#GatePassPreview, #VehicleNumberPreview').hide();
}
$(document).ready(function(){});

$('#GatePassID, #VehicleNumberCheck, button').on('focus', function(e){
	if(e.type == 'focus'){
		if($(this).attr('id') == 'GatePassID' || $(this).attr('id') == 'VerifyGatePass')
	    	$('#VehicleNumberRow').hide();
	    else if($(this).attr('id') == 'VehicleNumberCheck' || $(this).attr('id') == 'VerifyVehicleNumber')
	    	$('#GatePassRow').hide();
	}
	if($(this).attr('id') == "Reset"){
    	PreviewReset();
	}
});
$('#VerifyGatePass').on('click', function(){
    $('#GatePassPreview').hide();
    if($('#GatePassID').val() != ''){
        LoadGatePass($('#GatePassID').val());
    }
    else
        notifications('Error : ','Please Enter the GatePass ID !','danger','icon-check');
});
$('#VerifyVehicleNumber').on('click', function(){
    var SecurityBranchID = window.location.search.split('?')[1].split('&')[1].split('=')[1];
	$.ajax({
        url:"Backend/Security/EntryProcedure.php?VehicleNumberCheck",
        type:"POST",
        data:{ VehicleNumber:$('#VehicleNumberCheck').val(), SecurityBranchID:SecurityBranchID },
        success: function(data){
            console.log(data);
            var split = data.split("^");
            if(split[4] == '')
                notifications('Error : ','Vehicle already Check In to Next Branch!','danger','icon-check');
            else{
            	$('#VehicleNumberPreview').show();
            	var FieldArray = ["VehicleDriverName", "Designation", "VehicleName", "VehicleNo", "VehicleCheckInOut", "VehicleID"];
            	for(i=0;i<FieldArray.length;i++)
            		$('#'+FieldArray[i]).text(split[i]).val(split[i]);
            	$('#VehicleDriverImage').attr('src','Uploaded/'+split[FieldArray.length]);
            }
        }
    });
});
$('#GatePassCheckInOut').on('click', function(){
    var EquipmentList = "";
    InOut = $(this).attr('Status');
    InOutStatus = (InOut == 'Out') ? 1 : 0;
    $('.EquipmentIDList:checkbox:checked').each(function(){ EquipmentList += $(this).val()+"," });
    var SecurityBranchID = window.location.search.split('?')[1].split('&')[1].split('=')[1];
    $.ajax({
        url:"Backend/Security/EntryProcedure.php?GatePassCheckInOut",
        type:"POST",
        data:{ GatePassID:$("#GatePassID").val(), SecurityBranchID:SecurityBranchID, EquipmentList:EquipmentList.slice(0, -1), InOutStatus:InOutStatus },
        success: function(data){
            console.log(data);
            notifications(data+' : ','Gate Pass Check '+InOut+' Successfull',data.toLowerCase(),'icon-check');    
            PreviewReset();
        }
    });
});
$('#VehicleCheckInOut').on('click', function(){
	CheckInOut = $(this).text();
	if(CheckInOut == 'Check Out')
		InOutStatus = 1;
	else if(CheckInOut == 'Check In')
		InOutStatus = 0;
    var SecurityBranchID = window.location.search.split('?')[1].split('&')[1].split('=')[1];
	$.ajax({
        url:"Backend/Security/EntryProcedure.php?VehicleCheckInOut",
        type:"POST",
        data:{ VehicleID:$("#VehicleID").val(), InOutStatus:InOutStatus, BranchID:SecurityBranchID },
        success: function(data){
        	notifications(data+' : ','Employee '+CheckInOut+' Successfull',data.toLowerCase(),'icon-check');	
        	PreviewReset();
        }
    });
});
</script>