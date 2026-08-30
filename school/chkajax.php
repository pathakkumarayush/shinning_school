<script>

$('#submit').click(function() {

$.ajax({
    url: "stub.php",
    type: "post",
    data: $('.ids:checked').serialize(),
    success: function(data) {
    $('#response').html(data);
    }
});


});
</script>
<form action="#" method="post" enctype="multipart/form-data">
<input type="checkbox" class="ids" name="ids[]" value="2">
<input type="checkbox" class="ids" name="ids[]" value="3">
<input type="checkbox" class="ids" name="ids[]" value="4">
<input type="checkbox" class="ids" name="ids[]" value="5">
<input type="checkbox" class="ids" name="ids[]" value="6">

<div id="response"></div>
<button id="submit">Submit</button>

</form>