
let fontValue = { bigTitles, paragraphes, menuList };


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


function allowCookies() {
    let button = document.getElementById("closeCookies").addEventListener("click", function () {
        console.log("clicked on exit");
        document.getElementsByClassName("cookieConsent")[0].style.display = "none";
        let name = "consent";
        let valeur = true;
        setCookie(name, valeur, 7)
    })
}

function setCookieConsent(valeur) {
    if (valeur) {
        document.getElementsByClassName("cookieConsent")[0].style.display = "none";
    } else {
        document.getElementsByClassName("cookieConsent")[0].style.display = "";
    }
}




function show() {
    let elem = document.getElementById('SousMenuAccessible');
    if (elem.style.display === "block") {
        elem.style.display = "none";
    } else {
        elem.style.display = "block";
    }

}

var taille = 0;

var bigTitles = document.getElementsByTagName("h1");
var paragraphes = document.getElementsByTagName("p");
var menuList = document.getElementsByClassName("menu");

function setTaille(size, modif) {
    if (size == "") {
        size = "1";
    }
    taille = taille + parseFloat(size, 10) + modif;
    document.getElementsByTagName("footer")[0].style.fontSize = taille + "em";
    for (let i = 0; i < menuList.length; i++) {
        menuList[i].style.fontSize = taille + "em";
        paragraphes[i].style.fontSize = taille + "em";
    }
}


function changerTaille(modif) {
    taille = taille + modif;
    cookie = "fontSize";
    setCookie(cookie, taille, 7);
    for (let i = 0; i < menuList.length; i++) {
        menuList[i].style.fontSize = taille + "em";
        paragraphes[i].style.fontSize = taille + "em";
    }

    document.getElementsByTagName("footer")[0].style.fontSize = taille + "em";
}

function tailleParDefaut() {
    taille = 1;
    cookie = "fontSize";
    setCookie(cookie, taille, 7);
    document.getElementsByTagName("footer")[0].style.fontSize = taille + "em";
    for (let i = 0; i < menuList.length; i++) {
        menuList[i].style.fontSize = taille + "em";
        paragraphes[i].style.fontSize = taille + "em";
    }
}

let accessibility = document.getElementsByClassName("imgacess");
for (i = 0; i < accessibility.length; i++) {
    accessibility[i].addEventListener("keyup", event => {
        if (event.keyCode === 13) {
            console.log("enter pressed ");
            let elem = document.getElementById('SousMenuAccessible');
            for (let i = 0; i < elem.length; i++) {
                if (elem[i].style.display === "") {
                    elem[i].style.display = "block";
                } else {
                    elem[i].style.display = "none";
                }
            }

        }
    });
}

function dropDownMenu() {
    let menuDropDown = document.getElementsByClassName("submenu");
    for (let i = 0; i < menuDropDown.length; i++) {
        menuDropDown[i].addEventListener("keyup", event => {
            if (event.keyCode === 13) {
                console.log("enter pressed ");
                for (let i = 0; i < menuDropDown.length; i++) {
                    if (menuDropDown[i].style.display === "") {
                        menuDropDown[i].style.display = "block";
                    } else {
                        menuDropDown[i].style.display = "none";
                    }
                }

            }
        });
    }
}
// function reverseLight() {
//     document.getElementsByTagName("body")[0].style.backgroundColor = "black";
//     let title = document.getElementsByTagName("h1");
//     let paragraphes = document.getElementsByTagName("p");
//     for (let i = 0; i < title.length; i++) {
//         title[i].style.color = "white";
//         paragraphes[i].style.color = "white";
//     }
// }



function openMenu() {
    let menuResp = document.getElementsByClassName("menu2");
    for (let i = 0; i < menuResp.length; i++) {
        if (menuResp[i].style.display === "") {
            menuResp[i].style.display = "block"
        } else {
            menuResp[i].style.display = "";
        }
    }
}

// function openSubmenu() {
//     let elem = document.getElementsByClassName("submenu2");
//     console.log("clicked")
//     for (let i = 0; i < elem.length; i++) {
//         if (elem[i].style.display == "") {
//             elem[i].style.display = "block";
//         } else {
//             elem[i].style.display = "";
//         }
//     }
// }



var fontFamily = { "Classique": "", "OpenDyslexic": "OpenDyslexic", "Luciole": "Luciole" };

let titreGrp = document.getElementsByTagName("h1");
let paragGrp = document.getElementsByTagName("p");
let linkGrp = document.getElementsByTagName("li");
function changerPolice() {
    var indice = document.getElementById("police").value;

    for (let i = 0; i < paragGrp.length; i++) {
        paragGrp[i].style.fontFamily = fontFamily[indice];
    }
    for (let i = 0; i < linkGrp.length; i++) {
        linkGrp[i].style.fontFamily = fontFamily[indice];
    }
    for (let i = 0; i < titreGrp.length; i++) {
        titreGrp[i].style.fontFamily = fontFamily[indice];
    }
    setCookie("fontFamily", indice, 7);
}

function chargerPolice(indice) {
    if (indice == '') {
        indice = 'Classique';
    }
    for (let i = 0; i < titreGrp.length; i++) {
        titreGrp[i].style.fontFamily = fontFamily[indice];
    }
    for (let i = 0; i < paragGrp.length; i++) {
        paragGrp[i].style.fontFamily = fontFamily[indice];
    }
    for (let i = 0; i < linkGrp.length; i++) {
        linkGrp[i].style.fontFamily = fontFamily[indice];
    }
}

let anchor = document.getElementsByTagName("a");
let parag = document.getElementsByTagName("p");
let titles = document.getElementsByTagName("h1");

function changerContrast() {
    let activated;
    if (anchor[2].style.color == "") {
        for (let i = 0; i < anchor.length; i++) {
            anchor[i].style.color = "white";
            anchor[i].style.background = "black";
        }
        for (let i = 0; i < parag.length; i++) {
            parag[i].style.color = "white";
            parag[i].style.background = "black";
        }
        for (let i = 0; i < titles.length; i++) {
            titles[i].style.color = "white";
            titles[i].style.background = "black";
        }
        activated = "contrasted";
    } else if (anchor[2].style.color == "white") {
        for (let i = 0; i < anchor.length; i++) {
            anchor[i].style.color = "";
            anchor[i].style.background = "";
        }
        for (let i = 0; i < parag.length; i++) {
            parag[i].style.color = "";
            parag[i].style.background = "";
        }
        for (let i = 0; i < titles.length; i++) {
            titles[i].style.color = "";
            titles[i].style.background = "";
        }
        activated = "notcontrasted";

    }
    setCookie("contrast", activated, 7);
}

function setContrast(lamiaa) {
    if (lamiaa == "contrasted") {
        for (let i = 0; i < anchor.length; i++) {
            anchor[i].style.color = "white";
            anchor[i].style.background = "black";
        }
        for (let i = 0; i < parag.length; i++) {
            parag[i].style.color = "white";
            parag[i].style.background = "black";
        }
        for (let i = 0; i < titles.length; i++) {
            titles[i].style.color = "white";
            titles[i].style.background = "black";
        }
    } else if (lamiaa == "notcontrasted") {
        for (let i = 0; i < anchor.length; i++) {
            anchor[i].style.color = "";
            anchor[i].style.background = "";
        }
        for (let i = 0; i < parag.length; i++) {
            parag[i].style.color = "";
            parag[i].style.background = "";
        }
        for (let i = 0; i < titles.length; i++) {
            titles[i].style.color = "";
            titles[i].style.background = "";
        }
    }
}

function start() {
    setCookieConsent(getCookie('consent'));
    setTaille(getCookie('fontSize'), 0);
    chargerPolice(getCookie('fontFamily'));
    setContrast(getCookie('contrast'));
 
}