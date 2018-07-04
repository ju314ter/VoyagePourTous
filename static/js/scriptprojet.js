(function(){

    document.getElementById("myCarousel").removeAttribute("tabIndex");

    const accountCreation = $('#create_account');
    const divAccountCreation = $('.create');
    const divLoginForm = $('.login');

    accountCreation.click(()=>{
        divAccountCreation.toggleClass("hide");
        divLoginForm.toggleClass("hide");
    })

    $('#toggleCountries').click(()=>{
        $('.listeCountries').toggleClass("hide");
    });

    $('#toggleTrip').click(()=>{
        $('.listeTrip').toggleClass("hide");
    })

    $('#toggleUser').click(()=>{
        $('.listeUser').toggleClass("hide");
    })
    $('#toggleLogin').click(()=>{
        $('.loginForm').toggleClass("hide");
    })

    


})();