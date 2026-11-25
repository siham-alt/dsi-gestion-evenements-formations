<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site web</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .categorie-title,
        .events-title {
            text-align: center; /* Center-align the titles */
            font-size: 2.5rem; /* Increase font size */
            font-weight: bold; /* Make the font bold */
            color: #333; /* Set color to a dark shade */
            margin-bottom: 30px; /* Add some space at the bottom */
            text-transform: uppercase; /* Transform text to uppercase */
            letter-spacing: 1px; /* Add letter-spacing for better readability */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Add subtle text shadow */
        }

        .categorie-title:hover,
        .events-title:hover {
            color: #c46c00; /* Change color on hover to an accent color */
            transform: scale(1.05); /* Scale up slightly on hover */
            transition: all 0.3s ease; /* Smooth transition for hover effects */
        }

        .categories {
            margin-bottom: 50px; /* Add margin between categories and events */
        }

        .events {
            margin-top: 50px; /* Add margin above events section */
        }

        .categories .categorie-item,
        .events .event-card {
            background-color: #f9f9f9; /* Light background color for items */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Padding around items */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: transform 0.3s ease; /* Smooth transform on hover */
        }

        .categories .categorie-item:hover,
        .events .event-card:hover {
            transform: translateY(-5px); /* Lift on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Enhanced shadow on hover */
        }

        .categories .categorie-item h3,
        .events .event-card h3 {
            font-size: 1.8rem; /* Item title font size */
            margin-bottom: 10px; /* Space below title */
            color: #333; /* Dark color for title */
        }

        .categories .categorie-item p,
        .events .event-card p {
            font-size: 1.4rem; /* Item description font size */
            color: #666; /* Medium dark color for description */
        }
        .alert {
    padding: 20px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}

.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}


    </style>
</head>

<body>
    <header>
        <div class="logo"><span>For</span>Event</div>
        <ul class="menu">
            <li><a href="{{ route('acceuil') }}">Accueil</a></li>
            <li><a href="{{ route('evenements.show')}}">Événements</a></li>
            <li><a href="{{ route('formations.show')}}">Formations</a></li>
            <li><a href="#contact">Contact</a></li>

        </ul>
        <button class="login-btn" id="loginBtn">Se connecter</button>
    </header>

    <div class="hero-image">
        <div class="hero-text">
            <h1>Bienvenue sur notre site</h1>
            <p>Découvrez nos événements et formations</p>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>
    <section class="about_us" id="about">
        <div class="section_container">
            <div class="text_section">
                <h2 class="section_title">À propos de nous</h2>
                <p>
                    Nous, à la Direction des Systèmes d'Information, nous engageons à offrir une expérience inégalée à nos visiteurs, assurant une expérience authentique dans un environnement chaleureux, amical et détendu. Notre objectif est d'apporter une touche de sérénité à la ville avec notre espace accueillant, doté de canapés confortables pour vous détendre tout en dégustant votre café.
                </p>
            </div>
            <div class="image_section">
                <img src="img/4.jpg" alt="À propos de nous">
            </div>
        </div>
    </section>
    <section class="content">
        <h1 class="categorie-title">Voici quelques Formations fournies par la DSI</h1><br><br>
        <div class="categories">
            @include('prj/categorie')
        </div>

        <br><br><br><br><br><br><br><br>

        <h1 class="events-title">Voici des événements déjà organisés par la DSI</h1>
        <div class="events">
            @include('prj/cards')
        </div>
    </section>
<br><br><br><br>
    <section class="contact-form" id="contact">
    <div class="heading"><b>Nous Contacter</b></div>
    <div class="para">Pour toute question ou information supplémentaire, veuillez remplir le formulaire ci-dessous.</div><br>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="contactForm">
        <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <input type="text" class="input" name="nom" placeholder="Nom" required>
            <input type="email" class="input" name="email" placeholder="Email" required>
            <textarea class="input" name="message" rows="4" placeholder="Message" required></textarea>
            <input type="submit" class="input submit" value="Envoyer">
        </form>
    </div>
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3308.1659852574617!2d-6.858738424420779!3d33.98827007318113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76d6b99660137%3A0x2e8e7d79b04b2d11!2sDSI%20MEN!5e0!3m2!1sfr!2sma!4v1719617724392!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="contactMethod">
        <div class="method">
            <i class="fas fa-phone contactIcon"></i>
            <div class="text">
                <div class="sub-heading">Téléphone</div>
                <div class="para">+212 123-456-789</div>
            </div>
        </div>
        <div class="method">
            <i class="fas fa-envelope contactIcon"></i>
            <div class="text">
                <div class="sub-heading">Email</div>
                <div class="para">contact@dsi.ma</div>
            </div>
        </div>
        <div class="method">
            <i class="fas fa-map-marker-alt contactIcon"></i>
            <div class="text">
                <div class="sub-heading">Adresse</div>
                <div class="para">123 Rue Example, Salé, Maroc</div>
            </div>
        </div>
    </div>
</section><br><br>

    <footer>@include('prj/footer')</footer>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            @include('prj/login')
        </div>
    </div>

    <!-- Modal Register -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeRegisterModal">&times;</span>
            @include('prj/register')
        </div>
    </div>


    <script>
        window.addEventListener('scroll', function () {
            var header = document.querySelector('header');
            header.classList.toggle('scrolled', window.scrollY > 50);
        });

        var loginBtn = document.querySelector('.login-btn');
        var modal = document.getElementById('loginModal');
        var closeBtn = document.querySelector('.close');

        loginBtn.addEventListener('click', function () {
            modal.style.display = 'block';
        });

        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    </script>
</body>

</html>
