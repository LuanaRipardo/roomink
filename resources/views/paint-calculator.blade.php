@extends('layout')

@section('content')
    <div class="container">
        <div class="user-button">
            <span class="username">{{ auth()->user()->name }}</span>
            <i class="fa fa-caret-down"></i>
            <div class="dropdown">
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Sair</button>
              </form>
            </div>
        </div>

        <div class="title-container">
            <h1 class="title-initial">Calcule aqui!</h1>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form  method="POST" action="{{ route('paint-calculator.calculate') }}" class="form">
                            @csrf
                            <div class="form-group">
                                <label for="wall_height" class="title">Altura da Parede (em metros):</label>
                                <input id="wall_height" name="wall_height" type="number" class="form-control" min="1" max="10" value="{{ old('wall_height', 1) }}">
                                @error('wall_height')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="wall_width" class="title">Largura da Parede (em metros):</label>
                                <input id="wall_width" name="wall_width" type="number" class="form-control" min="1" max="10" value="{{ old('wall_width', 1) }}">
                                @error('wall_width')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="number_of_doors" class="title">Número de Portas:</label>
                                <input id="number_of_doors" name="number_of_doors" type="number" class="form-control" min="0" max="5" value="{{ old('number_of_doors', 0) }}">
                                @error('number_of_doors')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="number_of_windows" class="title">Número de Janelas:</label>
                                <input id="number_of_windows" name="number_of_windows" type="number" class="form-control" min="0" max="5" value="{{ old('number_of_windows', 0) }}">
                                @error('number_of_windows')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="calc-btn-container">
                                <button  class="calc-btn" id="calculate-btn" type="submit">Calcular</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-8">
              <div class="result-container" fade id="result">
                @if(session('paintNeededFormatted') && session('cansNeededFormatted'))
                  <div class="card bg-black text-white float-left card-shadow">
                    <div class="card-body">
                      <h5 class="result-title">Resultado do cálculo:</h5>
                      <p class="result-text">Olá! Eu acabei de fazer o cálculo e <br> descobri que você vai precisar de <span class="result-number">{{ session('paintNeededFormatted') }} litros</span> de tinta.</p>
                      <p class="result-text">Para que você possa se planejar melhor, <br> recomendo que compre as seguintes <br> latas de tinta: <span class="result-number">{{ session('cansNeededFormatted') }} de 10 litros cada uma.</span></p>
                      <p class="result-text">Dessa forma, você terá a quantidade de tinta necessária <br> para concluir o seu projeto.</p>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>

</div>
@endsection

