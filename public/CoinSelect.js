$(document).ready(function() {
 
    HomeSelect.method1();

    $( ".card" ).click(function() {

        $(".card").toggleClass("bg-primary");
    
    });
});

class HomeSelect
{
    constructor()
    {
        this.card = $(".card");
    }
    method1() {
        this.card.click(function() {
            alert('bonjour');
        })
    }
}