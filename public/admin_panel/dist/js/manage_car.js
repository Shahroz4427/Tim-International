// car edit Functions

var video_error = image_error = false;
var video_filesize_error = false;

function showLoading(){
    $("#frame_loading_image").css('display', 'flex');
}

function hideLoading(){
    $("#frame_loading_image").css('display', 'none');
}

function clearError(media){
    $(`#${media}_360_error`).html("");
}

function checkFile(allowedFileTypes, ext) {
    let allowed_index = allowedFileTypes.indexOf(ext);

    if( allowed_index != -1 ){
        error = false;
    } else{
        error = true;
    }

    return error;
}

function setGlobalError(media, error){
    if( media == "video" ){
        video_error = error;
    } else if( media == "image" ){
        image_error = error;
    }
}

function showFinalOutput(){
    if(video_error){
        showOutput('video', true)
    }
    if(image_error){
        showOutput('image', true)
    }
}

function showOutput(media, error = false){
    element = $("#" + media + "_360_error");

    bgColorArray = ['lightgreen', 'red'];
    colorArray = ['black', 'white'];

    i = +error;

    element.css("background-color", bgColorArray[i]);
    element.css("color", colorArray[i]);

    if (error) status = "File Type Not Allowed";
    result = (error) ? `<span style="font-weight: bold;">${status}</span>` : "";

    setGlobalError(media, error);

    element.html(result);
}

function getError(media, value, allowedFileTypes){
    clearError(media);
    value = value.toLowerCase();

    console.log(`filename: ${value}`)
    // alert(`filename: ${value}`)

    if( value != ""){
        let ext = value.match(/\.([^\.]+)$/)[1];
        console.log(`ext: ${ext}`)
        error = checkFile( allowedFileTypes, ext );
        // showOutput(media, error);
        setGlobalError(media, error);
    } else{
        error = false;
        setGlobalError(media, error);
        clearError(media);
    }
}


$(document).ready(function() {

    // Add a change event listener to the video input element
$(document).on('change', "#video", function(){
    console.log("video changed..");
    media = "video";
    const videoAllowedFileTypes = ['mp4', 'insv'];

    getError(media, this.value, videoAllowedFileTypes);

    size = this.files[0].size/1024/1024;
    if( size > 150 ) {
        $("#video_filesize_error").text("Filesize too large.");
        window.video_filesize_error = true;
    } else {
        $("#video_filesize_error").text("");
        window.video_filesize_error = false;
    }

    /* clearError(media);
    let ext = this.value.match(/\.([^\.]+)$/)[1];
    error = checkFile( videoAllowedFileTypes, ext );

    error = getError(media, this.value, videoAllowedFileTypes);
    showOutput(media, error);*/


});

})



// Add a change event listener to the video input element
$("#interior_image").on('change', function(){
    media = "image";
    const imageAllowedFileTypes = ['jpg', 'jpeg', 'png'];

    getError(media, this.value, imageAllowedFileTypes);

    /* clearError(media);
    let ext = this.value.match(/\.([^\.]+)$/)[1];
    error = checkFile( imageAllowedFileTypes, ext );

    error = getError(media, this.value, imageAllowedFileTypes);
    showOutput(media, error); */

    console.log("image changed..");

});
