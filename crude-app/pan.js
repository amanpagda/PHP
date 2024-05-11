let nameEdit = document.getElementById('editname');
let priceEdit = document.getElementById('editprice');
let dascEdit = document.getElementById('editdesc');
let editimageEdit = document.getElementById('editimage');
let idEdit = document.getElementById('idEdit');

let edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element)=>{
    element.addEventListener("click", (e)=>{
        console.log(e.target.parentNode.parentNode);
        tr = e.target.parentNode.parentNode;    
        name = tr.getElementsByTagName('td')[0].innerText;
        price = tr.getElementsByTagName('td')[1].innerText;
        desc = tr.getElementsByTagName('td')[2].innerText;
        image = tr.getElementsByTagName('td')[3].innerText;
        nameEdit.value = name;
        priceEdit.value = price;
        dascEdit.value = desc;
        editimageEdit.value = image;
        idEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editproduct').modal('toggle');
    })
})