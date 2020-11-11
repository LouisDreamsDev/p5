$(document).ready(function() {
 
    CoinSelect.method1();

    $( ".card" ).click(function() {

        $(".card").toggleClass("bg-primary");
    
    });
});

class CoinSelect
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