
function popUpNewGroup()
{
    document.getElementById('id02').style.display='block'
    let modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

}
function checkboxGruppe(){
        $('#chkParent').click(function() {
            var isChecked = $(this).prop("checked");
            $('#tblData tr:has(td)').find('input[type="checkbox"]').prop('checked', isChecked);
        });

        $('#tblData tr:has(td)').find('input[type="checkbox"]').click(function() {
            var isChecked = $(this).prop("checked");
            var isHeaderChecked = $("#chkParent").prop("checked");
            if (isChecked == false && isHeaderChecked)
                $("#chkParent").prop('checked', isChecked);
            else {
                $('#tblData tr:has(td)').find('input[type="checkbox"]').each(function() {
                    if ($(this).prop("checked") == false)
                        isChecked = false;
                });
                console.log(isChecked);
                $("#chkParent").prop('checked', isChecked);
            }
        });
}

