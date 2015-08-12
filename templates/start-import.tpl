<h1>{@wpimport.module_title}</h1>

<div class="import">
    <div class="success message-helper-small">
        {@wpimport.import.success}
    </div>
    <div class="error message-helper-small">
        {@wpimport.import.error}
    </div>
</div>

<div class="import-duration" style="text-align: center; color: #777777; padding: 10px;">
    <img src="img/ajax-loader.gif" alt=""/>
    <span class="import-start">{@wpimport.import.start}</span>
    <span class="import-end">{@wpimport.import.end}</span>
</div>

<div class="import-logs">
    <h1>{@wpimport.logs}</h1>
    <textarea rows="20"></textarea>
</div>

<script type="application/javascript" src="jquery.min.js"></script>
<script type="application/javascript">
    $(document).ready(function() {
        $('.import-duration .import-end').hide();
        $('.import .success').hide();
        $('.import .error').hide();
        $('.import-logs').hide();

        $.ajax({
            dataType: "text",
            url: '{AJAX_IMPORT_URL}',
            success: function(data) {
                try {
                    data = $.parseJSON(data);
                } catch (e) {
                    data = {
                        'success': false,
                        'logs': data
                    };
                }
                $('.import-duration img').hide();
                $('.import-duration .import-start').hide();
                $('.import-duration .import-end').show();
                if(data.success == true) {
                    $('.import .success').show();
                } else {
                    $('.import .error').show();
                }
                $('.import-logs').show();
                $('.import-logs textarea').val(data.logs);
            }
        });
    });
</script>