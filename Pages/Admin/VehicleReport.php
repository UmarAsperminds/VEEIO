<input type="hidden" id="BranchIDList">
<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Vehicle Report</h5>
                <div class="row">
                    <div class="position-relative form-group col-md-4">
                        <label class="">Vehicle ID</label><br>
                        <select class="chzn-select col-md-12" id="ContentID"><option value="ALL">ALL</option></select>
                    </div>
                    <div class="position-relative form-group col-md-2">
                        <label class="">&nbsp;</label><br>
                        <button class="btn btn-primary" id="ShowReportPrimary"> Show </button>
                    </div>
                </div>
                <div class="row">
                	<div class="position-relative form-group col-md-3">
                        <label class="">From Date</label>
                        <input id="FromDate" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group col-md-3">
                        <label class="">To Date</label>
                        <input id="ToDate" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group col-md-2">
                        <label class="">&nbsp;</label><br>
                        <button class="btn btn-primary" id="ShowReportSecondary"> Filter </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body" id="ReportVehicleTable"><h5 class="card-title">Vehicle List</h5>
                <table id="ReportTable" width="100%" border="1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Vehicle ID</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle No</th>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script type="text/javascript">
function demoFromHTML() {
    html2canvas($('#ReportVehicleTable')[0], {
        onrendered: function (canvas) {
            var data = canvas.toDataURL();
            var docDefinition = {
                content: [{
                    image: data,
                    width: 500
                }]
            };
            pdfMake.createPdf(docDefinition).download("customer-details.pdf");
        }
    });
}
$(document).ready(function(){
    $('.chzn-select').chosen();
    $('#ReportTable').DataTable();
    $('#FromDate, #ToDate').datepicker({ format: 'dd-mm-yyyy' });
    $.get('Backend/Branches.json', function (data){
        var splitter = data.split('\n');
        $('#BranchIDList').val(splitter);
    }, 'text');
    $.ajax({
        url:"Backend/Transport/AddGatePassController.php?LoadVehicle",
        success: function(data){
            VehicleID = data.split('^^');
            for(i=0;i<VehicleID.length;i++)
                $('#ContentID').append('<option value="'+VehicleID[i].split('|')[1]+'">'+VehicleID[i].split('|')[2]+'</option>').trigger("liszt:updated");
        }
    });
});
function format ( DateTime, InOutStatus, Branch ) {
    var RowFormat = "";console.log(Branch);
    DateTime = DateTime.split('^^');
    InOutStatus = InOutStatus.split('^^');
    Branch = Branch.split('^^');
    var BranchArray = $('#BranchIDList').val().split(',');
    for(i=0;i<DateTime.length;i++){
        BranchName=(BranchArray[Branch[i]-1].split('|')[1]);
        RowFormat += '<tr>'+
            '<td>'+DateTime[i]+'</td>'+
            '<td>'+((InOutStatus[i] == 1) ? "Checked Out" : "Checked In" )+'</td>'+
            '<td>'+BranchName+'</td>'+
        '</tr>';
    }
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;"><thead><tr><th>Date Time</th><th>Check IN/OUT</th><th>Branch</th></thead><tbody>'+RowFormat+'</tbody></table>';
}
$('#ShowReportPrimary').on('click', function(){
    $('#ReportTable').show().DataTable().destroy();
    var table = $('#ReportTable').DataTable({
        ajax: {
            "url": 'Backend/Admin/ReportProcedure.php?VehicleReport=true',
            "type" : "POST",
            data:{ FromDate:$('#FromDate').val(), ToDate:$('#ToDate').val(), ContentID:$('#ContentID option:selected').val() },
            "dataSrc": function ( json ) {
                return json.data;
            }
        },
        responsive: true,
        scrollX: true,
        paging:false,
        "aoColumns":[
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "VehicleID" },
            { "data": "VehicleName" },
            { "data": "VehicleNumber" },
            { "data": "EmployeeID" },
            { "data": "EmployeeName" }
        ],
        "searching":false,
        "bInfo": false,
    });
});
$('#ReportTable tbody').on('click', 'td.details-control', function(){
    var tr = $(this).closest('tr');
    var row = $('#ReportTable').DataTable().row( tr );
    if ( row.child.isShown() ) {
        row.child.hide();
        tr.removeClass('shown');
    }
    else {
        var data = row.data();
        console.log(data);
        row.child( format(data.DateTime, data.InOutStatus, data.BranchTitle) ).show();
        tr.addClass('shown');
    }
});
</script>