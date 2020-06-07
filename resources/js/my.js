$(document).ready(function () {
    $('.ffl-wrapper').floatingFormLabels();

    $('.owl-carousel').owlCarousel({
        'items': 1,
        'startPosition': 1,
        'stagePadding': 70,
        'center': true,
        'navText': [
            '<img class="img-fluid" src="./build/img/arrow-left.svg" alt="Arrow left">',
            '<img class="img-fluid" src="./build/img/arrow-right.svg" alt="Arrow right">',
        ],
        'responsive': {
            576: {
                'items': 3,
                'startPosition': 2,
                'stagePadding': 50,
            },
            768: {
                'items': 3,
                'startPosition': 2,
                'stagePadding': 50,
                'nav': true,
            },
            992: {
                'items': 3,
                'startPosition': 2,
                'nav': true,
                'stagePadding': 100,
            },
        },
    });


    $("#contact_us_form").submit(function( event ) {
        var contact = getFormData($(this));
        console.log(contact);
        event.preventDefault();
        axios.post('/api/contacts', contact);
    });


});

window.addEventListener('scroll', stickyHeader);
document.querySelector('.js_open_language').addEventListener('click', toggleLanguage);

$('.js_open_menu').on('click', toggleMobileMenu);

$(document).click(function (e){
    var div = $(".languages, .js_open_language");
    if (!div.is(e.target)
        && div.has(e.target).length === 0) {
        $('.languages').removeClass('opened');
    }
});


function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function stickyHeader() {
    var offsetY = window.pageYOffset;
    var $header = document.querySelector('.js_sticky_header');
    var $btnContact = document.querySelector('.btn-contact');

    if (offsetY > 0) {
        $header.classList.add('sticky');
        $btnContact.classList.remove('btn-secondary');
        $btnContact.classList.add('btn-primary');
    } else {
        $header.classList.remove('sticky');
        $btnContact.classList.add('btn-secondary');
        $btnContact.classList.remove('btn-primary');
    }
}

function toggleLanguage() {
    document.querySelector('.languages').classList.toggle('opened');
}

function toggleMobileMenu() {
    document.querySelector('.page_header').classList.toggle('opened');
}