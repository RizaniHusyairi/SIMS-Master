function previewImage(){
    const image = document.querySelector('#foto-profile');
    const imagePreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {  
        imagePreview.src = oFREvent.target.result;
    }
}