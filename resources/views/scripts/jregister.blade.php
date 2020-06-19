
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#status').on('change',function(){
        var status = $(this).val();
        if(status != "siswa"){
            $("#kelas_column").hide();
        } else {
            $("#kelas_column").show();
        }
        
    });
})
</script>