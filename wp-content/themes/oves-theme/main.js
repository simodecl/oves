function toggleheadermenu() {
    let navMain = document.getElementById('nav-main');
    let navSecondary = document.getElementById('nav-secondary');
    let togglebutton = document.getElementById('toggle-menu');
    if (navMain.style.display === "none") {
        navMain.style.display = "block";
        togglebutton.firstChild.data = "SLUIT MENU";
    } else {
        navMain.style.display = "none";
        togglebutton.firstChild.data = "OPEN MENU"
    }
    if (navSecondary.style.display === "none") {
        navSecondary.style.display = "block";
        togglebutton.firstChild.data = "SLUIT MENU";
    } else {
        navSecondary.style.display = "none";
        togglebutton.firstChild.data = "OPEN MENU"
    }
}

function toggledescription() {
    let description = document.getElementById('descriptionContainerExtra');
    let togglebutton = document.getElementById('toggle-description');
    if (description.style.display === "none") {
        description.style.display = "flex";
        togglebutton.firstChild.data = "Lees minder";
    } else {
        description.style.display = "none";
        togglebutton.firstChild.data = "Lees meer"
    }
}

function show($id) {
    let hideThis = document.querySelectorAll('.section');
    let showThis = document.getElementById('section-' + $id);
    let buttonAll = document.querySelectorAll('.toggle');
    let buttonActive = document.getElementById('toggle-' + $id);
    
    let i = 0;
    let s = 0;
    for ( i ; i < hideThis.length; i++) {
        hideThis[i].style.display = "none";
    };

    showThis.style.display = "block";

    for (s ; s < buttonAll.length; s++) {
        buttonAll[s].style.backgroundColor = "transparent";
        buttonAll[s].style.color = "#FFF";
    };

    buttonActive.style.backgroundColor = "#FFF";
    buttonActive.style.color = "#9D9D9C";
}

function showKamp($id) {
    let hideThis = document.querySelectorAll('.kampLijstCategorie');
    let showThis = document.getElementById('kampLijstCategorie-' + $id);
    let buttonAll = document.querySelectorAll('.toggle');
    let buttonActive = document.getElementById('toggle-' + $id);
    
    let i = 0;
    let s = 0;
    for ( i ; i < hideThis.length; i++) {
        hideThis[i].style.display = "none";
    };

    showThis.style.display = "flex";

    for (s ; s < buttonAll.length; s++) {
        buttonAll[s].style.backgroundColor = "transparent";
        buttonAll[s].style.color = "#3C3C3B";
    };

    buttonActive.style.backgroundColor = "#3C3C3B";
    buttonActive.style.color = "#FFF";
}
