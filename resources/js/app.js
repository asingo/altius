import Alpine from 'alpinejs';

if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}
import Swal from 'sweetalert2';

window.Swal = Swal;

import axios from 'axios';

function deleteProfile(id) {
    Swal.fire({
        title: 'Delete Data',
        text: "Are you sure you want to delete this profile?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete',
        buttonsStyling: false,
        customClass: {
            popup: "bg-white rounded-2xl shadow p-6 mt-4",
        }
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/profile/delete/${id}`)
                .then((response) => {
                    Swal.fire(
                        {
                            title: 'Deleted!',
                            text: 'Profile has been deleted.',
                            icon: 'success',
                            buttonsStyling: false,
                            customClass: {
                                popup: "bg-white rounded-2xl shadow p-6 mt-4",
                            }
                        }
                    ).then(() => {
                        window.location.reload();
                    });
                })
                .catch((error) => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to delete profile.',
                        icon: 'error',
                        buttonsStyling: false,
                        customClass: {
                            popup: "bg-white rounded-2xl shadow p-6 mt-4",
                        }
                    });
                });
        }
    })
}

window.deleteProfile = deleteProfile;
