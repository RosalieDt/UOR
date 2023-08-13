var fig = document.querySelector('#album')
var img = document.querySelector('#album img')
var caption = document.querySelector('#album figcaption')

function affiche(source, legende) {
	img.setAttribute('src', source)
	img.setAttribute('alt', legende)
	caption.innerText = legende
}

function reinit() {
	img.setAttribute('src', "img/adélie.jpg")
	caption.innerText = "Expédition de Jules Dumont d'Urville - Reconnaissance de la Terre Adélie (1840)"
}