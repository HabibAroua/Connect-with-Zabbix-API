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
				Swal.fire
				(
					'Deleted!',
					'Your file has been deleted. '+id,
					'success'
				);
				document.location.href='index.php?page=list_service&id='+id;
			}
		}
	);
}            
