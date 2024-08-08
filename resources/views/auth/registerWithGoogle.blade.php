@extends('layouts.imports')

<div class="mb-5 p-4 bg-white shadow-sm">
    <h3>Создадим аккаунт</h3>
    <div id="stepperForm" class="bs-stepper linear">
      <div class="bs-stepper-header" role="tablist">
        <div class="step active" data-target="#test-form-1">
          <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="test-form-1" aria-selected="true">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label">Дата рождения</span>
          </button>
        </div>
        <div class="bs-stepper-line"></div>
        <div class="step" data-target="#test-form-2">
          <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="test-form-2" aria-selected="false" disabled="disabled">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label">Имя</span>
          </button>
        </div>
        <div class="bs-stepper-line"></div>
        <div class="step" data-target="#test-form-3">
          <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="test-form-3" aria-selected="false" disabled="disabled">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label">Email</span>
          </button>
        </div>
        <div class="bs-stepper-line"></div>
        <div class="step" data-target="#test-form-4">
          <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger4" aria-controls="test-form-4" aria-selected="false" disabled="disabled">
            <span class="bs-stepper-circle">4</span>
            <span class="bs-stepper-label">Пароль</span>
          </button>
        </div>
        <div class="bs-stepper-line"></div>
        <div class="step" data-target="#test-form-5">
          <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger5" aria-controls="test-form-5" aria-selected="false" disabled="disabled">
            <span class="bs-stepper-circle">5</span>
            <span class="bs-stepper-label">Подтвердить</span>
          </button>
        </div>
      </div>
      <div class="bs-stepper-content">
        <form class="needs-validation was-validated" novalidate="" action="{{ route('google.registration')}}" method="post" enctype="multipart/form-data">
            @csrf 
          <div id="test-form-1" role="tabpanel" class="bs-stepper-pane fade active dstepper-block" aria-labelledby="stepperFormTrigger1">
            <div class="form-group">
              <label for="inputBirthdateForm">Дата рождения <span class="text-danger font-weight-bold">*</span></label>
              <input name="birthdate" id="inputBirthdateForm" type="date" class="form-control" required="">
              <div class="invalid-feedback">Выберите дату рождения</div>
              <div id="ageError" class="text-danger">Вам должно быть 12 лет или старше</div>
            </div>
            <button class="btn btn-primary btn-next-form">Далее</button>
          </div>
          <div id="test-form-2" role="tabpanel" class="bs-stepper-pane fade dstepper-none" aria-labelledby="stepperFormTrigger2">
            <div class="form-group">
              <label for="inputNameForm">Имя <span class="text-danger font-weight-bold">*</span></label>
              <input name="name" id="inputNameForm" type="text" class="form-control" required="">
              <div class="invalid-feedback">Введите ваше имя</div>
            </div>
            <button class="btn btn-primary btn-prev-form">Назад</button>
            <button class="btn btn-primary btn-next-form">Вперёд</button>
          </div>
          <div id="test-form-3" role="tabpanel" class="bs-stepper-pane fade dstepper-none" aria-labelledby="stepperFormTrigger3">
            <div class="form-group">
                
            <label for="inputEmailForm">Email адрес <span class="text-danger font-weight-bold">*</span></label>
            <input name="email" id="inputEmailForm" type="email" class="form-control" required readonly value="{{ $user->email }}">

            <div class="invalid-feedback">Введите правильный Email адрес</div>
          </div>
          <button class="btn btn-primary btn-prev-form">Назад</button>
          <button class="btn btn-primary btn-next-form">Вперёд</button>
        </div>
        <div id="test-form-4" role="tabpanel" class="bs-stepper-pane fade dstepper-none" aria-labelledby="stepperFormTrigger4">
          <div class="form-group">
            <label for="inputPasswordForm">Пароль <span class="text-danger font-weight-bold">*</span></label>
            <input name="password" id="inputPasswordForm" type="password" class="form-control" required="">
            <input name="role_id" type="hidden" value="1">
            <input name="google_id" type="hidden" value="{{ $user->id }}">
            <div class="invalid-feedback">Введите пароль</div>
          </div>
          <button class="btn btn-primary btn-prev-form">Назад</button>
          <button class="btn btn-primary btn-next-form">Вперёд</button>
        </div>
        <div id="test-form-5" role="tabpanel" class="bs-stepper-pane fade text-center dstepper-none" aria-labelledby="stepperFormTrigger5">
          {{-- <button class="btn btn-primary btn-prev-form">Назад</button> --}}
          <button type="submit" class="btn btn-primary mt-5 btn-create-account">Согласиться с политикой обработки персональных данных и создать аккаунт</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    var stepperForm = new Stepper(document.querySelector('#stepperForm'), {
        linear: true
    });

    $('.btn-next-form').on('click', function(e) {
        e.preventDefault(); // Предотвращаем стандартное поведение кнопки
        var currentStep = $('#stepperForm .bs-stepper-pane.active'); // Получаем текущий активный шаг

        // Проверяем поля на текущем шаге
        if (!validateStep(currentStep)) {
            return false; // Если поля не заполнены, останавливаем переход на следующий шаг
        }

        // Проверка возраста на первом шаге
        if (currentStep.attr('id') === 'test-form-1') {
            var inputBirthdate = $('#inputBirthdateForm').val();
            var birthdate = new Date(inputBirthdate);
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();

            if (age < 12) {
                $('#ageError').show();
                $('#inputBirthdateForm').addClass('is-invalid');
                return false; // Останавливаем переход на следующий шаг, если возраст меньше 12 лет
            } else {
                $('#ageError').hide();
                $('#inputBirthdateForm').removeClass('is-invalid');
            }
        }

        stepperForm.next(); // Переходим на следующий шаг, если все поля заполнены и возраст больше 12 лет
    });

    $('.btn-prev-form').on('click', function(e) {
        stepperForm.previous();
    });

    function validateStep(step) {
        var inputs = step.find('input[required]'); // Получаем все обязательные поля на текущем шаге
        var isValid = true;

        inputs.each(function() {
            if ($(this).val().trim() === '') {
                $(this).addClass('is-invalid'); // Помечаем пустые поля как недопустимые
                isValid = false;
            } else {
                $(this).removeClass('is-invalid'); // Удаляем пометку о недопустимости с заполненных полей
            }
        });

        return isValid; // Возвращаем результат проверки
    }

    $('.btn-create-account').on('click', function(e) {
        $('#stepperForm').submit();
    });
});
</script>

