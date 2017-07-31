$(document).ready(function() {

    if ($('#animation')[0]) {

        var image = document.querySelector("#image");
        var files = document.querySelector("#edit");
        var cropper;
        var reader;

        files.onchange = function () {
            if (cropper) {
                cropper.destroy();
            }
            reader = new FileReader();
            reader.onload = function (e) {
                image.src = e.target.result;
                crop();
            };
            reader.readAsDataURL(this.files[0]);
        };

        var crop = function() {
            cropper = new Cropper(image, {
                viewMode: 3,
                dragMode: 'move',
                autoCropArea: 1,
                restore: false,
                modal: false,
                guides: false,
                highlight: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                minContainerWidth: 600,
                minContainerHeight: 600,
            });
        };
        $('#animation').on('change', function() {
            $('.cropper-center').css({'background': 'url('+ $('#animation option:checked').val() +')'});
        });

        $('#capture-edit').on('click', function(e){
            e.preventDefault();
            files.click();
        });

        $('#upload').on('click', function () {
            if (!cropper) {
                return;
            }
            $('.preloader').show();
            cropper
                .getCroppedCanvas({
                    width: 600,
                    height: 600
                })
                .toBlob(function (blob) {
                    var formData = new FormData();
                    formData.append('croppedImage', blob);
                    formData.append('animation', $('#animation option:checked').val());
                    formData.append('text', $('#name').val());

                    $.ajax('/room/photo/upload', {
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            window.location.href = '/room/view';
                        },
                        error: function () {
                            console.log('Upload error');
                        }
                    });
                });
        });

    }

});