<input type="hidden" id="BranchIDList">
<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Project Report</h5>
                <div class="row">
                    <div class="position-relative form-group col-md-3">
                        <label class="">From Date</label>
                        <input id="FromDate" type="text" class="form-control" value="<?php echo date('01-m-Y');?>">
                    </div>
                    <div class="position-relative form-group col-md-3">
                        <label class="">To Date</label>
                        <input id="ToDate" type="text" class="form-control" value="<?php echo date('d-m-Y');?>">
                    </div>
                    <div class="position-relative form-group col-md-4">
                        <label class="">Project ID</label><br>
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
            <div class="card-body"><h5 class="card-title">Project List</h5>
                <table id="ReportTable" width="100%" border="1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Date</th>
                            <th>Project ID</th>
                            <th>Project Name</th>
                            <th>Client Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function format(rowData) {
    var childTable = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%" id="Inner1_'+rowData.Sno+'">' +
        '<thead><th></th><th>GatePass ID</th><th>Authorized By</th><th>Date Time</th><th>Project Name</th></thead>' +
        '</table>';
    return $(childTable).toArray();
}
function format1(rowData) {
    var childTable = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:20%; padding-right:20%;" align="center" id="Inner2_'+rowData.Sno+'">' +
        '<thead><th></th><th>Date Time</th><th>Check IN/OUT</th><th>Branch</th></thead>' +
        '</table>';
    return $(childTable).toArray();
}
function format2 ( data ) {
    data = data.split('&');var RowFormat = "";
    for(i=1;i<data.length;i++){
        DateTime = data[i].split('^^')[0];
        InOutStatus = data[i].split('^^')[1];
        Branch = data[i].split('^^')[2];
        var BranchName = $('#BranchIDList').val().split(',');
        BranchName=(BranchName[Branch-1].split('|')[1]);
        RowFormat += '<tr>'+
            '<td>'+DateTime+'</td>'+
            '<td>'+((InOutStatus == 1) ? "Checked Out" : "Checked In" )+'</td>'+
            '<td>'+BranchName+'</td>'+
        '</tr>';
    }
    return '<table cellpadding="5" cellspacing="0" border="0" style="margin-left:15%;"><thead><tr><th>Date Time</th><th>Check IN/OUT</th><th>Branch</th></thead>'+RowFormat+'</table>';
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
        url:"Backend/Transport/AddGatePassController.php?LoadProjects",
        success: function(data){
            EquipmentID = data.split('^^');
            for(i=0;i<EquipmentID.length;i++)
                $('#ContentID').append('<option value="'+EquipmentID[i].split('|')[1]+'">'+EquipmentID[i].split('|')[0]+'</option>').trigger("liszt:updated");
        }
    });

    $('#ShowReport').on('click', function(){
        $('#ReportTable').show().DataTable().destroy();
        var table = $('#ReportTable').DataTable({
            ajax: {
                "url": 'Backend/Admin/ReportProcedure.php?ProjectReport=true',
                "type" : "POST",
                data:{ FromDate:$('#FromDate').val(), ToDate:$('#ToDate').val(), ContentID:$('#ContentID option:selected').val() },
                "dataSrc": function ( json ) {
                    console.log(json);
                    return json.data;
                }
            },
            "aoColumns":[
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "DateTime" },
                { "data": "ProjectID" },
                { "data": "ProjectName" },
                { "data": "ClientName" }
            ],
            responsive: true,
            scrollX: true
        });
    });
    $('#ReportTable tbody').on('click', 'td.details-control', function(){
        var tr = $(this).closest('tr');
        var row = $('#ReportTable').DataTable().row( tr );
        var rowData = row.data();
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
            $('#Inner1_'+rowData.Sno).DataTable().destroy();
        }
        else {
            row.child( format(rowData) ).show();
            var TableID = rowData.Sno;
            childTable = $('#Inner1_'+TableID).DataTable({
                dom: "t",
                ajax: {
                    url: 'Backend/Admin/ReportProcedure.php?ProjectReportGatePassID=true&GatePassID='+rowData.GatePassID,
                    "dataSrc": function ( json ) {
                        console.log(json);
                        return json.data;
                    }
                },
                columns: [
                    {
                        className: 'details-control1',
                        orderable: false,
                        data: null,
                        defaultContent: ''
                    },
                    { data: "GatePassID" },
                    { data: "AuthorizedBy" },
                    { data: "DateTime" },
                    { data: "ProjectName" }
                ],
            });
            tr.addClass('shown');
        }
    });
    $('#ReportTable tbody').on('click', 'td.details-control1', function(){
        var tr = $(this).closest('tr');
        var row = childTable.row(tr);
        var rowData = row.data();
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
            $('#Inner2_'+rowData.Sno).DataTable().destroy();
        }
        else {
            console.log(row.data().InOutStatus);
            row.child( format2(row.data().InOutStatus) ).show();
            tr.addClass('shown');
        }
    });
});
</script>