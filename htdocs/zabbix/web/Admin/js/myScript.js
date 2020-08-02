function will_delete_service(id)
{
	Swal.fire
	(
		{
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}
	).then
	(
		(result) =>
		{
			if (result.value)
			{
				var my_id = id;
				$.ajax
				(
					{
						type: 'POST',
						url: "/zabbix/web/app/controllers/action.php?action=delete_service",
						data: {'id': my_id},
						success: 
						function(result)
						{
							if (result == 'good')
							{
								Swal.fire
								(
									'Deleted!',
									'This service has been deleted. ',
									'success'
								);
								 setTimeout(
									function() 
									{
									   location.reload();
									}, 500); 
							}
							else
							{
								if(result == 'bad')
								{
									Swal.fire
									(
										'Error',
										'You cannot delete this service ',
										'error'
									);
								}
							}
						}
					}
				);
			}
			else
			{
				Swal.fire
				(
					'Canceled!',
					"You cannot delete this service",
					'error'
				);
			}
		}
	);
}

function findById(id)
{
	document.location.href = '/zabbix/web/Admin/index.php?page=list_service&id='+id;
}

function update()
{
	var id = $('#id').val();
	var host_name = $('#host_name').val();
	var ip_address = $('#ip_address').val();
	$.ajax
	(
		{
			type: 'POST',
			url: "/zabbix/web/app/controllers/action.php?action=update_service",
			data: {'id': id , 'host_name' : host_name , 'ip_address' : ip_address},
			success: 
			function(result)
			{
				alert(result);
				if (result == 'good')
				{
					Swal.fire
					(
						'Updated!',
						'This service has been updated. ',
						'success'
					);
					setTimeout(
							function() 
							{
								 location.reload();
								 document.location.href = '/zabbix/web/Admin/index.php?page=list_service';
							},
							500);
					
				}
				else
				{
					if(result == 'bad')
					{
						Swal.fire
						(
							'Error!',
							'You cannot update this service. ',
							'error'
						);
					}
				}
			}
		}
	);
}
