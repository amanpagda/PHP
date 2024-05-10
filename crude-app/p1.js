
var editstaticBackdrop = new bootstrap.Modal(document.getElementById('editstaticBackdrop'), {
    keyboard: false
});

document.querySelector('#editname').value=`$a[name]`;
document.querySelector('#editprice').value=`$a[price]`;
document.querySelector('#editdesc').value=`$a[description]`;
document.querySelector('#editimg').src=`$fetch_src$a[image]`;
editstaticBackdrop.show();