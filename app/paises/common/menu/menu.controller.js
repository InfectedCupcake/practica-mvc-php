let menuItems = [];
menuItems.push(document.getElementById("por-continente"));
menuItems.push(document.getElementById("por-pais"));

let path = window.location.pathname;

let ultimaDiagonal = path.split('/');

switch (ultimaDiagonal[ultimaDiagonal.length - 1]) {
    case 'por-continente':
        menuItems[0].children[0].classList.add('active');
        //menuItems[0].clssList.add('active')
        break;
    case 'por-pais':
        menuItems[1].children[0].classList.add('active');
        //menuItems[1].clssList.add('active')
        break;

    default:
}