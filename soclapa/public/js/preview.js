// console.log('cau');
// function previewFile(){
//     var preview = document.querySelector('img'); 
//     var file    = document.querySelector('input[type=file]').files[0]; 
//     var reader  = new FileReader();

//     reader.onloadend = function () {
//         preview.src = reader.result;
//         }

//     if (file) {
//         reader.readAsDataURL(file);
//     } else {
//         preview.src = "/storage/cover_image/noimage.jpg";
//     }
// }

//previewFile(); 

function previewUploadedFile(){
    var preview = document.getElementById('postImg'); 
    var file    = document.querySelector('input[type=file]').files[0]; 
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        }

    if (file) {
        reader.readAsDataURL(file);
    }
}
function previewFile(){
    var preview = document.getElementById('profileImg'); 
    var file    = document.querySelector('input[type=file]').files[0]; 
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        }

    if (file) {
        reader.readAsDataURL(file);
    }
}


    $( document ).ready(function() {
        console.log( "document loaded" );
    });