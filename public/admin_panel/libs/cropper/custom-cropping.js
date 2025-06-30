var cropper;
$(document).on("change", "#image", function (event) {
    if (!isBrowserSupported()) {
        $("#edit-sorry-dialog").show();
        return;
    }
    $("#edit-sorry-dialog").hide();
    setFiletoCropper(event);
    /** SHOW CROPPER **/
    $("#editFileContainer").show();
    /** INIT CROPPER **/
    setTimeout(() => {
        if (cropper instanceof Cropper) {
            cropper.destroy();
        }
        const image = document.getElementById("mian-cover-image");
        cropper = new Cropper(image, {
            ready: function () {
                $("#crop-it").trigger("click");
            },
        });
    }, 1000);
});

function isBrowserSupported() {
    try {
        let d = new DataTransfer();
        let f = new FileReader();
        return true;
    } catch (error) {
        return false;
    }
}

function setFiletoCropper(evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    // FileReader support
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            $("#mian-cover-image").attr("src", fr.result);
        };
        fr.readAsDataURL(files[0]);
    }
}

// $(document).on("click", "#crop-it", function () {
//     let cropedUrl = cropper.getCroppedCanvas().toDataURL();
//     $("#mian-cover-preview").attr("src", cropedUrl);
// });

$(document).on("click", "#crop-done", function () {
    let cropedUrl = cropper.getCroppedCanvas().toDataURL();
    $("#mian-cover-preview").attr("src", cropedUrl);
    setTimeout(() => {
        var file =  $("#image").attr("src", cropedUrl);  
        var string =  file[0].files[0].name;
        let name = string.includes("jpeg") ? string.replace("jpeg", "jpg") :string ; 
        let CroppedFileName = name.substring(0, name.length-4) +".png";;
         
        let src = $("#mian-cover-preview").attr("src");
    //    console.log('filename: ',file[0].files[0]);
    //     let date = new Date();
    //     let filename =
    //         date.getDate() +
    //         "-" +
    //         date.getDate() +
    //         "-" +
    //         date.getFullYear() +
    //         "-" +
    //         date.getMonth() +
    //         ".png";
        file = dataURLtoFile(src, CroppedFileName);
        console.log(file);
        setFileToInput("image", file);
    }, 0);
});

function setFileToInput(element_id, file) {
    let file_image = document.getElementById("image");
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    file_image.files = dataTransfer.files;

    // For Safari
    if (file_image.webkitEntries.length) {
        file_image.dataset.file = `${dataTransfer.files[0].name}`;
    }
}

function dataURLtoFile(dataurl, filename) {
    var arr = dataurl.split(","),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }

    return new File([u8arr], filename, { type: mime });
}

// function zoomIn(){
//     console.log('zoom in');
//     // cropper.zoom(0.1);
// }
// function zoomOut(){
//     console.log('zoom out');
//     // cropper.zoom(-0.1);
// }
$('#zoomIn').click(function(){
    console.log('zoom in');
    cropper.zoom(0.1);
});

$('#zoomOut').click(function(){
    console.log('zoom out');
    cropper.zoom(-0.1);
});
