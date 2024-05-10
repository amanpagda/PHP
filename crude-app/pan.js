let table = new DataTable('#myTable');

let nameEdit = document.getElementById('editname');
let priceEdit = document.getElementById('editprice');
let dascEdit = document.getElementById('editdesc');
let editimageEdit = document.getElementById('editimage');
let idEdit = document.getElementById('idEdit');

let edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element)=>{
    element.addEventListener("click", (e)=>{
        tr = e.target.parentNode.parentNode;    
        name = tr.getElementsByTagName('td')[0].innerText;
        price = tr.getElementsByTagName('td')[1].innerText;
        role = tr.getElementsByTagName('td')[2].innerText;
        image = tr.getElementsByTagName('td')[3].innerText;
        nameEdit.value = name;
        priceEdit.value = price;
        roleEdit.value = role;
        editimageEdit.value = image;
        idEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
    })
})

// let deletes = document.getElementsByClassName('delete');
// Array.from(deletes).forEach((element)=>{
//     element.addEventListener("click", (e)=>{
//         sno = e.target.id.substr(1,);
//         if (confirm("Do You Want To Delete!")) {
//             console.log('yes');
//             window.location = `/php/crude-app/info.php?delete=${sno}`;
//         }else{
//             console.log('no');
//         }
//     })
// })
