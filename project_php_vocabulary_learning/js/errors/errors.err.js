window.addEventListener('load', (event) => {
    let url_string = window.location.href;
    let url = new URL(url_string);
    let error = url.searchParams.get("error");

    if (error) {
        let obj = document.getElementsByTagName("input");
        let p = document.getElementById("info");
        for (let i = 0; i < obj.length; i++) {
            obj[i].style.borderColor = "pink";
        }
        switch (error) {
            case 'emptyFields':
                    p.innerHTML = "Musisz wypełnić wszystkie pola!";
                break;
            case 'sqlError':
                    p.innerHTML = "Błąd serwera!";
                break;
            case 'invalidNameOrPwd':
                    p.innerHTML = "Błędna nazwa uzytkownika lub hasło!";
                    let uName = url.searchParams.get("uName");
                    obj[0].value=uName;
                break;
            case 'userNoActive':
                    p.innerHTML = "Użytkownik nie jest aktywny! Skontaktuj się z administratorem!";
                break;
            case 'userTaken':
                    p.innerHTML = "Taki użytkownik już istnieje!";
                break;
            case 'userNoActive':
                    p.innerHTML = "Użytkownik nie jest aktywny!Skontaktuj się z administratorem";
                break;
            default:
                p.innerHTML = "Nieznany błąd!";
        }
    }
});
