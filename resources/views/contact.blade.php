@extends('layouts.app')

    @section('content')

              @if (session('success'))
                    <div class="alert alert-success " role="alert" style="text-align: center;font-size: 25px;">
                        {{ session('success') }}
                    </div>
              @endif

<section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>A proppos de Nous </h2>
              <p>Makimo est une plateforme d'annonce immobiliere qui permet aussi bien aux particuliers qu'aux agences immobilieres de faire leur annonce de prodit immobiliers.
              C'est un portail qui permettra aussi aux banques et instituts financiers de faire leur offre de pret ou de financement sur le plan immobilier.
              Les entreprises specialises dans la conception de forage pourront aussi faire leur annonce pour vulgarisation de leurs services au grand publique .
            </p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
             <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <i class="icofont-location-pin"></i>
                  <h4>Emplacement:</h4>
                  <p>Guinee Conackry</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@makimo.com</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <i class="icofont-phone"></i>
                  <h4>Telephone</h4>
                  <p>+224.......</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <i class="icofont-whatsapp"></i>
                  <h4>Whatsapp:</h4>
                  <p>Cliquer pour aller vers Whatsapp </p>
                </div>
              </div>
            </div>

            <form action="{{route('contact.store')}}" class="w-100" method="POST">
                  @csrf
                  @if($errors->any())
                  @foreach($errors->all() as $error)
                  <div class="alert alert-danger">{{$error}}</div>
                  @endforeach
                  @endif
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nom" class="form-control" id="name" placeholder="Votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Eamil" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="objet" id="subject" placeholder="Objet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

 @endsection