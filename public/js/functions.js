function wordCount( value ){
    let content = value.match(/\S+/g);
    return {
        charactersNoSpaces : value.replace(/\s+/g, '').length,
        characters : value.length,
        words : content ? content.length : 0,
        lines : value.split(/\r*\n/).length
    };
}
function notification(theme,message){
       window.createNotification({
           // close on click
           closeOnClick: true,
           // displays close button
           displayCloseButton: false,
           // nfc-top-left
           // nfc-bottom-right
           // nfc-bottom-left
           positionClass: "nfc-top-left",
           // callback
           onclick: false,
           // timeout in milliseconds
           showDuration: 3500,
           // success, info, warning, error, and none
           theme: theme,
       })({
           // title: 'title',
           message: message,
       });
 }
function toggleClass(tagID, firstClass, secondClass) {
    if (tagID.classList.contains(firstClass)) {
        tagID.classList.remove(firstClass);
        tagID.classList.add(secondClass);
    } else if (tagID.classList.contains(secondClass)) {
        tagID.classList.remove(secondClass);
        tagID.classList.add(firstClass);
    }
}
 // document.querySelector('#logout-form-anchor').addEventListener('click',(event) => {
 //     event.preventDefault();
 //     document.querySelector('#logout-form').submit();
 // });

function bootboxConfirm(formID) {
    bootbox.confirm({
        message: "هل أنت متأكد ؟ سيتم حذف جميع البيانات ؟",
        buttons: {
            confirm: {
                label: 'نعم',
                className: 'btn-success'
            },
            cancel: {
                label: 'ﻻ',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                document.querySelector(formID).submit();
            }
        }
    });
}

async function sweetAlert2Toast(toastType,toastTitle){
    await swal.fire({
        icon: toastType,
        title: toastTitle,
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 3000,
    })
}
