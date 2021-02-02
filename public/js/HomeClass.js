class HomeClass 
{
    constructor()
    {
        this.spinner = document.getElementById("spinner");
        this.ready();

    } // fin du constructor

    ready()
    {
        
        $(document).ready(function() {
            console.log('ready');
        })
        this.loader();

    }
    loader()
    {
        setTimeout(function(){
            homeInstance.fetch();
            // document.getElementById("spinner-child").style.display = "none";
            homeInstance.spinner.classList.remove('d-flex');
            homeInstance.spinner.style.display = "none";
        }, 2500);

    }

    appendData(data)
    {
        let mainContainer = document.getElementById('myData');
        for(let i = 0; i < data.length; i++)
        {
            let card = document.createElement("div");
            let cardHeader = document.createElement("div");
            let cardBody = document.createElement("div");

            card.classList.add("card", "border-primary", "mb-3");
            cardHeader.classList.add("card-header", "bd-highlight",  "mb-3");
            cardBody.classList.add("card-body");
            
            let name = document.createElement("div");
            let price = document.createElement("div");
            let symbol = document.createElement("div");
            let totalSupply = document.createElement("div");
            let percentChange1h = document.createElement("div");
            let percentChange24h = document.createElement("div");
            let percentChange7d = document.createElement("div");
            let marketCap = document.createElement("div");

            name.innerHTML = data[i].name;
            price.innerHTML = 'prix: ' + data[i].price;
            symbol.innerHTML = 'symbole: ' + data[i].symbol;
            totalSupply.innerHTML = 'totalSupply: ' + data[i].totalSupply;
            percentChange1h.innerHTML = 'percentChange1h: ' + data[i].percentChange1h + '%';
            percentChange24h.innerHTML = 'percentChange24h: ' + data[i].percentChange24h + '%';
            percentChange7d.innerHTML = 'percentChange7d: ' + data[i].percentChange7d + '%';
            marketCap.innerHTML = 'marketCap: ' + data[i].marketCap;

            mainContainer.appendChild(card);
            card.appendChild(cardHeader);
            card.appendChild(cardBody);

            cardHeader.appendChild(name);
            cardHeader.appendChild(price);
            cardBody.appendChild(symbol);
            cardBody.appendChild(totalSupply);
            cardBody.appendChild(percentChange1h);
            cardBody.appendChild(percentChange24h);
            cardBody.appendChild(percentChange7d);
            cardBody.appendChild(marketCap);

        }
    }

    fetch()
    {
        fetch('https://localhost/projet-5-projet-personnel/public/index.php?route=json')
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            homeInstance.appendData(data);
        })
        .catch(function (err) {
            console.log(err);
        });
    }
    
}