{{-- @extends('layouts.app') --}}
@extends('layouts.index')

@section('content')
<section class="home">
    {{-- <div class="_container">
        <div class="home__body">
          <h1>Профиль</h1> --}}
          {{-- <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        >
           {{ __('Logout') }}
       </a> --}}




       {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            {{ __('Loggout') }}
        </a>

        
        </div>
    </div> --}}



  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('home')}}" class="logo">
                        <img src="{{ asset('img/index/logo.png')}}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Что-то ищем?" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('home')}}">Главная</a></li>
                        <li><a href="browse.html">Мерч</a></li>
                        <li><a href="details.html">Details</a></li>
                        <li><a href="#">Вопрос дня</a></li>
                        @if(Auth::user() && Auth::user()->google_id)
                          <li><a href="#" class="active">{{ Str::limit(Auth::user()->name, 12, '...') }}<img src="{{ Auth::user()->avatar }}" alt="Google Image"></a></li>
                        @else
                          <li><a href="#" class="active">{{ Str::limit(Auth::user()->name, 12, '...') }}<img src="{{ asset('img/index/profile-header.jpg')}}" alt=""></a></li>
                        @endif
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <div class="col-lg-4">
                    @if(Auth::user() && Auth::user()->google_id)
                    <img src="{{ Auth::user()->avatar }}" alt="" style="border-radius: 23px;">
                    @else
                    <img src="{{ asset('img/index/profile-header.jpg')}}" alt="" style="border-radius: 23px;">
                    @endif
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <span>Online</span>
                      <h4>{{ Auth::user()->name }}</h4>
                      <p>@if ( Auth::user()->description != null) {{ Auth::user()->description }} @else {{ 'Напишите немного о себе!' }} @endif
                        <button class="btn btn-outline-secondary text-white ms-2" id="edit-button" type="button"><i class="fas fa-pencil-alt"></i></button>
                        </p>
                      <div class="main-border-button">
                        <div class="align-self-center">
                            {{-- <a href="#">Start Live Stream</a> --}}
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('ВЫЙТИ ИЗ АККАУНТА') }}
                            </a>
                        </div>
                      </div>
                    </div>




                    <!-- The popup -->
                    <div class="popup">
                        <div class="popup-content">
                            <span class="close-button">&times;</span>
                        
                            <!-- Your form for editing goes here -->
                            <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                                @csrf
                                
                                <!-- Input field for editing description -->
                                <div class="form-group">
                                    <label for="description">Пару строк о вас:</label>
                                    <textarea id="description" class="form-control autosize" name="description" maxlength="120">{{ Auth::user()->description }}</textarea>

                                    <small class="form-text text-muted">Максимум 120 символов</small>
                                </div>

                                <!-- Save button -->
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </form>
                        </div>
                    </div>







                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>Уровень <span>{{ Auth::user()->level }}</span></li>
                      <li>Баллы <span>{{ Auth::user()->points }}</span></li>
                      <li>Правильных ответов <span>100</span></li>
                      <li>Ждите обновления <span>WAIT</span></li>
                    </ul>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                      <div class="clips">
                        <div class="row">
                          <div class="col-lg-12 text-center">
                            <div class="heading-section">
                              <h4>Связать <em>профили</em></h4>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <a href="#">
                            <div class="item">
                              <div class="d-flex align-items-center pt-3">
                                <div class="thumb">
                                  <img src="{{ asset('img/index/Abstraction_1.jpg')}}" alt="Google" style="border-radius: 23px; width: 100px; height: 100px;">
                                  <!-- Добавьте ссылку для Google -->
                                </div>
                                <div class="down-content ml-3">
                                 

                                  @if (Auth::user()->google_id)
                                  <h4 class="ms-3" style="font-size:  1.5em;">Аккаунты связаны</h4>
                                  @else
                                      <a href="{{ route('google.login') }}" class="ms-3"><h4 class="ms-3" style="font-size:  1.5em;">Связать аккаунт с GOOGLE</h4></a>
                                  @endif

                                </div>
                              </div>
                            </div>
                            </a>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <a href="#">
                            <div class="item">
                              <div class="d-flex align-items-center  pt-3">
                                <div class="thumb">
                                  <img src="{{ asset('img/index/Abstraction.jpg')}}" alt="Coming Soon" style="border-radius: 23px; width: 100px; height: 100px;">
                                  <!-- Добавьте ссылку для "Будет добавлено позже" -->
                                </div>
                                <div class="down-content ml-3">
                                  <h4 class="ms-3" style="font-size: 1.5em;">Будет добавлено позже</h4>
                                </div>
                              </div>
                            </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                  
                {{-- <div class="row">
                  <div class="col-lg-12">
                    <div class="clips">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="heading-section">
                            <h4><em>Your Most Popular</em> Clips</h4>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                            <div class="thumb">
                              <img src="assets/images/clip-01.jpg" alt="" style="border-radius: 23px;">
                              <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="down-content">
                              <h4>First Clip</h4>
                              <span><i class="fa fa-eye"></i> 250</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                            <div class="thumb">
                              <img src="assets/images/clip-02.jpg" alt="" style="border-radius: 23px;">
                              <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="down-content">
                              <h4>Second Clip</h4>
                              <span><i class="fa fa-eye"></i> 183</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                            <div class="thumb">
                              <img src="assets/images/clip-03.jpg" alt="" style="border-radius: 23px;">
                              <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="down-content">
                              <h4>Third Clip</h4>
                              <span><i class="fa fa-eye"></i> 141</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                            <div class="thumb">
                              <img src="assets/images/clip-04.jpg" alt="" style="border-radius: 23px;">
                              <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="down-content">
                              <h4>Fourth Clip</h4>
                              <span><i class="fa fa-eye"></i> 91</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="main-button">
                            <a href="#">Load More Clips</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          {{-- <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Your Gaming</em> Library</h4>
              </div>
              <div class="item">
                <ul>
                  <li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Dota 2</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>24/08/2036</span></li>
                  <li><h4>Hours Played</h4><span>634 H 22 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div>
              <div class="item">
                <ul>
                  <li><img src="assets/images/game-02.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Fortnite</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>22/06/2036</span></li>
                  <li><h4>Hours Played</h4><span>745 H 22 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div>
              <div class="item last-item">
                <ul>
                  <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>CS-GO</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>21/04/2022</span></li>
                  <li><h4>Hours Played</h4><span>632 H 46 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div>
            </div>
          </div> --}}
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Magic Vision</a> Games. All rights reserved. 
        </div>
      </div>
    </div>
  </footer>
</section>

<!-- JavaScript code to handle the popup functionality -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
<script>
    // Get the edit button and the popup
    var editButton = document.getElementById('edit-button');
    var popup = document.querySelector('.popup');
    var popupContent = document.querySelector('.popup-content');

    // Open the popup when the edit button is clicked
    editButton.addEventListener('click', function() {
        popup.style.display = 'block';
        autosize(document.querySelector('#description'));
    });

    // Close the popup when the close button is clicked
    var closeButton = document.querySelector('.close-button');
    closeButton.addEventListener('click', function () {
        popup.style.display = 'none';
    });

    // Close the popup when the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    });

  
</script>


<style>
    .dark-overlay {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #27292a;
        padding: 20px;
        border-radius: 5px;
        color: #fff;
        z-index: 10000;
    }

    .popup h3 {
        margin-top: 0;
    }

    .popup-close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #fff;
        cursor: pointer;
    }
</style>
@endsection