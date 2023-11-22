from flask import Flask, render_template, request
from flask import jsonify
from sklearn.linear_model import LogisticRegression
import numpy as np
# Importez les autres bibliothèques nécessaires pour votre modèle de prédiction du diabète
import pickle

# Chargez le modèle à partir du fichier
with open('model.pkl', 'rb') as f:
    model = pickle.load(f)

app = Flask(__name__)

@app.route('/')
def home():
    return render_template('test.html')
@app.route('/app_flask.html')
def app_flask():
    return render_template('app_flask.html')

@app.route('/predict', methods=['POST'])
def predict():
    #recuperation des données
    data = request.get_json()
     # Remodeler les données pour les adapter à la prédiction du modèle
    features = [[float(data['gender']), float(data['age']), float(data['hypertension']), float(data['heart_disease']),
                 float(data['smoking']), float(data['bmi']), float(data['hemoglobin']), float(data['glucose'])]]
    
    prediction = model.predict(features)
    if prediction == 1:
        prediction ='diabétique'
    if prediction == 0:
        prediction ='non diabétique'
    return jsonify({'prediction': prediction})

@app.route('/about')
def about():
    return render_template('about.html')

if __name__ == '__main__':
    app.run(debug=True)
