function onEnglish () {
    document.cookie = "lang=en";
    var cookies = document.cookie
                    .split(';')
                    .map(cookie => cookie.split('='))
                    .reduce((accumulator, [key, value]) => 
                        ({...accumulator, [key.trim()]: decodeURIComponent(value) }), {});
    document.getElementById('english-btn').value = cookies.lang;
    window.location.reload();
    console.log(cookies.lang);
}

function onHindi () {
    document.cookie = "lang=hi";
    var cookies = document.cookie
                    .split(';')
                    .map(cookie => cookie.split('='))
                    .reduce((accumulator, [key, value]) => 
                        ({...accumulator, [key.trim()]: decodeURIComponent(value) }), {});
    document.getElementById('hindi-btn').value = cookies.lang;
    window.location.reload();
    console.log(cookies.lang);
}