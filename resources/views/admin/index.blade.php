@extends('layouts.admin')

@section('content')


    <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Панель администратора</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Аднимистратор</li>
    </ol>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="content">




<style>:root {
   --basecolor: 180, 20%;
  --colortop: hsl(var(--basecolor), 40%);
  --colorleft: hsl(var(--basecolor), 35%);
  --colorright: hsl(var(--basecolor), 30%);

  --highlightcolor: hsl(350, 100%, 45%);
  --background: hsl(40, 30%, 81%);

  --color-floor-1: hsl(120, 50%, 50%); /* Зелёный */
  --color-floor-2: hsl(211, 100%, 39%);   /* Красный */
  --color-floor-3: hsl(180, 100%, 50%); /* Оранжевый */
  --color-floor-4: hsl(270, 70%, 50%); /* Фиолетовый */}

body {
  background: var(--background);
  color: var(--colortop);
}
.mapcard{
  text-align: center
}
.st0 {
  fill: var(--colortop);
}

.st1 {
  fill: var(--colorleft);
}

.st2 {
  fill: var(--colorright);
}

svg {
  width: 700px;
  margin: 0 auto;
  animation: fadeIn;
  animation-duration: 1s;
}

h1 {
  animation: fadeIn;
  animation-duration: 1s;
  margin: 10px;
}

.allshop {
  display: grid;
  width: 700px;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  column-gap: 10px;
  row-gap: 10px;
  margin: 0 auto;
  animation: fadeIn;
  animation-duration: 1s;
}

.allshop p {
  background-color: var(--colortop);
  padding: 3px;
  margin: 10px 0px;
  transition: background-color 0.2s ease-out;
  color: var(--background);
  font-size: 0.9em;
  font-weight: 700;
  border-radius: 2px;
}

svg polygon {
  transition: fill 0.2s ease-out;
}

@media only screen and (max-width: 786px) {
  .allshop {
    width: 100%;
    display: block;
  }

  svg {
    width: 100%;
  }
}
</style>








      
        <div class="row">
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
            <div class="inner">
            <h3>*ТУТ Что-то было*</h3>
            <p>Новые заказы</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Больше <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>


            <div class="col-lg-3 col-6">
            
              <div class="small-box bg-danger">
              <div class="inner">
              <h3>65</h3>
              <p>Unique Visitors</p>
              </div>
              <div class="icon">
               
                <ion-icon name="battery-charging"></ion-icon>

              </div>
              <a href="#" class="small-box-footer">Больше <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
            <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>Bounce Rate</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Больше <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
            <div class="inner">
            <h3>*Тут что-то было*</h3>
            <p>Новые пользователи</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Больше <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            
             
          </div>
        
        


          <div class="row">
            <div class="col-md-12">
            <div class="card">
            <div class="card-header">
            <h5 class="card-title">Месячная статистика</h5>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-wrench"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a href="#" class="dropdown-item">Action</a>
            <a href="#" class="dropdown-item">Another action</a>
            <a href="#" class="dropdown-item">Something else here</a>
            <a class="dropdown-divider"></a>
            <a href="#" class="dropdown-item">Separated link</a>
            </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
            </div>
            </div>

            <div class="card-body">
            <div class="row">
            <div class="col-md-8">
            <p class="text-center">
            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
            </p>
            <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

            <canvas id="salesChart" height="360" style="height: 180px; display: block; width: 696px;" width="1392" class="chartjs-render-monitor"></canvas>
            </div>

            </div>

            <div class="col-md-4">
            <p class="text-center">
            <strong>Goal Completion</strong>
            </p>
            <div class="progress-group">
            Заполненность номеров
            <span class="float-right"><b>160</b>/200</span>
            <div class="progress progress-sm">
            <div class="progress-bar bg-primary" style="width: 80%"></div>
            </div>
            </div>

            <div class="progress-group">
            Complete Purchase
            <span class="float-right"><b>310</b>/400</span>
            <div class="progress progress-sm">
            <div class="progress-bar bg-danger" style="width: 75%"></div>
            </div>
            </div>

            <div class="progress-group">
            <span class="progress-text">Visit Premium Page</span>
            <span class="float-right"><b>480</b>/800</span>
            <div class="progress progress-sm">
            <div class="progress-bar bg-success" style="width: 60%"></div>
            </div>
            </div>

            <div class="progress-group">
            Send Inquiries
            <span class="float-right"><b>250</b>/500</span>
            <div class="progress progress-sm">
            <div class="progress-bar bg-warning" style="width: 50%"></div>
            </div>
            </div>

            </div>

            </div>

            </div>

            <div class="card-footer">
            <div class="row">
            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
            <h5 class="description-header">$35,210.43</h5>
            <span class="description-text">TOTAL REVENUE</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
            <h5 class="description-header">$10,390.90</h5>
            <span class="description-text">TOTAL COST</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
            <h5 class="description-header">$24,813.53</h5>
            <span class="description-text">TOTAL PROFIT</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block">
            <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
            <h5 class="description-header">1200</h5>
            <span class="description-text">GOAL COMPLETIONS</span>
            </div>

            </div>
            </div>

            </div>

            </div>

            </div>

          </div>



      {{-- Карта --}}
    
      
        

    </div>

       
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
       





        <script>
     
// Система уведомлений
function fetchNotifications() {
    // $.ajax({
    //     url: '/admin/sale/notifications',
    //     method: 'GET',
    //     success: function(response) {
    //         var html = response.html;
    //         var hasNewNotifications = response.hasNewNotifications;

    //         // Проверяем, есть ли новые заказы
    //         if (hasNewNotifications && html.length > 0) {
    //             Swal.fire({
    //                 title: 'Новые заказы',
    //                 html: html,
    //                 showConfirmButton: false,
    //                 position: 'top-end',
    //                 toast: true,
    //                 background: "#454d55",
    //                 timer: 5000
    //             });
    //         }
    //     }
    // });
}

setInterval(function() {
    fetchNotifications();
}, 5000); // Запрашивать уведомления каждые 5 секунд

document.addEventListener("DOMContentLoaded", function() {
    fetchNotifications();
});





// Графики

  // Получаем элемент canvas, в котором будет отображаться график
  var ctx = document.getElementById('salesChart').getContext('2d');

  // // Генерируем случайные данные для графика (пример)
  var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
  var data = [];
  for (var i = 0; i < labels.length; i++) {
    data.push(Math.floor(Math.random() * 100) + 50); // Генерируем случайное число от 50 до 150
  }

  // Инициализируем график
  var salesChart = new Chart(ctx, {
    type: 'line', // Указываем тип графика
    data: {
      labels: labels, // Устанавливаем метки для оси X
      datasets: [{
        label: 'Sales', // Устанавливаем название датасета
        data: data, // Устанавливаем данные для графика
        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Устанавливаем цвет заливки области под графиком
        borderColor: 'rgba(255, 99, 132, 1)', // Устанавливаем цвет линии графика
        borderWidth: 1 // Устанавливаем ширину линии графика
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true // Устанавливаем начало оси Y в ноль
        }
      }
    }
  });





    </script>
@endsection