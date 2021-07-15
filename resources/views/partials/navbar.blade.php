<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('accueil') }}"><img id="altere" src="{{ asset('Capture.PNG') }}"><i class="h3">Naceur Coach</i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link {{-- active --}}" aria-current="page" href="{{ route('accueil') }}">ACCUEIL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('articles') }}">ARTICLES</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> --}}
         @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ENTRAINEMENTS
          </a>
          {{-- Ici mettre une boulcle pour les noms des entrainement --}}
          <ul class="dropdown-menu bg-dark" aria-labelledby="navbarScrollingDropdown">
            @foreach($exos as $exo)
            <li><a class="dropdown-item text-light" href="{{ route('exoStart', [$exo->id]) }}">{{ $exo->nom }}</a></li>
            @endforeach
            {{-- Création d'entrainement que si connécté --}}
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light" href="{{ route('affichEntrainement') }}">Tous les exercices</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            COMPETITIONS
          </a>
          {{-- Ici mettre une boucle pour les noms des compétitions --}}
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            @foreach($compets as $compet)
            <li><a class="dropdown-item" href="{{ route('affCompet', ['id' => $compet->id]) }}">{{ $compet->nom }}</a></li>
            @endforeach
            
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('competitions') }}">Toutes</a></li>
          </ul>
        </li>
         @endauth
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CLASSEMENT
          </a>
        
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">POMPES</a></li>
            <li><a class="dropdown-item" href="#">TRACTION</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">CLASSEMENT GENERAL</a></li>
          </ul>
        </li> --}}

        <li class="nav-item">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ ucfirst(Auth::user()->pseudo) }}
            </a>
            {{-- Ici mettre une boulcle pour les noms des compétitions --}}
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">INFO</a></li>
              <li><a class="dropdown-item" href="#">HISTORIQUE</a></li>

              @if( Auth::user()->pseudo == "admin" )
                <li><a class="dropdown-item" href="{{ route('creerArticle') }}">Créer un article</a></li>
                <li><a class="dropdown-item" href="{{ route('creerCompetition') }}">Créer une compétition</a></li>
                <li><a class="dropdown-item" href="{{ route('creerExercice') }}">Créer un exercice</a></li>
              @endif

              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}">SE DECONNECTER</a>
              </li>
            </ul>
          </li>

          {{-- Affichage du menu Admin --}}
          @endauth

          @guest
          <a class="nav-link" data-bs-toggle="modal" href="#exampleModalToggle" role="button" tabindex="-1" aria-disabled="true">LOGIN</a>
          @endguest
        </li>
      </ul>
      {{-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Go</button>
      </form> --}}
    </div>
  </div>
</nav>
<br>
<br>

{{-- ********************* MODAL INSCRIPTION *********************** --}}
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        {{-- FORMULAIRE DE CONNEXION --}}
        <form method="POST" action="{{ route('login')}}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Adresse mail</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
      </div>
      <div class="modal-footer">
        Vous n'avez pas de compte ?
        <button class="btn btn-link" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Inscrivez-vous</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Inscription</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      {{-- <div class="modal-body"> --}}
        <div class="modal-body row ">

           {{-- FORMULAIRE D'INSCRIPTION --}}
          <form method="post" action="{{ route('register') }}">
            @csrf 
            <p class="text-center pb-3">Bienvenue sur mon site, pour mieux en profiter, inscrivez-vous.</p>

            <div class="mb-3 row">
                <label for="nom" class="col-lg-4 d-none d-lg-block col-form-label">Nom</label>
                <div class="col-12 col-lg-7">
                  <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required="">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="prenom" class=" col-lg-4 d-none d-lg-block col-form-label">Prénom</label>
                <div class="col-12 col-lg-7">
                  <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom" required="">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="pseudo" class=" col-lg-4 d-none d-lg-block col-form-label">Pseudo</label>
                <div class="col-12 col-lg-7">
                  <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo" required="">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="date_naissance" class=" col-lg-4 d-none d-lg-block col-form-label">Date de naissance</label>
                <div class="col-12 col-lg-7">
                  <input type="date" name="date_naissance" class="form-control" id="date_naissance" placeholder="Date de naissance" required="">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class=" col-lg-4 d-none d-lg-block form-label">Adresse mail</label>
                <div class="col-12 col-lg-7">
                  <input type="email" name="email" class=" form-control" id="email" placeholder="name@example.com" required="">
              </div>
            </div>

            <div class="mb-3 row">
                <label for="poids" class=" col-lg-4 d-none d-lg-block form-label">Poids</label>
                <div class="col-12 col-lg-7">
                  <input type="number" name="poids" class=" form-control" id="poids" placeholder="Poids" required="">
              </div>
            </div>

            <div class="mb-3 row">
                <label for="sport" class=" col-lg-4 d-none d-lg-block form-label">Sport pratiqué</label>
                <div class="col-12 col-lg-7">
                  <input type="text" name="sport" class=" form-control" id="sport" placeholder="Judo, Boxe, Foot ...">
              </div>
            </div>


            <div class="mb-3 row">
                <label for="inputPassword" class="col-lg-4 d-none d-lg-block form-label">Mot de passe</label>
                <div class="col-12 col-lg-7">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="*********" required>
                </div>
            </div>
                
            
            <div class="mb-3 row">
                <label for="inputPassword_confirmation" class="col-lg-4 d-none d-lg-block form-label">Confirmation</label>
                <div class="col-12 col-lg-7">
                  <input type="password" name="password_confirmation" class="form-control" id="inputPassword_confirmation" placeholder="*********" required="">
                </div>
            </div>

            <div class="text-center">
              <input type="submit" id="inscription" name="inscription" class="btn btn-primary" value="Inscription">
              <input type="reset" name="reset" class="btn btn-secondary" value="Annuler"/>
            </div>
          </form>
        </div>
      {{-- </div> --}}
      <div class="modal-footer">
        <p>Déjà inscrit ?</p>
        <button class="btn btn-link" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Connectez-vous</button>
      </div>
    </div>
  </div>
</div>