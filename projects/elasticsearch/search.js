document.getElementById('query').addEventListener('input', function() {
    const query = this.value;

    if (query.length === 0) {
        document.getElementById('results').innerHTML = '';
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'search.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('results').innerHTML = xhr.responseText;
        }
    };

    xhr.send('query=' + encodeURIComponent(query) + '&ajax=1');
});
