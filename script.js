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


function handleStarClick(ratingName) {
    const stars = document.querySelectorAll(`input[name="${ratingName}"]`);
    const labels = document.querySelectorAll(`input[name="${ratingName}"] ~ label`);

    stars.forEach((star, index) => {
        star.addEventListener("click", function (event) {
            console.log(`Star clicked: ID=${star.id}, Index=${index}, Value=${star.value}, Checked=${star.checked}`);

            // If the clicked star is already checked
            if (star.checked && star.dataset.checked === "true") {
                // Uncheck the current star
                star.checked = false;
                console.log(`Unchecked: ID=${star.id}, Value=${star.value}`);

                // Check the previous star if it exists
                if (index > 0) {
                    stars[index - 1].checked = true;
                    console.log(`Decremented to: ID=${stars[index - 1].id}, Value=${stars[index - 1].value}`);
                }

                // Prevent default toggle behavior
                event.preventDefault();
            }

            // Update the `data-checked` attribute for all stars
            stars.forEach((s) => {
                s.dataset.checked = s.checked ? "true" : "false";
            });

            // Update star colors dynamically
            updateStarColors(stars, labels);
        });
    });
}

// Function to dynamically update star colors
function updateStarColors(stars, labels) {
    stars.forEach((star, index) => {
        if (star.checked) {
            // Highlight current star and all previous stars
            labels[index].style.color = "gold";
            for (let i = 0; i < index; i++) {
                labels[i].style.color = "gold";
            }
        } else {
            // Reset color for unselected stars
            labels[index].style.color = "#919082";
        }
    });
}

// Apply the behavior to each rating group
handleStarClick("ambience");
handleStarClick("checkinout");
handleStarClick("reservation");
handleStarClick("food");
handleStarClick("Quality");
handleStarClick("Service");
handleStarClick("Cleanliness");
handleStarClick("Decor");
handleStarClick("Air_Condition");
handleStarClick("Supplies");
handleStarClick("Comfort");
handleStarClick("Fittings");
