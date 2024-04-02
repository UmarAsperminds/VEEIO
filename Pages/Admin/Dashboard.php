<div class="divider mt-0" style="margin-bottom: 30px;"></div>
<div class="row">
    <div class="col-lg-6 col-xl-3">
        <div class="card mb-3 widget-content bg-night-fade">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Employees</div>
                    <div class="widget-subheading">No.of.Employees</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span id="TotalEmployeeCount"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-3">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Vehicles</div>
                    <div class="widget-subheading">No.of.Vehicles</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span id="TotalVehicleCount"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-3">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">On Going Projects</div>
                    <div class="widget-subheading">No.of.Projects</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-warning"><span id="TotalProjectCount"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-3">
        <div class="card mb-3 widget-content bg-happy-green">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Equipments</div>
                    <div class="widget-subheading">No.of.Equipments</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-dark"><span id="TotalEquipmentCount"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-3">
        <div class="card mb-3 widget-content bg-happy-green">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Outstanding Equipments</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-dark"><span id="PendingEquipments"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-3">
        <div class="card mb-3 widget-content bg-night-fade">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Outstanding Employees & Vehicles</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span id="PendingEmployees"></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        url:"Backend/Admin/DashboardProcedure.php?DashboardContents",
        success:function(data){
            var json = JSON.parse(data);
            $.each(json.data, function(key, val){ console.log(key); $('#'+key).text(val); });
        }
    });
});
</script>