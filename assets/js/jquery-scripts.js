jQuery(document).ready(function($){
    var imageSlider = $('.pd-image-slider__element');
    imageSlider.owlCarousel({
        items:1,
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        navText: '',
        autoplay:true,
        autoplayTimeout: 3000,
        autoplaySpeed: 1000,
        autoplayHoverPause:true
    });

    var imageSliderBanner = $('.pd-venue-banner__slider');
    imageSliderBanner.owlCarousel({
        items:1,
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        navText: '',
        autoplay:true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause:true
    });
    

    jQuery(document).on('gform_post_render', function (event, formId) {
        // Select the file input and append a file list container
        let fileInput = jQuery('.pd-file-upload input');
        let fileListContainer = fileInput.closest('.pd-file-upload').append('<div class="file-list"></div>').find('.file-list');
    
        // Event listener for file input change
        fileInput.on('change', function () {
            let files = this.files;
    
            jQuery.each(files, function (index, file) {
                // Create file item container
                let fileItem = jQuery('<div class="file-item"></div>');
    
                // Display file name
                let fileName = jQuery('<span></span>').text(file.name);
                fileItem.append(fileName);
    
                // Create delete button
                let deleteButton = jQuery(`<button class="delete-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 52" fill="none">
                    <line x1="1.6386" y1="50.8495" x2="51.6386" y2="0.849535" stroke="#1D1B14" stroke-width="2"/>
                    <line y1="-1" x2="70.7107" y2="-1" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 52.3438 51.5566)" stroke="#1D1B14" stroke-width="2"/>
                    </svg></button>`);
                deleteButton.on('click', function () {
                    fileItem.remove(); // Remove file item
                });
    
                fileItem.append(deleteButton);
                fileListContainer.append(fileItem);
            });
    
            // Reset the file input to allow uploading the same file again
            fileInput.val('');
        });
    });
});