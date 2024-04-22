/**
* Template Name: Day - v4.9.0
* Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
    
  }

  

  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 16
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Header fixed top on scroll
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    let headerOffset = selectHeader.offsetTop
    let nextElement = selectHeader.nextElementSibling
    const headerFixed = () => {
      if ((headerOffset - window.scrollY) <= 0) {
        selectHeader.classList.add('fixed-top')
        nextElement.classList.add('scrolled-offset')
      } else {
        selectHeader.classList.remove('fixed-top')
        nextElement.classList.remove('scrolled-offset')
      }
    }
    window.addEventListener('load', headerFixed)
    onscroll(document, headerFixed)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }
  /** 
   * Header Change
   */

  let mainH = select('.mainH')
  if (mainH) {
    const headerChange = () => {
      if (window.scrollY > 600) {
        mainH.classList.add('headerB');
        
      } else {
        mainH.classList.remove('headerB');
        
      }
    }
    window.addEventListener('load', headerChange)
    onscroll(document, headerChange)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        portfolioIsotope.on('arrangeComplete', function() {
          AOS.refresh()
        });
      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });




})()

/**
   *nav bar dark/transparant
   */
  /*
   let tHeader = select('#header')
   let tHero = select('#hero')
 
   if(tHero.contains('active')){
     tHeader.classList.add('headerT');
     tHeader.classList.remove('headerB');
   }else {
     tHeader.classList.add('headerB');
     tHeader.classList.remove('headerT');
   }
   */
   let tHeader = document.getElementById("#header");
   let fakeHero = document.getElementById("#fakeHero");
  //  if (fakeHero.classList.contains("active")) {
    
  //   tHeader.classList.add('headerT');
  //   tHeader.classList.remove('headerB');

  // } else {
  //   tHeader.classList.remove('headerT');
  //   tHeader.classList.add('headerB');
    
  //  };

   ///////////////////////////

   

  



/*customValidities prototypes

    - Keeps track of the list of invalidity messages for this input
	- Keeps track of what validity checks need to be performed for this input
	- Performs the validity checks and sends feedback to the front end

*/

function CustomValidation(input) {
	this.invalidities = [];
	this.validityChecks = [];

	//add reference to the input node
	this.inputNode = input;

	//trigger method to attach the listener
	this.registerListener();
}

CustomValidation.prototype = {
	addInvalidity: function(message) {
		this.invalidities.push(message);
	},
	getInvalidities: function() {
		return this.invalidities.join('. \n');
	},
	checkValidity: function(input) {
		for ( var i = 0; i < this.validityChecks.length; i++ ) {

			var isInvalid = this.validityChecks[i].isInvalid(input);
			if (isInvalid) {
				this.addInvalidity(this.validityChecks[i].invalidityMessage);
			}

			var requirementElement = this.validityChecks[i].element;

			if (requirementElement) {
				if (isInvalid) {
					requirementElement.classList.add('invalid');
					requirementElement.classList.remove('valid');
				} else {
					requirementElement.classList.remove('invalid');
					requirementElement.classList.add('valid');
				}

			} // end if requirementElement
		} // end for
	},
	checkInput: function() { // checkInput now encapsulated

		this.inputNode.CustomValidation.invalidities = [];
		this.checkValidity(this.inputNode);

		if ( this.inputNode.CustomValidation.invalidities.length === 0 && this.inputNode.value !== '' ) {
			this.inputNode.setCustomValidity('');
		} else {
			var message = this.inputNode.CustomValidation.getInvalidities();
			this.inputNode.setCustomValidity(message);
		}
	},
	registerListener: function() { //register the listener here

		var CustomValidation = this;

		this.inputNode.addEventListener('keyup', function() {
			CustomValidation.checkInput();
		});


	}

};




/* ----------------------------

	Validity Checks

	The arrays of validity checks for each input
	Comprised of three things
		1. isInvalid() - the function to determine if the input fulfills a particular requirement
		2. invalidityMessage - the error message to display if the field is invalid
		3. element - The element that states the requirement

---------------------------- */

var usernameValidityChecks = [
	
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^a-zA-Z\ ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Only letters and numbers are allowed',
		element: document.querySelector('div[for="tname"] .input-requirements li:nth-child(1)')
	}
];

var phoneValidityChecks = [
	
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^0-9]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Only numbers are allowed',
		element: document.querySelector('div[for="tphone"] .input-requirements li:nth-child(1)')
	}
];

var emailValidityChecks = [
	
	{
		isInvalid: function(input) {
			//var illegalCharacters = input.value.match(/[^a-zA-Z0-9]/g);
            
			//return illegalCharacters ? true : false;
            return !input.value.match(/[a-zA-Z0-9]/g);
		},
		invalidityMessage: 'Only letters and numbers are allowed',
		element: document.querySelector('div[for="temail"] .input-requirements li:nth-child(1)')
	},
    {
		isInvalid: function(input) {
			return !input.value.match(/[@\.]/g);
		},
		invalidityMessage: 'Must only contain @ in an email ',
		element: document.querySelector('div[for="temail"] .input-requirements li:nth-child(2)')
	}
];


var passwordValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 5 | input.value.length > 20;
		},
		invalidityMessage: 'This input needs to be between 5 and 20 characters',
		element: document.querySelector('div[for="tpassword"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			return !input.value.match(/[0-9]/g);
		},
		invalidityMessage: 'At least 1 number is required',
		element: document.querySelector('div[for="tpassword"] .input-requirements li:nth-child(2)')
	},
	{
		isInvalid: function(input) {
			return !input.value.match(/[a-z]/g);
		},
		invalidityMessage: 'At least 1 lowercase letter is required',
		element: document.querySelector('div[for="tpassword"] .input-requirements li:nth-child(3)')
	},
	{
		isInvalid: function(input) {
			return !input.value.match(/[A-Z]/g);
		},
		invalidityMessage: 'At least 1 uppercase letter is required',
		element: document.querySelector('div[for="tpassword"] .input-requirements li:nth-child(4)')
	},
	{
		isInvalid: function(input) {
			return !input.value.match(/[\!\@\#\$\%\^\&\*]/g);
		},
		invalidityMessage: 'You need one of the required special characters',
		element: document.querySelector('div[for="tpassword"] .input-requirements li:nth-child(5)')
	}
];


var addressValidityChecks = [
	
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^a-zA-Z0-9\,\ \.]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Only (,) letters and numbers are allowed',
		element: document.querySelector('div[for="taddress"] .input-requirements li:nth-child(1)')
	}
];

var nrcValidityChecks = [
	
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^0-9a-zA-Z\.\(\)\/ ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: '/,(,),letters and numbers are allowed',
		element: document.querySelector('div[for="tnrc"] .input-requirements li:nth-child(1)')
	}
];




/* ----------------------------

	Setup CustomValidation

	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input

---------------------------- */

var usernameInput = document.getElementById('tname');
var phoneInput = document.getElementById('tphone');
var emailInput = document.getElementById('temail');
var passwordInput = document.getElementById('tpassword');
var addressInput = document.getElementById('taddress');
var nrcInput = document.getElementById('tnrc');


usernameInput.CustomValidation = new CustomValidation(usernameInput);
usernameInput.CustomValidation.validityChecks = usernameValidityChecks;


phoneInput.CustomValidation = new CustomValidation(phoneInput);
phoneInput.CustomValidation.validityChecks = phoneValidityChecks;

emailInput.CustomValidation = new CustomValidation(emailInput);
emailInput.CustomValidation.validityChecks = emailValidityChecks;

passwordInput.CustomValidation = new CustomValidation(passwordInput);
passwordInput.CustomValidation.validityChecks = passwordValidityChecks;

addressInput.CustomValidation = new CustomValidation(addressInput);
addressInput.CustomValidation.validityChecks = addressValidityChecks;

nrcInput.CustomValidation = new CustomValidation(nrcInput);
nrcInput.CustomValidation.validityChecks = nrcValidityChecks;


/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');


function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}


