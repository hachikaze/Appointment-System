import os
from flask import Flask, request, jsonify, render_template
from transformers import pipeline
import langdetect

app = Flask(__name__)

@app.route('/')
def home():
    return render_template("index.html")  # Flask will look inside the "templates" folder

# Load Hugging Face Sentiment Analysis Models
multilingual_model = pipeline("sentiment-analysis", model="tabularisai/multilingual-sentiment-analysis")
english_model = pipeline("sentiment-analysis", model="siebert/sentiment-roberta-large-english")

def detect_language(text):
    try:
        return langdetect.detect(text)
    except:
        return "unknown"

@app.route('/analyze', methods=['POST'])
def analyze_sentiment():
    data = request.json
    if not data or 'text' not in data:
        return jsonify({"error": "No text provided"}), 400
    
    text = data['text']
    language = detect_language(text)
    
    # Choose the appropriate model based on language
    if language == "en":
        result = english_model(text)
    else:
        result = multilingual_model(text)
    
    sentiment = result[0]["label"].lower()
    score = result[0]["score"]
    
    return jsonify({
        "original_text": text,
        "language_detected": language,
        "sentiment": sentiment,
        "confidence_score": score
    })

if __name__ == "__main__":
    port = int(os.environ.get("PORT", 5000))  
    app.run(host="0.0.0.0", port=port)
