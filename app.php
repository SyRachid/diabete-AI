
    <!DOCTYPE html>
<html>
<head>
    <title>Prediction de diabète</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        img{
            width: 20%;
        }
  body{
    background:#073459;
  }
        .container {
    text-align: center;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    background: linear-gradient(to right, #4e73df, #1cc88a)
     }
.title{
    color:beige;
}

        h1 {
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }
        select,
        input[type="text"],
        input[type="number"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #result {
            margin-top: 20px;
            font-weight: bold;
        }
        label{
            color:azure;
            font-family:Arial, Helvetica;
        }
        button{
            align-content:flex-start;
        }

header{
    text-align: center;
}
h1{
    color:beige;
}
select{
    font-family: Arial, Helvetica;
}
    </style>
    <script>
        function predictDiabetes() {
            // Récupérer les valeurs saisies par l'utilisateur
            var gender = document.getElementById('gender').value;
            var age = parseInt(document.getElementById('age').value);
            var hypertension = parseInt(document.getElementById('hypertension').value);
            var heartDisease = parseInt(document.getElementById('heart_disease').value);
            var smoking = parseInt(document.getElementById('smoking').value);
            var bmi = parseFloat(document.getElementById('bmi').value);
            var hemoglobin = parseFloat(document.getElementById('hemoglobin').value);
            var glucose = parseFloat(document.getElementById('glucose').value);
            
            // Effectuer le calcul de prédiction
            var prob = logit(calculatePrediction(gender, age, hypertension, heartDisease, smoking, bmi, hemoglobin,glucose));
            
            // Afficher le résultat de la prédiction
            if (prob > 0.5)
            {
                prediction = 'diabetiique';
            }
            if (prob < 0.5)
            {
                prediction ='non diabetique';
            }
            var result = document.getElementById('result');
            result.innerHTML = "La prédiction de diabète est : " + prediction;
        }
        function logit(x) {
  return 1 / (1 + Math.exp(-x));
}
        function calculatePrediction(gender, age, hypertension, heartDisease, smoking, bmi, hemoglobin,glucose) {
            return (gender*-0.1722946 + age*0.01966445 + hypertension * 1.2931376 + heartDisease*1.6402814 + smoking*(0.04815756) + bmi*0.05778752 + hemoglobin*1.12644977 + glucose*0.0314562 -18.7957)
          
        }
    </script>
</head>

  
<body>
    
    <header>
        <div class="logo">
          <img src="R.jpeg" alt="Icône de médecine">
        </div>
        <h1 style ="color:beige">Sante+</h1>
      </header>
        
    <div class="container">
        <h1>Prediction de diabète</h1>
        <label for="gender" >Genre:</label>
        <select type="number"   id="gender">
            <option value=""></option>
           <option value="1">femme</option>
           <option value="0">homme</option> 
        </select><br>

        <label for="age">Âge:</label>
        <input type="number" id="age" min="0"  placeholder="entrez votre l'age"><br>

        <label for="hypertension">Présence d'hypertension:</label>
        <select type="number" id="hypertension">
            <option value=""></option>
            <option value="1">oui</option>
            <option value="0">non</option>
        </select><br>

        <label for="heart_disease">Présence de maladie cardiaque:</label>
        <select type="number" id="heart_disease" >
            <option value=""></option>
            <option value="1">oui</option>
            <option value="0">non</option>
        </select><br>

        <label for="smoking">Antécédents de fumeur:</label>
        <select type="number" id="smoking" style="text-align: center;">
            <option value=""></option>
            <option value="0.1">rare</option>
            <option value="0">jamais</option>
            <option value="0.5">inconnu</option>
            <option value="2">courant</option>
            <option value="1">ancien</option>
            <option value="1.5">non courant</option>
        </select><br>

        <label for="bmi">Indice de masse corporelle:</label>
        <input type="number" id="bmi" placeholder="entrez l'IMC"><br>

        <label for="hemoglobin">Taux d'hémoglobine:</label>
        <input type="number" id="hemoglobin" placeholder="entrez le taux d'hemoglobine"><br>
        
        <label for="glucose">Taux de glucose dans le sang:</label>
        <input type="number" id="glucose" placeholder="entrez taux de gluscose"><br>
        
        <button onclick="predictDiabetes()">Prédire</button>
       <label id="result">Resultat: </label> 
    </div>
</body>
</html>
