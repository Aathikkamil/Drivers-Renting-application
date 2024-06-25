from fastapi import FastAPI
import uvicorn
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import pickle
import joblib
import numpy as np  # Added this import

fastapiApp = FastAPI()
fastapiApp.add_middleware(
    CORSMiddleware,
    allow_methods=['*'],
    allow_headers=['*'],
    allow_origins=['*'],
    allow_credentials=True
)

class UserReview(BaseModel):
    user_review: str

@fastapiApp.post("/app/")
async def search_app(search_text: UserReview):
    try:
        with open('gaussian_nb_model.pkl', 'rb') as file:
            loaded_model = pickle.load(file)
        loaded_vectorizer = joblib.load('count_vectorizer.pkl')

        # Convert user review text into a list to match the vectorizer input format
        user_input = [search_text.user_review]

        # Transform the user input using the loaded vectorizer
        user_array = loaded_vectorizer.transform(user_input).toarray()

        # Predict sentiment using the loaded model
        sentiment = loaded_model.predict(user_array)

        # The result should be a numpy array, so we convert it to an integer
        sentiment = int(sentiment[0])

        if sentiment == 1:
            result = "positive"
        else:
            result = "negative"

        return {"sentiment": result}  # Return the result as JSON
    except Exception as e:
        return {"error": str(e)}

if __name__ == "__main__":
    uvicorn.run(fastapiApp, host="127.0.0.1", port=8001)
