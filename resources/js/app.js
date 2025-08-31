import "flowbite";
import Swal from "sweetalert2";

window.Swal = Swal;

document.addEventListener("livewire:init", () => {
    Livewire.on("created", (e) => {
        const isDark = document.documentElement.classList.contains("dark");

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            width: "auto",
            padding: "0.8rem",
            fontSize: "0.6rem",
            theme: isDark ? "dark" : "light",
            timerProgressBar: true,
            customClass: {
                icon: "w-[50px] h-[50px]",
                title: "text-sm",
            },
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });

        Toast.fire({
            icon: e.type,
            title: e.message,
        });
    });

    Livewire.on("success", (e) => {
        const isDark = document.documentElement.classList.contains("dark");

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            width: "auto",
            padding: "0.8rem",

            theme: isDark ? "dark" : "light",
            timerProgressBar: true,
            customClass: {
                icon: "w-[50px] h-[50px]",
                title: "text-sm",
            },
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });

        Toast.fire({
            icon: e.type,
            title: e.message,
        });
    });

    Livewire.on("deleted", (e) => {
        const isDark = document.documentElement.classList.contains("dark");

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            width: "auto",
            padding: "0.8rem",
            fontSize: "0.6rem",
            theme: isDark ? "dark" : "light",
            timerProgressBar: true,
            customClass: {
                icon: "w-[50px] h-[50px]",
                title: "text-sm",
            },
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });

        Toast.fire({
            icon: e.type,
            title: e.message,
        });
    });

    Livewire.on("delete-confirm", (e) => {
        const isDark = document.documentElement.classList.contains("dark");

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton:
                    "focus:outline-none text-white bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800",
                cancelButton:
                    "focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900",
            },
            buttonsStyling: false,
        });
        swalWithBootstrapButtons
            .fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                theme: isDark ? "dark" : "light",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch("delete-confirmted", { id: e.id });
                    // console.log(e.id);
                    // swalWithBootstrapButtons.fire({
                    //     title: "Deleted!",
                    //     theme: isDark ? "dark" : "light",
                    //     text: "Your file has been deleted.",
                    //     icon: "success",
                    // });
                }
            });
    });
});

// const Toast = Swal.mixin({
//     toast: true,
//     position: "top",
//     showConfirmButton: false,
//     timer: 3000,
//     wdidth: "auto",
//     timerProgressBar: true,
//     showCloseButton: true, // إضافة زر الإغلاق (X)
//     CloseButton: true,
//     didOpen: (toast) => {
//         toast.onmouseenter = Swal.stopTimer;
//         toast.onmouseleave = Swal.resumeTimer;
//     },
// });

// window.addEventListener("success", (event) => {
//     Toast.fire({
//         icon: event.detail[0].type,
//         title: event.detail[0].message,
//     });

//     const modal = document.querySelector(
//         "body > div.transition-all.fixed.inset-0.z-40.bg-gray-900.bg-opacity-50.dark\\:bg-opacity-80"
//     );
//     if (modal) {
//         modal.classList.add("hidden");
//     }
// });

// document.addEventListener("DOMContentLoaded", () => {
//     const isDark = document.documentElement.classList.contains("dark");

//     const Toast = Swal.mixin({
//         toast: true,
//         position: "top-end",
//         showConfirmButton: false,
//         // timer: 3000,
//         width: "auto",
//         padding: "0.8rem",
//         fontSize: "0.6rem",
//         theme: isDark ? "dark" : "light",
//         timerProgressBar: true,
//         customClass: {
//             icon: "w-[50px] h-[50px]",
//             title: "text-sm",
//         },
//         didOpen: (toast) => {
//             toast.onmouseenter = Swal.stopTimer;
//             toast.onmouseleave = Swal.resumeTimer;
//         },
//     });

//     Toast.fire({
//         icon: "error",
//         title: "You are not authorized to perform this action.",
//     });
// });
