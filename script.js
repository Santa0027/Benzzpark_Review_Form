const form = document.getElementById('myform').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php', true);

    // Show loading animation
    document.getElementById('loading').style.display = 'inline';
    document.getElementById('response').textContent = ''; // Clear previous response

    xhr.onload = function() {
        // Hide loading animation
        document.getElementById('loading').style.display = 'none';

        if (xhr.status === 200) {
            document.getElementById('response').textContent = this.response;
            document.getElementById('myform').reset(); 
        } else {
            document.getElementById('response').textContent = this.respons;
        }
    };

    xhr.send(formData); // Send the form data
});
