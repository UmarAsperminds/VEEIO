<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Add Or Edit Gate Pass</h5>
                <div class="row">
                    <div class="position-relative form-group col-md-2">
                        <label for="GatePassID" class="">GatePassID</label>
                        <input id="GatePassID" type="text" class="form-control" disabled='true'>
                    </div>
                    <div class="position-relative form-group col-md-3">
                        <label for="GatePassDate" class="">Date</label>
                        <input id="GatePassDate" value="<?php echo date('d-m-Y'); ?>" type="text" class="form-control" disabled='true'>
                    </div>
                    <div class="position-relative form-group col-md-7">
                        <label for="ProjectVC" class="">To be Used For : <font id="ProjectName"></font></label>
                        <div class="controls controls-row autocomplete">
                            <input type="hidden" id="ProjectID" CaptionID="ProjectName">
                            <input id="ProjectVC" class="form-control" type="text" autofocus>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="position-relative form-group col-md-6">
                        <label for="EquipmentName" class="">Description : <font id="EquipmentName"></font></label>
                        <div class="controls controls-row autocomplete">
                            <input type="hidden" id="EquipmentID" CaptionID="EquipmentName">
                            <input id="EquipmentVC" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="position-relative form-group col-md-3">
                        <label for="ProjectName" class="">Quantity : </label>
                        <input id="Quantity" type="number" class="form-control">
                    </div>
                    <div class="position-relative form-group col-md-3">
                        <label for="ProjectName" class="">Remarks : </label>
                        <input id="Remarks" type="text" class="form-control">
                    </div>
                </div>
                <button style="display: none;" class="mt-1 btn btn-primary SubmitButton" id="AddItem">Add Item</button><hr>
                <div class="row">
                    <div class="position-relative form-group col-md-4">
                        <label for="DriverName" class="">Driver Name : <font id="DriverName"></font></label>
                        <div class="controls controls-row autocomplete">
                            <input type="hidden" id="DriverID" CaptionID="DriverName">
                            <input id="DriverVC" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="position-relative form-group col-md-4">
                        <label for="AuthorizedByID" class="">Authorized By</label>
                        <div class="controls controls-row autocomplete">
                            <input type="hidden" id="AuthorizedByID" CaptionID="AuthorizedBy">
                            <input class="form-control" id="AuthorizedByVC"/>
                        </div>
                    </div>
                    <div class="position-relative form-group col-md-4">
                        <label for="ProjectName" class="">Vehicle : </label>
                        <select class="chzn-select form-control" id="VehicleID"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="position-relative form-group col-md-3">
                        <button class="mt-1 btn btn-success" id="SaveGatePass">Save GatePass</button>
                    </div>
                    <div class="position-relative form-group col-md-3">
                        <button class="mt-1 btn btn-danger" id="CancelGatePass">Cancel GatePass</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title" style="font-size: 20px; text-align: center;">PREVIEW</h5>
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
                </table>
            </div>
        </div>
    </div>
</div>    
<script type="text/javascript">
function AjaxScripts(Action){
    $.ajax({
        url:"Backend/Transport/AddGatePassController.php?"+Action,
        type:"POST",
        data:{  },
        success: function(data){
            if(Action == 'LoadProjects'){
                console.log(data);
                autocomplete(document.getElementById("ProjectVC"), data.split('^^'));
                AjaxScripts('LoadEquipments');
            }
            else if(Action == 'LoadEquipments'){
                autocomplete(document.getElementById("EquipmentVC"), data.split('^^'));
                AjaxScripts('LoadDriver');
            }
            else if(Action == 'LoadDriver'){
                autocomplete(document.getElementById("DriverVC"), data.split('^^'));
                AjaxScripts('LoadVehicle');
            }
            else if(Action == 'LoadVehicle'){
                var Vehicle = data.split('^^');
                console.log(Vehicle);
                for(i=0;i<Vehicle.length;i++)
                    $('#VehicleID').append("<option value='"+Vehicle[i].split('|')[1]+"'>"+Vehicle[i].split('|')[0]+"</option>").trigger("liszt:updated");
                AjaxScripts('LoadGatePassID');
            }
            if(Action == 'LoadGatePassID')
                $('#GatePassID').val(data);
        }
    })
}
function LoadTableContent(DataContent){
	$('#'+DataContent).DataTable().destroy();
    if(DataContent == 'PreviewTable'){
        var columns = [
            {mData: "Quantity", "width":"1%", "className": "text-center" },
            {mData: "EquipmentName", "width":"50%"},
            {mData: "Remarks", "width":"10%","className": "text-center"}
        ];
    }
    $('#'+DataContent).DataTable({
        "aoColumns":columns,
        searching: false, paging: false, info: false
    });
    setTimeout(function(){ $('#'+DataContent).DataTable().columns.adjust().draw(); },200);
}
$(document).ready(function(){
	$('.chzn-select').chosen();
    $('#AuthorizedByVC').val(window.location.search.split('?')[1].split('&')[2].split('=')[1]).attr('disabled',true);
    $('#AuthorizedByID').val(window.location.search.split('?')[1].split('&')[2].split('=')[1][1]);
	LoadTableContent('PreviewTable');
    AjaxScripts('LoadProjects');
});
$('#AddItem').on('focus', function(){
    if(($('#EquipmentVC').val() == '' || $('#Quantity').val() == '')){
        notifications('Error : ','Please Enter Description and Quantity both','warning','icon-check');
        $('#EquipmentName').focus();
    }
    else{
        var Extra = ($('#EquipmentID').val() != '') ? " ("+$('#EquipmentName').text()+")" : "";
        $('#EquipmentVC').focus();
        var row = $('#PreviewTable').DataTable().row.add({
            "Quantity": $('#Quantity').val(),
            "EquipmentName": "<input type='hidden' value='"+$('#EquipmentID').val()+"'>"+$('#EquipmentVC').val()+Extra,
            "Remarks":$('#Remarks').val()
        }).draw();
        $('#Quantity').val('').attr('disabled',false);
        $('#EquipmentVC, #Quantity, #Remarks, #EquipmentID, #EquipmentName').val('').text('');
        $('#PreviewTable').DataTable().row(row).column(0).nodes().to$().addClass('QuantityClass');
        $('#PreviewTable').DataTable().row(row).column(1).nodes().to$().addClass('EquipmentNameClass');
        $('#PreviewTable').DataTable().row(row).column(2).nodes().to$().addClass('RemarksClass');
    }
});
function ClearData(){
    $('#ProjectName, #ProjectID, #EquipmentID, #EquipmentName, #Quantity, #Remarks, #DriverID, #DriverName, #ProjectVC, #DriverVC').val('').text('');
    AjaxScripts('LoadGatePassID');
    $('#PreviewTable').DataTable().clear().draw();
    $('#ProjectVC').focus();
}
$('#SaveGatePass').on('click', function(){
    var Quantity = [], EquipmentName = [], Remarks = [];
    $('.QuantityClass').each(function(){ Quantity.push($(this).text()); });
    $('.EquipmentNameClass').each(function(){
        if($(this).find('input').val() != '')
            EquipmentName.push($(this).find('input').val());
        else
            EquipmentName.push($(this).text());
    });
    $('.RemarksClass').each(function(){ Remarks.push($(this).text()); });
    var BranchID = window.location.search.split('?')[1].split('&')[1].split('=')[1];
    $.ajax({
        url:"Backend/Transport/AddGatePassController.php?SaveGatePass",
        type:"POST",
        data: { Quantity:Quantity, EquipmentName:EquipmentName, Remarks:Remarks, ProjectID:$('#ProjectID').val(), Date:$('#Date').val(), DriverID:$('#DriverID').val(), VehicleID:$('#VehicleID :selected').val(), GatePassID:$('#GatePassID').val(), AuthorizedByID:$('#AuthorizedByID').val(), Date:$('#GatePassDate').val(), BranchID:BranchID },
        success: function(data){
            console.log(data);
            var splitter = data.split(':');
            notifications(splitter[0]+' : ',splitter[1],splitter[0].toLowerCase(),'icon-check');
            ClearData();
        }
    })
});
$('#CancelGatePass').on('click', function(){
    ClearData();
});
</script>