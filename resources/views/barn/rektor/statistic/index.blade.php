@extends('template_2')

@section('style')

    <style>
:root {
  --accent: #007ECC;
  --accent-2: #EC2F4B;
  --text: #003f66;
  --text-hover: var(--accent);
  --text-active: #FFFFFF;
  --border-width: 0.125em;
}

html, body {
  height: 100%;
}

* {
  box-sizing: border-box;
}

.swip {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  font-weight: 500;
  display: flex;
  justify-content: center;
  align-items: center;
}
.overflow-y-scroll{
  max-height: 200px;
}
.tableWrap {
  height: 500px;

  overflow: auto;
}
table {
  width: 100%;
  font-family: sans-serif;
}
table td {
  padding: 16px;
}
tbody tr {
  border-bottom: 2px solid #e8e8e8;
}
thead {
  font-weight: 500;
  color: rgba(0, 0, 0, 0.85);
}

.hidden-toggles {
	position: relative;
	border-radius: 999em;
	overflow: hidden;

	height: 2.75em;
	width: 40em;

	display: flex;
	flex-direction: row-reverse;

	> * {
		flex: 0 0 33.33%;
	}

	&:after {
		content: "";

		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;

		border: var(--border-width) solid var(--accent);
		border-radius: 999em;
		pointer-events: none;
	}
}

.hidden-toggles__input {
	display: none;

	&:checked + .hidden-toggles__label {
		background-color: var(--accent);
		color: var(--text-active);

		&:before {
			opacity: 1;
		}
		
		&:last-of-type {
			background: linear-gradient(90deg, var(--accent) 0%, var(--accent-2) 100%);
		}
	}
	&:nth-of-type(1) + label { order: 4 }
	&:nth-of-type(2) + label { order: 3 }
	&:nth-of-type(3) + label { order: 2 }
	&:nth-of-type(4) + label { order: 1 }
	/*&:nth-of-type(1) + label { order: 3 }
	&:nth-of-type(2) + label { order: 2 }
	&:nth-of-type(3) + label { order: 1 }
*/	
	&:nth-of-type(1):checked,
	&:nth-of-type(2):checked {
		~ label:last-of-type {
			margin-right: -33.33%;
		}
	}
}

.hidden-toggles__label {
	display: flex;
	align-items: center;
	justify-content: space-around;

	position: relative;
	cursor: pointer;
	transition: all 0.2s ease-out;
  color: var(--text);

	&:hover {
		color: var(--text-hover);
	}

	&:nth-of-type(2) {
		border-left: var(--border-width) solid var(--accent);
		border-right: var(--border-width) solid var(--accent);
	}
	
	&:last-of-type {
		border-left: var(--border-width) solid var(--accent);
	}

}

    </style>

@endsection
@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
           <div class="col">
             <div class="card radius-10 bg-gradient-cosmic">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Hamma buyrug'lar</p>
                            <h4 class="my-1 text-white">{{ $orders }}</h4>
                            <p class="mb-0 font-13 text-white"></p>
                        </div>
                        <div id="chart1"></div>
                    </div>
                </div>
             </div>
           </div>
          
          
           <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
               <div class="card-body">
                  
                   <div class="d-flex align-items-center">
                    
                       <div class="me-auto">
                           <p class="mb-0 text-white">Moddiy budjet</p>
                           <h4 class="my-1 text-white" id="summary">{{ $sum }} so'm</h4>
                           <p class="mb-0 font-13 text-white"></p>
                       </div>
                       <div id="chart2"></div>
                   </div>
                   
               </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div class="me-auto">
                           <p class="mb-0 text-white">Foydalanilayotgan buyumlar foizi </p>
                           <h4 class="my-1 text-white">{{ $protsent }}%</h4>
                           <p class="mb-0 font-13 text-white"></p>
                       </div>
                       <div id="chart3"></div>
                   </div>
               </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 bg-gradient-kyoto">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div class="me-auto">
                           <p class="mb-0 text-dark">Hamma xodimlar soni</p>
                           <h4 class="my-1 text-dark">{{ $worker }} ta</h4>
                           <p class="mb-0 font-13 text-dark"></p>
                       </div>
                       <div id="chart4"></div>
                   </div>
               </div>
            </div>
          </div> 
        </div>
         <div class="swip">
            <div class="hidden-toggles">
				
              <input name="coloration-level" type="radio" id="coloration-low" class="hidden-toggles__input" onclick="check_swip()" >
              <label for="coloration-low" class="hidden-toggles__label">Moddiy</label>
              
              <input name="coloration-level" type="radio" id="coloration-medium" class="hidden-toggles__input" onclick="check_swip()" checked>
              <label for="coloration-medium" class="hidden-toggles__label"> Hamma mablag'</label>	
              
              <input name="coloration-level" type="radio" id="coloration-high" class="hidden-toggles__input" onclick="check_swip()">
              <label for="coloration-high" class="hidden-toggles__label">Nomoddiy</label>

              <input name="coloration-level" type="radio" id="coloration-striking" class="hidden-toggles__input" onclick="check_swip()">
              <label for="coloration-striking" class="hidden-toggles__label">Xizmatlar qismi</label>
              
              
            </div>
          </div>

           <br>
        <!--end row-->

       
        <!--end row-->

       
        <div class="card radius-10" id="container">
          <div class="card-body">
             <div class="d-flex align-items-center">
                 <div>
                     <h6 class="mb-0">Bo'limlar va kafedralar</h6>
                 </div>
                 <div class="dropdown ms-auto">
                     <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="javascript:;">Action</a>
                         </li>
                         <li><a class="dropdown-item" href="javascript:;">Another action</a>
                         </li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                         </li>
                     </ul>
                 </div>
             </div>
          <div  class="tableWrap" >
            <table class="table align-middle mb-0">
             <thead class="table-light">
              <tr>
                <th>Bo'lim nomi</th>
            
                <th>Bino</th>
                <th>Jihoz soni</th>
                <th>Jihozlar</th>
               
              </tr>
              </thead>
              <tbody>
                 @foreach ($departaments as $departament)
                 <tr>
                  <td>
                    {{ $departament->name }}
                    </td>
           
            


                <td>{{ $departament->get_building->name??"Berilmagan"}}</td>
                <td>{{ $departament->get_give_item_count}}</td>
                    <td>
                      <a href="{{ route('rektor_role.rektor_actions.show',['rektor_action'=>$departament->id]) }}" type="button" class="btn btn-primary">Jihozlar</a>
                    </td>
                    </tr>
 
                 @endforeach
                 
             
              
             </tbody>
             
           </table>
           </div>
          </div>
     </div>
   
        <!--end row-->

         <div class="card radius-10">
                 <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Tovarlar kelish narxi</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                 <div class="tableWrap">
                   <table class="table align-middle mb-0">
                    <thead class="table-light">
                     <tr>
                       <th>Jihoz ismi</th>
                   
                       <th>Cargo ismi</th>
                       <th>Status</th>
                       <th>Mahsulot soni</th>
                       <th>Mahsulot narxi</th>
                       <th>Sanasi</th>
                       <th>Olingan</th>
                     </tr>
                     </thead>
                     <tbody>
                        @foreach ($table_prixods as $table)
                        <tr>
                            <td>{{ $table->get_item_name->name }}</td>
                            
                            <td>{{ $table->get_cargo_name->name }}</td>
                            <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
                            <td>{{ $table->count_of_item }} ta</td>
                            <td>{{ $table->cost_of_per }} so'm</td>
                            <td>{{ $table->get_cargo_name->come_date->format('d-m-Y') }}</td>
                            <td><div class="progress" style="height: 5px;">
                                  <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                                </div></td>
                           </tr>
        
                        @endforeach
                        
                    
                     
                    </tbody>
                  </table>
                  </div>
                 </div>
            </div>

            <div class="row row-cols-1 row-cols-lg-1">
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Jihozlar guruhlari</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    {{-- @dd($names_1) --}}
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li value="{{ $names_1 }}" id="names_1"><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="chart16"></canvas>
                              </div>
                        </div>
                        {{-- @dd($array) --}}
                        <ul class="list-group list-group-flush">
                            
                            <li value="{{ $array[0] }}" id="first_one" class="list-group-item d-flex bg-transparent justify-content-between align-items-center">{{ $names[0] }}
                                <span  class="badge bg-gradient-quepal rounded-pill">{{ $array[0] }}</span>
                            </li>
                            
                            <li value="{{ $array[1] }}" id="first_two" class="list-group-item d-flex bg-transparent justify-content-between align-items-center">{{ $names[1] }}
                                <span class="badge bg-gradient-ibiza rounded-pill">{{ $array[1] }}</span>
                            </li>
                            <li value="{{ $array[2] }}" id="first_three" class="list-group-item d-flex bg-transparent justify-content-between align-items-center">{{ $names[2] }} <span class="badge bg-gradient-deepblue rounded-pill">{{ $array[2] }}</span>
                            </li>
                        </ul>
                    </div>
                  </div>
                
                            
                  <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Jihozlar holati</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="chart18"></canvas>
                              </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- <li value="100" id="1" class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Jeans <span  class="badge bg-gradient-quepal rounded-pill">40</span>
                            </li> --}}
                            <li value="50"  id='give' class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Berilgan <span class="badge bg-gradient-ibiza rounded-pill">{{ $taked }}</span>
                            </li>
                            <li value="200" id="take" class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Bo'sh jihoz
                                <span class="badge bg-gradient-deepblue rounded-pill">{{ $dis_taked - $taked }}</span>
                            </li>
                        </ul>
                    </div>
                  </div>
             </div><!--end row-->


            
       
              
             </div><!--end row-->
    </div>
</div>



@endsection
@section('scripte_include_end_body')


<script>
 var ctx = document.getElementById("chart18").getContext('2d');
      var sd_1=document.getElementById('give').value;
      var sd_2=document.getElementById('take').value;
      var sd_1 = @json($taked);  
        var sd_2 = @json($dis_taked-$taked);
      console.log(sd_1);
    var gradientStroke11 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke11.addColorStop(0, '#ba8b02');
      gradientStroke11.addColorStop(1, '#181818');

      var gradientStroke12 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke12.addColorStop(0, '#2c3e50');
      gradientStroke12.addColorStop(1, '#fd746c');


      var gradientStroke13 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke13.addColorStop(0, '#ff0099');
      gradientStroke13.addColorStop(1, '#493240');

      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Berilgan',"Bo'sh jihozlar"],
          datasets: [{
            backgroundColor: [
              gradientStroke11,
              gradientStroke12,
              gradientStroke13
            ],
            hoverBackgroundColor: [
              gradientStroke11,
              gradientStroke12,
              gradientStroke13
            ],
            data: [sd_1,sd_2 ]
          }]
        },
        options: {
          maintainAspectRatio: false,
            legend: {
              display: false
            },
            tooltips: {
			  displayColors:false
            }
        }
      });
	  
</script>

<script>
    var ctx = document.getElementById("chart16").getContext('2d');
    var first_one=document.getElementById('first_one').value;
      var first_two=document.getElementById('first_two').value;
      var first_three=document.getElementById('first_three').value;
      var names=document.getElementById('names_1').value;
    //   var app = <?php echo json_encode($names); ?>;
    var app = @json($names);
  
   

    //   console.log(app);
     
var gradientStroke5 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke5.addColorStop(0, '#7f00ff');
  gradientStroke5.addColorStop(1, '#e100ff');

  var gradientStroke6 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke6.addColorStop(0, '#fc4a1a');
  gradientStroke6.addColorStop(1, '#f7b733');


  var gradientStroke7 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke7.addColorStop(0, '#283c86');
  gradientStroke7.addColorStop(1, '#45a247');

  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [app[0], app[1], app[2]],
      datasets: [{
        backgroundColor: [
          gradientStroke5,
          gradientStroke6,
          gradientStroke7
        ],

         hoverBackgroundColor: [
          gradientStroke5,
          gradientStroke6,
          gradientStroke7
        ],

        data: [first_one, first_two, first_three]
      }]
    },
    options: {
      maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          displayColors:false
        }
    }
  });
</script>
{{-- <script>
  (function() {
    // INITIALIZATION OF SWIPER
    // =======================================================
    var vertical = new Swiper('.js-swiper-vertical', {
      direction: 'vertical',
      pagination: {
        el: '.js-swiper-vertical-pagination',
        clickable: true,
      },
    });
  })()
</script> --}}
    
<script>
  // var check=getElementById('#coloration-low').prop('checked', true);
  function check_swip() {
 
    var status=0;
    if (document.getElementById("coloration-low").checked == true) {
      status=1;
    }
    if (document.getElementById("coloration-medium").checked == true) {
      status=2;
    }
    if (document.getElementById("coloration-high").checked == true) {
      status=3;
    }
    if (document.getElementById("coloration-striking").checked == true) {
      status=4;
    }

  
    return ajax(status)
  }

</script>
  
<script>
  function ajax(status) {
      // console.log(status);
      $.ajax('{{ route('rektor_role.ajax_rektor_statistic') }}', {
            type : "GET",
            data : {
                'status' : status,
              
            },
            success : function (data){
                // console.log(document.getElementById('summary').innerHTML);
                let soum = document.getElementById('summary').innerHTML = data.data+"  "+"so'm";
    
            
            }
        })
  }
</script>
@endsection




