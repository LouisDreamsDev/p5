class HomeClass 
{
    constructor()
    {
        this.ready();

    } // fin du constructor

    ready()
    {
        
        $(document).ready(() => {
            console.log('loader');
        })

    }
    laoder()
    {

        // 1. while(document).ready() ??

        // 2. setTimeOut ?

        // trigger exploit JSON

        this.displayContent();
    }

    displayContent()
    {

        // foreach(JSON)
        // extract and assign to dom variables
        // innerHTML content ?

    }

    
}