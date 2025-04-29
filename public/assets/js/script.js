$(document).ready(function() {
    $('#searchButton').on('click', function() {
        let value = $('#search').val().toLowerCase();
        let visibleRows = 0;

        $('#productTable tr').each(function() {
            // Skip the "No Products Found" row
            if ($(this).attr('id') === 'noResults') return;

            if (
                $(this).find('td:nth-child(1)').text().toLowerCase().indexOf(value) > -1 ||
                $(this).find('td:nth-child(3)').text().toLowerCase().indexOf(value) > -1
            ) {
                $(this).show();
                visibleRows++;
            } else {
                $(this).hide();
            }
        });

        if (visibleRows === 0) {
            $('#noResults').show();
        } else {
            $('#noResults').hide();
        }
    });

    $('#search').on('keyup', function(event) {
        if (event.key === 'Enter') {
            $('#searchButton').click();
        }
    });


    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        let deleteUrl = $(this).attr('href'); 

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    });
});
