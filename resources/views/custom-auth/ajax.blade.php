<script type="text/javascript">
    $(document).on("change", "#city", function(){

    var cityID = $("#city option:selected").val();
    
    if (cityID) {
        $.ajax({
            type:"GET",
            dataType:'html',
            url:"{{ url('/admins/states/ajax') }}/" + cityID,
            success:function(res){
                $("#statesContainer").html(res);
            }
        });
    } else {
        $("#statesContainer").html("");
    }
});
</script>