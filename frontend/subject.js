
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

