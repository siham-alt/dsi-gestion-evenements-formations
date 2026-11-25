
<head>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
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
    </style>
</head>

@include('header')
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
    <br><br><br>
    <footer>@include('prj/footer')</footer>
</section><br><br>