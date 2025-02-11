document.addEventListener( 'DOMContentLoaded', function() {
	// Hamburger menu
	var hamMenuOpen = {
		init: function () {
			this.cacheDOM();
			this.eventListener();
		},
		cacheDOM: function () {
			this.hamMenuIcon = document.querySelector(".ham-icon");
			this.body = document.querySelector("body");
			this.window = window;
		},
		eventListener: function () {
			// Add event listener for hamburger menu click
			this.hamMenuIcon.addEventListener("click", this.menuOpen.bind(this));

			// Add event listener for window load and resize
			window.addEventListener("load", this.menuResize.bind(this));
			window.addEventListener("resize", this.menuResize.bind(this));
		},
		menuOpen: function () {
			// Toggle the 'menu-open' class on the body
			this.body.classList.toggle("menu-open");
		},
		menuResize: function () {
			// Remove the 'menu-open' class when resizing the window
			this.body.classList.remove("menu-open");
		},
	};

	// Initialize the hamburger menu functionality
	hamMenuOpen.init();

	
	// Open megamenu when book button is clicked
	let bookBtn = document.querySelector('.open-megamenu-venue');
	let closeMegaMenuBtn = document.querySelector('.close-megamenu');	
	if( bookBtn ){
		bookBtn.addEventListener('click', function(){
			let body = document.querySelector('body');
			if( body.classList.contains('open-megamenu') ){
				body.classList.remove('open-megamenu');
			}
			else{
				body.classList.add('open-megamenu');
			}
		});
	}
	
	if( closeMegaMenuBtn ){
		closeMegaMenuBtn.addEventListener('click', function(){
			let body = document.querySelector('body');
			if( body.classList.contains('open-megamenu') ){
				body.classList.remove('open-megamenu');
			}
		});
	}
	let megamenuOverlay = document.querySelector('.pd-megamenu__overlay');
	if( megamenuOverlay ){
		megamenuOverlay.addEventListener('click', function(){
			let body = document.querySelector('body');
			if( body.classList.contains('open-megamenu') ){
				body.classList.remove('open-megamenu');
			}
		});
	}

	
    /* ************ 
        Sticky Header
    *************** */
	function handleScroll() {
		let header = document.querySelector('.masthead');
		if( header ){
			if (window.scrollY > 1) {
				header.classList.add('sticky');
			} else {
				header.classList.remove('sticky');
			}
		}
	}
	window.addEventListener('DOMContentLoaded', handleScroll);
	window.addEventListener('scroll', handleScroll);
	
	// Custom select
	let customSelectElements = document.querySelectorAll('.pd-custom-select');
	customSelectElements.forEach( function (customElement) {
		console.log(customElement);
		customSelect(customElement.querySelector('select'));
	});


	// let fileInput = document.querySelector('.pd-file-upload input');
	// if (fileInput) {
	// 	let fileListParentElement = fileInput.closest('.pd-file-upload');
	// 	if (fileListParentElement) {
	// 		// Correctly create and append the file list container
	// 		let fileList = document.createElement('div');
	// 		fileList.classList.add('file-list');
	// 		fileListParentElement.appendChild(fileList);
	
	// 		fileInput.addEventListener('change', function () {
	// 			let files = fileInput.files;
	
	// 			Array.from(files).forEach((file) => {
	// 				// Create file item container
	// 				let fileItem = document.createElement('div');
	// 				fileItem.classList.add('file-item');
	
	// 				// Display file name
	// 				let fileName = document.createElement('span');
	// 				fileName.textContent = `${file.name}`;
	// 				fileItem.appendChild(fileName);
	
	// 				// Create delete button
	// 				let deleteButton = document.createElement('button');
	// 				deleteButton.classList.add('delete-btn');
	// 				deleteButton.textContent = 'Delete';
	
	// 				// Remove file item on delete button click
	// 				deleteButton.addEventListener('click', function () {
	// 					fileList.removeChild(fileItem);
	// 				});
	
	// 				fileItem.appendChild(deleteButton);
	// 				fileList.appendChild(fileItem);
	// 			});
	
	// 			// Reset file input to allow uploading the same file again
	// 			fileInput.value = '';
	// 		});
	// 	}
	// }	


	// Career toggle
	let careerToggleElements = document.querySelectorAll('.text-toggle');
	if (careerToggleElements.length) {
	  careerToggleElements.forEach(function (careerToggle) {
		let careerDetail = careerToggle.closest('.toggle-parent').querySelector('.toggle-content');
		careerDetail.style.display = 'none';
		careerToggle.innerHTML = 'Read More <span>+</span>';
		careerToggle.addEventListener('click', function () {
		  if (careerDetail.style.display === 'none') {
			careerDetail.style.display = 'block';
			careerToggle.innerHTML = 'Read Less <span>-</span>';
		  } else {
			careerDetail.style.display = 'none';
			careerToggle.innerHTML = 'Read More <span>+</span>';
		  }
		});
	  });
	}

	/**
	 * Script for Page loader
	 */
	window.addEventListener("load", function () {
        const loader = document.querySelector(".pd__loader");
        if (loader) {
            // loader.style.transform = "translateY(-100%)"; 
			loader.classList.add('hide');
        }
    });


	/**
	 * Script for Sevenrooms booking form
	 */
	let opentableButton = document.querySelector('#sr-res-root');
	if( opentableButton ){
		let urlParams = new URLSearchParams(window.location.search);
		let popupType = urlParams.get('popup');
		if( popupType === 'book' ){
			if( opentableButton ){
			opentableButton.click();
			}
		}
		let bookingBtns = document.querySelectorAll('.pd-venue-book');
		bookingBtns.forEach(function (bookingBtn) {
			bookingBtn.addEventListener('click', function(e){
				e.preventDefault();
				opentableButton.click();
			});
		});
	}


	// Parse URL Parameters
    let urlParams = new URLSearchParams(window.location.search);
    let section = urlParams.get("section");
    let enquiry = urlParams.get("enquiry");
    let venuename = urlParams.get("venuename");

    if (section === "contact" && enquiry) {
        // Scroll to the #contact section with an offset of 100px
        let contactSection = document.querySelector("#contact");
        if (contactSection) {
            let offset = 100;
            let sectionTop = contactSection.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({
                top: sectionTop,
                behavior: "smooth"
            });
        }

        // Set the select field value to 'careers'
        let selectField = document.querySelector("#input_2_5");
        if (selectField && enquiry ) {
            selectField.value = enquiry;

            // Trigger the change event
            let event = new Event("change", { bubbles: true });
            selectField.dispatchEvent(event);
        }

        // Set the select field value to 'careers'
        let selectFieldVenue = document.querySelector("#input_2_7");
        if (selectFieldVenue && venuename ) {
            selectFieldVenue.value = venuename;

            // Trigger the change event
            let event = new Event("change", { bubbles: true });
            selectFieldVenue.dispatchEvent(event);
        }
    }

	let scrolDown = document.querySelector('.scroll-down');
	if( scrolDown ){
		scrolDown.addEventListener('click', function () {
			let targetElement = document.querySelector('.pd-home-content');
			if (targetElement) {
				targetElement.scrollIntoView({
					behavior: 'smooth', // Enables smooth scrolling
					block: 'start' // Aligns the top of the element to the top of the viewport
				});
			}
		});
	}
});
