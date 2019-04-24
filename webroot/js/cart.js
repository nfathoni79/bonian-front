
var checked_all = false;

var check_all_button = document.querySelector('#check-all');
var target_checkboxes = document.querySelectorAll('.checkboxes');

target_checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {

        var unchecked = Array.prototype.slice.call(target_checkboxes).filter(checkbox => !checkbox.checked);

        if (unchecked.length) {
            checked_all = false;
            check_all_button.checked = false;
        } else {
            checked_all = true;
            check_all_button.checked = true;
        }
    });
});


check_all_button.addEventListener('click', function () {
    checked_all = !checked_all;
    target_checkboxes.forEach(function (checkbox) {
        checkbox.checked = checked_all;
    });
});
