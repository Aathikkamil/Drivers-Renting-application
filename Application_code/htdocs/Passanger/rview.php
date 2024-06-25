<html lang="en">
<head>
   <?php require_once('../setup/head.php')  ?>
<style>
   /* Style for the user reviews table */
        .user-reviews-table {
            width: 100%;
            border-collapse: collapse;
        }
        .review-card {
            

        }

        .user-reviews-table td {
            text-align: center;
            padding: 10px;
            vertical-align: middle;
        }
        .star {
    font-size: 32px; /* Adjust the font size to make the stars bigger */
    color: #ccc;
    
}

.filled {
    color: #FFD700;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.rating {
    margin-top: 5px;
    display: flex;
    justify-content: center;
}

input[type="radio"] {
    display: none;
}

label[for="star1"], label[for="star2"], label[for="star3"], label[for="star4"], label[for="star5"] {
    font-size: 24px;
    padding: 5px;
    cursor: pointer;
}

label[for="star1"]:before, label[for="star2"]:before, label[for="star3"]:before, label[for="star4"]:before, label[for="star5"]:before {
    content: "\2605";
    color: #ccc;
}

input[type="radio"]:checked ~ label:before {
    color: #ffcc00;
}
body {
            font-family: Arial, sans-serif;
            background-image: url('../assets/bg.jpg');
    backdrop-filter: blur(5px); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.5); /* Adjust the last value (0.5) for transparency */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.inner-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: rgba(255, 255, 355, 0.5);
            margin: 10px 0;
        }
        .outer-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: rgba(200, 255, 255, 0.5);
        }

</style>

</head>
<body>
    <?php require_once('../setup/navbar.php'); ?><br><br><br><br>
    <div class="container">
        <div class="outer-card">
            <div class="inner-card">
                <div class="review-container">
                    <h2>Leave a Review</h2>
                    <form action="reviewaction.php" method="post">
                        <label for="rating">Rating:</label>
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                        </div>
                        <label for="user_review">Your Review:</label>
                        <textarea id="user_review" name="user_review" rows="4" required></textarea>
                        <input type="hidden" id="sentiment-review" name="sentiment-review" value="">
        
                        <button type="submit">Submit Review</button>
                       
                    </form>
                    <p name="sentiment-result" id="sentiment-result"></p>

                   
                </div>
            </div>
        </div>  
    </div>


</body>
<script>
    // Get the form element and the sentiment-result paragraph
    const reviewForm = document.querySelector('form');
    const sentimentResult = document.getElementById('sentiment-result');
    const sentimentInput = document.getElementById('sentiment-review');

    // Event listener for form submission
    reviewForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Get the user's review and rating
        const userReview = document.getElementById('user_review').value;

        // Make an asynchronous request to your FastAPI sentiment analysis endpoint
        const requestOptions = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ user_review: userReview }),
        };

        const response = await fetch('http://127.0.0.1:8001/app/', requestOptions);

        if (response.ok) {
            const result = await response.json();
            // Display the sentiment analysis result
            sentimentResult.textContent = `Sentiment: ${result.sentiment}`;
            
            // Set the sentiment result in the hidden input field
            sentimentInput.value = result.sentiment;

            // After displaying the sentiment, submit the form
            setTimeout(() => {
                reviewForm.submit(); // This will trigger the form submission after the delay
            }, 9000);
           // This will trigger the form submission
        } else {
            sentimentResult.textContent = 'Error occurred while analyzing sentiment.';
        }
    });
</script>


</html>