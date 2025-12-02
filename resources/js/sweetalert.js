document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.delete-subscriber-form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            Swal.fire({
                title: 'Are you sure?',
                text: "This subscriber will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });
    });
});
