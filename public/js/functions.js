document.addEventListener('DOMContentLoaded', function() {

  function handleUserButton() {
      const userButton = document.querySelector('.user-button');

      if (userButton) {
        const dropdown = userButton.querySelector('.dropdown');
        userButton.addEventListener('click', function() {
          console.log('Botão de usuário clicado!');

          dropdown.classList.toggle('ativo');
      });
  }
}

  function handleCalculateButton() {
    var calculateButton = $('#calculate-button');

    calculateButton.click(function() {
      $('html, body').animate({
        scrollTop: $('#result').offset().top
      }, 1000);
    });
  }  });


