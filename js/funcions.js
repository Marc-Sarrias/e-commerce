$(document).ready(function() {
    clickCercador();

    // Funciones relacionadas con los productos y el carrito
    async function loadInfoProductes(producte_id) {
        var resposta = await fetch(`/../../index.php?action=infoProducte&producte_id=${producte_id}`); 
        if (!resposta.ok) {
            throw new Error('Error');
        }
        var html = await resposta.text();
        document.getElementById('containerProdctes').innerHTML = html;
        clickersCarrito();   
    }

    function clickersProductes() {
        $('.product').click(function(event) {
            event.preventDefault();
            var producteId = $(this).attr('id');
            loadInfoProductes(producteId);
        });
    }

    async function addProduct(producte) {
        const quantitat = document.getElementById('quantitat').value;

        const r = await fetch(`../../index.php?action=carrito&accio_carrito=add&product=${producte}&quant=${quantitat}`);
        const data = await r.text(); 
        const [total, items] = data.split(',');

        document.getElementById('items_carrito').innerText = items;
        document.getElementById('total_carrito').innerText = total;

        document.getElementById('missatge').innerHTML = "El producte s'ha afegit al carrito";

    }

    async function loadProducts(categoria) {
        var resposta = await fetch(`/../../index.php?action=productes&category_id=${categoria}`); 
        if (!resposta.ok) {
            throw new Error('Error');
        }
        var html = await resposta.text();
        document.getElementById('containerProdctes').innerHTML = html;
        clickersProductes();
    }

    $('.category-link').click(function(event) {
        event.preventDefault();
        var categoriaId = $(this).attr('id');
        loadProducts(categoriaId);
    });

    function clickersCarrito() {
        $('.boto').click(function(event) {
            event.preventDefault();
            var producteId = $(this).attr('id');
            addProduct(producteId);
        });
    }

    function clickCercador() {
        $('#cerca').click(function(event) {
            event.preventDefault();
            cercador();
        });
    }

    async function cercador() {
        const peticio = document.getElementById('cercador').value;
        const resposta = await fetch(`/../../index.php?action=cercar&cercador=${peticio}`);
        const html = await resposta.text();
        document.getElementById('containerProdctes').innerHTML = html;
        clickersProductes();
    }
});


function validar(){
    var contrasenya = document.getElementById("contrasenya").value;
    var confirmació = document.getElementById("confirmació_contrasenya").value;
    var nom = document.getElementById("nom").value;
    var user = document.getElementById("user").value;
    var codiPostal = document.getElementById("codi_postal").value;
    var poblacio = document.getElementById("població").value;
    var adreça = document.getElementById("adreça").value;

    if(!/^\d{5}$/.test(codiPostal)){
        alert("El codi postal han de ser 5 dígits numèrics");
        return false;
    }

    if(adreça.length > 30){
        alert("L'adreça no pot tenir més de 30 caràcters");
        return false;
    }

    if(poblacio.length > 30){
        alert("El nom de la població no pot tenir més de 30 caràcters");
        return false;
    }

    if(contrasenya !== confirmació){
        alert("Les contrasenyes han de ser iguals");
        return false;
    }

    if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(nom)) {
        alert("El nom només pot contenir lletres i espais, sense números ni altres símbols.");
        return false;
    }
       
    if(nom == user){
        alert("El nom i el user han de ser diferents");
        return false;
    }

    return true;
}


async function buidarCabas(){
    const resposta = await fetch(`../../index.php?action=carrito&accio_carrito=buidar`);
    if(resposta.ok){
       const respostaTxt = "El carrito s'ha buidat correctament";
        document.getElementById('cabas').innerHTML = respostaTxt;
    }
}  
    
async function actualitzaCarrito(producte){
    const quantitat = document.getElementById(`quantitat_${producte}`).value;
    const resposta = await fetch(`../../index.php?action=carrito&accio_carrito=modificar&product=${producte}&quant=${quantitat}`);
    window.location.reload();
}


async function eliminarProducte(producte){
    const resposta = await fetch(`../../index.php?action=carrito&accio_carrito=eliminar&product=${producte}`);
    if(resposta.ok){
        alert("El producte s'ha eliminat correcatament");
        window.location.reload();
    }
}

async function finalitzarCompra() {
    const resposta = await fetch(`../../index.php?action=carrito&accio_carrito=finalitzar`);
    if (resposta.redirected) {
        // Si el servidor redirige, navega a la nueva URL
        window.location.href = resposta.url;
    }
    else{
        alert("Has d'inicar sessió per realitzar la compra");
    }
}

//document.getElementById("miElemento").style.color = "red";
//document.getElementById("miElemento").style.backgroundColor = "red";








