function themeSwitch() {
    if (document.getElementById("themeSlider").checked == true) {

        document.getElementById("pageStyle").setAttribute('href', "css/light.css");

    }
    else {

        document.getElementById("pageStyle").setAttribute('href', "css/dark.css");

    }
}
