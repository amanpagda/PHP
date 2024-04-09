let table = new DataTable('#myTable');

let nameEdit = document.getElementById("nameEdit");
let emailEdit = document.getElementById("emailEdit");
let passEdit = document.getElementById("passwordEdit");
let snoEdit = document.getElementById("snoedit");

let edits = document.getElementsByClassName("edit");
Array.from(edits).forEach((element)=>{
    element.addEventListener("click", (e)=>{
        tr = e.target.parentNode.parentNode;
        name = tr.getElementsByTagName('td')[0].innerText;
        email = tr.getElementsByTagName('td')[1].innerText;
        pass = tr.getElementsByTagName('td')[2].innerText;
        nameEdit.value = name;
        emailEdit.value = email;
        passEdit.value = pass;
        snoEdit.value = e.target.id;
        console.log(e.target.id);
        $("#editModal").modal("toggle");
    })
})

let deletes = document.getElementsByClassName("delete");
Array.from(deletes).forEach((element)=>{
    element.addEventListener("click", (e)=>{
        sno = e.target.id.substr(1,);
        if(confirm("do you want to delete!")){
            console.log('yes');
            window.location = `/php/full-php-project/index.php?delete=${sno}`;
        }else{
            console.log("no");
        }
    })
})
