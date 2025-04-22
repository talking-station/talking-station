declare var flatpickr: any;

document.addEventListener("DOMContentLoaded", () => {
    const dateInput = document.querySelector("#user_birth");
    
    if(dateInput) {
        flatpickr(dateInput, {
            dateFormat: "Y-m-d",
            maxDate: "today",
        });
    }
})