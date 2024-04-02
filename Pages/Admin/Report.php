<style type="text/css">
td.details-control {
    background: url('Pages/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('Pages/details_close.png') no-repeat center center;
}
</style>
<input type="hidden" id="BranchIDList">
<input type="hidden" id="VehicleID">
<input type="hidden" id="EquipmentID">
<input type="hidden" id="EmployeeID">
<input type="hidden" id="ProjectID">
<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title"><font class="ReportType" id="ReportTypeHeader">Vehicle</font> Report</h5>
                <div class="row">
                    <div class="position-relative form-group col-md-3">
                        <label class="">From Date</label>
                        <input id="FromDate" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group col-md-3">
                        <label class="">To Date</label>
                        <input id="ToDate" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group col-md-4">
                        <label class=""><font class="ReportType">Vehicle</font> ID</label><br>
                        <select class="chzn-select col-md-12" id="ContentID"><option value="ALL">ALL</option></select>
                    </div>
                    <div class="position-relative form-group col-md-2">
                        <label class="">&nbsp;</label><br>
                        <button class="btn btn-primary" id="ShowReport"> Show </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title"><font class="ReportType">Vehicle</font> List</h5>
                <table id="ReportTable" width="100%" border="1">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function ReportFunction(Content){
    $('#ContentID').find('option').remove().end().append('<option value="ALL">ALL</option>').val('ALL').trigger("liszt:updated");
    $('.ReportType').text(Content);
    ContentIDs = $('#'+Content+'ID').val().split('^^');
    if(Content == 'Vehicle') Text = 2; else Text = 0;
    for(i=0;i<ContentIDs.length;i++)
        $('#ContentID').append("<option value='"+ContentIDs[i].split('|')[1]+"'>"+ContentIDs[i].split('|')[Text]+"</option>").trigger("liszt:updated");
}
function LoadAutoCompletes(FilterContents){
    $.ajax({
        url:"Backend/Transport/AddGatePassController.php?"+FilterContents,
        success: function(data){
            if(FilterContents == 'LoadVehicle'){ LoadAutoCompletes('LoadEquipments');
            $('#VehicleID').val(data); }
            else if(FilterContents == 'LoadEquipments'){ LoadAutoCompletes('LoadProjects');$('#EquipmentID').val(data); }
            else if(FilterContents == 'LoadProjects'){ LoadAutoCompletes('LoadDriver'); $('#ProjectID').val(data)}
            else if(FilterContents == 'LoadDriver') $('#EmployeeID').val(data);
        }
    });
}
function format ( data ) {
    data = data.split('&');var RowFormat = "";
    for(i=1;i<data.length;i++){
        DateTime = data[i].split('^^')[0];
        InOutStatus = data[i].split('^^')[1];
        Branch = data[i].split('^^')[2];
        VehicleID = data[i].split('^^')[3];
        var BranchName = $('#BranchIDList').val().split(',');
        BranchName=(BranchName[Branch-1].split('|')[1]);
        RowFormat += '<tr>'+
            '<td>'+DateTime+'</td>'+
            '<td>'+((InOutStatus == 1) ? "Checked Out" : "Checked In" )+'</td>'+
            '<td>'+VehicleID+'</td>'+
            '<td>'+BranchName+'</td>'+
        '</tr>';
    }
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;"><thead><tr><th>Date Time</th><th>Check IN/OUT</th><th>Vehicle ID</th><th>Branch</th></thead>'+RowFormat+'</table>';
}
function LoadReport(DataContent){
    if(DataContent == 'VehicleReport'){
        $('<thead><tr><th>S.No</th><th>Date Time</th><th>Employee Name</th><th>Vehicle ID</th><th>Vehicle Name</th><th>Vehicle No</th><th>Branch</th><th>Check IN/OUT</th></tr></thead>').appendTo($("#ReportTable"));
        var columns = [
            {mData: "Sno", "width":"1%", "className": "text-center" },
            {mData: "DateTime", "width":"15%"},
            {mData: "EmployeeName", "width":"20%"},
            {mData: "VehicleID", "width":"10%" , "className": "text-center"},
            {mData: "VehicleName", "width":"12%","className": "text-left"},
            {mData: "VehicleNumber", "width":"10%","className": "text-left"},
            {mData: "BranchID", "width":"20%","className": "text-right"},
            {mData: "InOutStatus", "width":"15%","className": "text-right"}            
        ];
        ContentID = $('#ContentID option:selected').val();
    }
    else if(DataContent == 'EquipmentReport' || DataContent == 'EmployeeReport' || DataContent == 'ProjectReport'){
        $('<thead><tr><th></th><th>Date Time</th><th>GatePass ID</th><th>Equipment Name</th><th>Quantity</th><th>Remarks</th><th>Vehicle No</th><th>Project Name</th><th>Employee Name</th></tr></thead>').appendTo($("#ReportTable"));
        var columns = [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "DateTime" },
            { "data": "GatePassID" },
            { "data": "EquipmentName" },
            { "data": "Quantity" },
            { "data": "Remarks" },
            { "data": "VehicleNumber" },
            { "data": "ProjectName" },
            { "data": "EmployeeName" }
        ];
        ContentID = $('#ContentID option:selected').val();
    }
    $('#ReportTable').show().DataTable().destroy();
    var table = $('#ReportTable').DataTable({
        ajax: {
            "url": 'Backend/Admin/ReportProcedure.php?'+DataContent+'=true',
            "type" : "POST",
            data:{ FromDate:$('#FromDate').val(), ToDate:$('#ToDate').val(), ContentID:ContentID, DataContent:DataContent },
            "dataSrc": function ( json ) {
                console.log(json);
                return json.data;
            }
        },
        responsive: true,
        scrollX: true,
        "aoColumns":columns,
    });
}
$('#ReportTable tbody').on('click', 'td.details-control', function(){
    var tr = $(this).closest('tr');
    var row = $('#ReportTable').DataTable().row( tr );
    if ( row.child.isShown() ) {
        row.child.hide();
        tr.removeClass('shown');
    }
    else {
        row.child( format(row.data().InOutHistory) ).show();
        tr.addClass('shown');
    }
});
$(document).ready(function(){
    $('.chzn-select').chosen();
    $('#FromDate, #ToDate').datepicker({ format: 'dd-mm-yyyy' });
    $.get('Backend/Branches.json', function (data){
        var splitter = data.split('\n');
        $('#BranchIDList').val(splitter);
    }, 'text');
    LoadAutoCompletes('LoadVehicle');
    setTimeout(function(){ReportFunction('Vehicle');},1000);
});
$('#ShowReport').on('click', function(){
    $('#ReportTable thead').remove();
    LoadReport($('#ReportTypeHeader').text()+'Report');
});
</script>