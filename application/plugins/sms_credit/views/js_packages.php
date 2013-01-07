<script type="text/javascript">
$(document).ready(function() {

    // Add/ Edit packages	
    $('#addpackagesbutton, .editpackagesbutton').click(function() {
        var title = 'Add Packages';

        // Edit mode
        if($(this).hasClass('editpackagesbutton')) {
            title = 'Edit Packages';
            var id_package = $(this).parents('div:eq(1)').find('span.id_package').text();
            var package_name = $(this).parents('div:eq(1)').find('span.package_name').text();
            var sms_amount = $(this).parents('div:eq(1)').find('span.sms_amount').text();
            $('#id_package').val(id_package);
            $('#package_name').val(package_name);
            $('#sms_amount').val(sms_amount);
        }
        
        $("#packages-dialog").dialog({
            bgiframe: true,
            autoOpen: false,
            height: 250,
            modal: true,
            title: title,
            buttons: {
                'Save': function() {
                    $("form#addpackagesform").submit();
                },
                Cancel: function() {
                    $(this).dialog('destroy');
                }
            }
        });

        $('#packages-dialog').dialog('open');
    });
}); 
</script>
