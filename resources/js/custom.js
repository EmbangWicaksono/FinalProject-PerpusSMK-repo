$(document).ready(function() {
    
    $('#status').on('change',function(){
        var status = $(this).val();
        if(status != "siswa"){
            $("#kelas_column").hide();
        } else {
            $("#kelas_column").show();
        }
        
    });
    $('#dataTable').DataTable();
})