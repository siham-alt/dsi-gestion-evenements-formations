<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <style>

#registrationForm {
    background-color: #fff;
    margin: auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
}

input {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

input:focus {
    border-color: #007bff;
    outline: none;
}

button {
    background-color: #1F64AE;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.text-red-600 {
    color: #f00;
    font-size: 12px;
    margin-top: -10px;
    margin-bottom: 10px;
}

.title {
    margin-bottom: 20px;
    font-size: 24px;
    color: #1F64AE;
}
    </style>
</head>

<body>
        <h1>Créer un compte</h1>
        <form action="{{ route('register.save') }}" method="POST" id="registrationForm">
            @csrf
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>
            @error('name')
            <span class="text-red-600">{{ $message }}</span>
            @enderror

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @error('email')
            <span class="text-red-600">{{ $message }}</span>
            @enderror

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
            <span class="text-red-600">{{ $message }}</span>
            @enderror

            <label for="password_confirmation">Confirmez le mot de passe:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            @error('password_confirmation')
            <span class="text-red-600">{{ $message }}</span>
            @enderror

            <button type="submit" id="createBtn">Créer</button>
            <p>Vous avez déjà un compte? </p>
            <button type="button" onclick="openLoginModal()">Se connecter</button>
        </form>
    </div>

    <script>
        function openLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('registerModal').style.display = 'block';
        }

        document.addEventListener('DOMContentLoaded', function () {
            var errorContainer = document.querySelector('.error-container');

            // Afficher le modal d'inscription s'il y a des erreurs
            if (errorContainer && errorContainer.style.display !== 'none') {
                document.getElementById('registrationForm').classList.remove('hidden');
                document.getElementById('registerModal').style.display = 'block';
            }


            var closeRegisterModal = document.getElementById("closeRegisterModal");
            closeRegisterModal.onclick = function () {
             document.getElementById('registerModal').style.display = "none";
    }
        });
    </script>
</body>

</html>
