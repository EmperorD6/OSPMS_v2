$(function()
{

	var files;

	$('input[type=file]').on('change', prepareUpload);
	$('#upload').on('submit', uploadFiles);

	function prepareUpload(event)
	{
		files = event.target.files;
	}

	function uploadFiles(event)
	{
		event.stopPropagation(); 
        event.preventDefault(); 

		var data = new FormData();
		$.each(files, function(key, value)
		{
			data.append(key, value);
		});
        
        $.ajax({
            url: 'ajax_upload.php?files',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR)
            {
				alert(JSON.stringify(data));
				
            	
            }
        });
    }

});