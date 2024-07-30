document.addEventListener('DOMContentLoaded', function () {
    const groupInputs = document.querySelectorAll('.group-input');

    groupInputs.forEach(input => {
        input.addEventListener('input', function () {
            const group = this.getAttribute('data-group');

            groupInputs.forEach(otherInput => {
                if (otherInput !== this && otherInput.getAttribute('data-group') === group) {
                    otherInput.value = '';
                }
            });
        });
    });
});
