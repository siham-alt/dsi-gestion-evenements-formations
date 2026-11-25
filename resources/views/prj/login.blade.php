
        <h2>Se connecter</h2>
        <form action="{{ route('login.action') }}" method="POST" id="loginForm">
            @csrf
            @if ($errors->any())
                <div class="error-container">
                    <div class="error-title font-bold">Error!</div>
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li><span class="block sm:inline">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                    <span class="close-icon" onclick="hideErrorContainer()"> <!-- Ajout de l'événement onclick -->
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
          

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
           

            <button type="submit">Connexion</button>
            <p>Vous n'avez pas encore un compte? </p> <button type="button" onclick="openRegisterModal()">Créer</button>
        </form>
    


    <script>
        function openRegisterModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('registerModal').style.display = 'block';
        }

        
        document.addEventListener('DOMContentLoaded', function () {
    var loginModal = document.getElementById("loginModal");
    var errorContainer = document.querySelector('.error-container');

    // Au chargement de la page, vérifie s'il y a des erreurs et affiche le modal login si nécessaire
    if (errorContainer && errorContainer.style.display !== 'none') {
        loginModal.style.display = 'block';
    }

    // Gestion de l'événement onclick du bouton de fermeture du modal
    var closeLoginModal = document.getElementById("closeLoginModal");
    closeLoginModal.onclick = function () {
        loginModal.style.display = "none";
    }

});

 </script>
</body>

</html>
