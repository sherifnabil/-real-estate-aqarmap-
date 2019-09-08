<script type="text/javascript">
    $('#city').change(function(){
    var cityID = $(this).val();
    if (cityID) {
        $.ajax({
            type:"GET",
            dataType:'html',
            url:"{{ route('ajax.states', ['id' => " + cityID + "]) }}/",
            success:function(res){
                $("#state").append().html(res);
            }
        });
    } else {
        $("#state").empty();
    }
});
</script>