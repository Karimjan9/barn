<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ url('logo-icon.png') }}"  class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ config('app.name') }}</h4>
        </div>
        <div class="toggle-icon ms-auto">
            <i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @role('kadr')
                <li class="">
                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                        <div class="parent-icon">
                            <i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Foydalanuvchilar6</div>
                    </a>
                    <ul>
                        <li>
                            <a href="#" onclick="redrect('{{ route('kadr_role.actions.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Foydalanuvchilar</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="redrect('{{ route('kadr_role.department_update.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Bo'limlar</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="redrect('{{ route('kadr_role.career_update.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Lavozimlar  </div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                    </ul>
                </li>
               
                <li class="">
                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                        <div class="parent-icon">
                            <i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Cargo</div>
                    </a>
                    <ul>
                        <li>
                            <a href="#" onclick="redrect('{{ route('storekeeper_role.prixod.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Jo'natma</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="redrect('{{ route('storekeeper_role.cargo.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Cargo</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="redrect('{{ route('storekeeper_role.provider.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Jo'natuvchi</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                        <div class="parent-icon">
                            <i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Jihozlar</div>
                    </a>
                    <ul>
                        <li>
                            <a href="#" onclick="redrect('{{ route('storekeeper_role.items.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Jihoz modeli</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="redrect('{{ route('storekeeper_role.second_type_item.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Jihoz nomi </div> 
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="redrect('{{ route('storekeeper_role.type_item_take.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Jihoz turi </div> 
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                       
                        <li>
                            <a href="#" onclick="redrect('{{ route('storekeeper_role.item_unity.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Jihoz birligi </div> 
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="">
                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                        <div class="parent-icon">
                            <i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Buyruqlar</div>
                    </a>
                    <ul>
                        <li>
                            <a href="#" onclick="redrect('{{ route('kadr_role.command.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Lavozim buyruqlari</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="redrect('{{ route('kadr_role.command.index',['order_id'=>2]) }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Mansab buyrug'lari</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
        @endrole
        @role('storekeeper')
        {{-- <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Cargo</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('storekeeper_role.prixod.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Jo'natma</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('storekeeper_role.cargo.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Cargo</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('storekeeper_role.provider.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Jo'natuvchi</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
               
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Jihozlar</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('storekeeper_role.items.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Jihoz modeli</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
               
                <li>
                    <a href="#" onclick="redrect('{{ route('storekeeper_role.type_item_take.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Jihoz turi </div> 
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('storekeeper_role.second_type_item.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Jihoz nomi </div> 
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
              
            </ul>
        </li> --}}
        @endrole
        @role('user')
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Ariza berish</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('user_role.users_petitions.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Ariza qismi</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
              
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Jihozlarim</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('user_role.show.devices') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Qabul qilish</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('user_role.show.devices_users') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Mening jihozlarim</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                {{-- <li>
                    <a href="#" onclick="redrect('{{ route('kadr_role.command.index',['order_id'=>2]) }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Mansab buyrug'lari</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li> --}}
            </ul>
        </li>
  
        @endrole
        @role('rektor')
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='fadeIn animated bx bx-stats'></i>
                </div>
                <div class="menu-title">Statistika</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('rektor_role.show_all_statistic') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Statistika qismi</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
              
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class="fadeIn animated bx bx-send"></i>
                </div>
                <div class="menu-title">Arizalar ko'rish</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('rektor_role.rektor_actions.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Ariza qismi</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
              
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='fadeIn animated bx bx-devices'></i>
                </div>
                <div class="menu-title">Jihoz va qurilmalar</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('rektor_role.show_all_items') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Hamma jihozlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
             
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class="fadeIn animated bx bx-download"></i>
                </div>
                <div class="menu-title"> Cargo va Jo'natmalar </div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('rektor_role.prixod_show.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Jo'natmalar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
              
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class="fadeIn animated bx bx-dollar"></i>
                </div>
                <div class="menu-title"> Pul birligi va valyuta </div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('rektor_role.rektor_currency.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Valyuta</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
              
            </ul>
        </li>
    
        @endrole
       
        @role('bugalter')
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Tasdiqlangan arizalar</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('bugalter_role.accountant.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Arizalar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
              
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Jihoz va qurilmalar</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('bugalter_role.show_accountant') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Hamma jihozlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
             
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Berilgan buyruqlar</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('bugalter_role.show_orders') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Buyruqlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
             
            </ul>
        </li>
  
        @endrole
        @role('admin_barn')
                <li class="">
                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                        <div class="parent-icon">
                            <i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Tasdiqlangan arizalar</div>
                    </a>
                    <ul>
                        <li>
                            <a href="#" onclick="redrect('{{ route('admin_barn_role.admin_actions.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Buyrug'lar</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                        <div class="parent-icon">
                            <i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Berilgan jihozlar</div>
                    </a>
                    <ul>
                        <li>
                            <a href="#" onclick="redrect('{{ route('admin_barn_role.admin_accepts.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Jihozlarni ko'rish</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                        <div class="parent-icon">
                            <i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title"> Yetishmayotgan jihozlar </div>
                    </a>
                    <ul>
                        <li>
                            <a href="#" onclick="redrect('{{ route('admin_barn_role.missing_equipment.index') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Jihozlarni ko'rish</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                

              

        @endrole

        
        {{-- @role('super_admin')
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Xodimlar</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.employees.index') }}')"><i class="bx bx-right-arrow-alt"></i>Xodimlar bazasi</a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('departament.index') }}')"><i class="bx bx-right-arrow-alt"></i>Kafedra</a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('emloyees.index') }}')"><i class="bx bx-right-arrow-alt"></i>Foydalanuvchi</a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Ariza <span class="badge bg-warning text-dark" id="bid_count_active"></span> </div>
                </a>
                <ul>
                    <li> 
                        <a class="has-arrow" href="javascript:;">
                            <i class="bx bx-right-arrow-alt"></i>
                            E'lon
                            <span class="badge bg-warning text-dark" id="bid_1_count_active" style="margin-left: 5px;"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="#" onclick="redrect('{{ route('superadmin.announcement.index', ['status' => 0,'unfulfilled'=>0]) }}')">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <div style="margin-right: 5px;">E'lon berish</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="redrect('{{ route('superadmin.announcement.index', ['status' => 1,'unfulfilled'=>0]) }}')">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <div style="margin-right: 5px;">Qabul qilinganlar</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="redrect('{{ route('superadmin.announcement.index', ['status' => 2,'unfulfilled'=>0]) }}')">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <div style="margin-right: 5px;">Rad etilganlar</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="redrect('{{ route('superadmin.announcement.index', ['status' => 1,'unfulfilled'=>1]) }}')">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <div style="margin-right: 5px;">Bajarilmagan e'lonlar</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li> 
                        <a class="has-arrow" href="javascript:;">
                            <i class="bx bx-right-arrow-alt"></i>
                            Bildirgi 
                            <span class="badge bg-warning text-dark" id="bid_2_count_active" style="margin-left: 5px;"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="#" onclick="redrect('{{ route('superadmin.statement.index', ['status' => 0,'unfulfilled'=>0]) }}')">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <div style="margin-right: 5px;">Bildirgi berish</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="redrect('{{ route('superadmin.statement.index', ['status' => 1,'unfulfilled'=>0]) }}')">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <div style="margin-right: 5px;">Qabul qilinganlar</div>
                                    <span class="badge bg-warning text-dark"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="redrect('{{ route('superadmin.statement.index', ['status' => 2,'unfulfilled'=>0]) }}')">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <div style="margin-right: 5px;">Rad etilganlar</div>
                                    <span class="badge bg-warning text-dark"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="redrect('{{ route('superadmin.statement.index', ['status' => 1,'unfulfilled'=>1]) }}')">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <div style="margin-right: 5px;">Bajarilmagan bildirgilar</div>
                                    <span class="badge bg-warning text-dark"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li> 
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Maqola</div>
                    <span class="badge bg-warning text-dark" id="article_count_active" style="margin-left: 5px;"></span>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.article.index', ['status' => 0]) }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Maqola berish</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.article.index', ['status' => 1]) }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Qabul qilinganlar</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.article.index', ['status' => 2]) }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Rad etilganlar</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li> 
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Xabarnomalar</div>
                    <span class="badge bg-warning text-dark" id="article_count_active" style="margin-left: 5px;"></span>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.notification_user.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Xabarnomalar bazasi</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">SMS-Xabarnoma </div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.sms_message.index',['admin_id'=>Auth::user()->id]) }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">SMS-Xabar</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Hisobotlar</div>
                </a>
                <ul>
                    @foreach ($criterias as $criteria)
                        <li>
                            <a href="#" onclick="redrect('{{ route('report_archive_criteria', ['criteria_id' => $criteria->id]) }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">{{ $criteria->name }}</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <script>

                async function announcement_count() {

                    let count = 0;

                    return await $.ajax('/get_count_active_announcement_counts', {
                        type: 'GET',
                    }).then(async (data) => {
                        if (data.announcement_count > 0) {
                            $("#bid_1_count_active").html(data.announcement_count);
                        }
                        return data.announcement_count;
                    })
                    .catch(error => console.log('Error:', error));
                }

                async function statement_count() {

                    let count = 0;

                    return await $.ajax('/get_count_active_statement_counts', {
                        type: 'GET',
                    }).then(async (data) => {
                        if (data.statement_count > 0) {
                            $("#bid_2_count_active").html(data.statement_count);
                        }
                        return data.statement_count;
                    })
                    .catch(error => console.log('Error:', error));
                }

                async function article_count() {

                    let count = 0;

                    return await $.ajax('/superadmin/get_count_active_article_counts', {
                        type: 'GET',
                    }).then(async (data) => {
                        if (data.article_count > 0) {
                            $("#article_count_active").html(data.article_count);
                        }
                        return data.article_count;
                    })
                    .catch(error => console.log('Error:', error));
                }

                async function main() {

                    let i = 0;

                    i += await announcement_count();

                    i += await statement_count();

                    article_count();

                    if (i > 0) {
                        $("#bid_count_active").html(i);
                    }
                }

                main()

                setInterval(() => {
                    main();
                }, 100000);
            </script>
        @endrole --}}




    </ul>
    <!--end navigation-->
</div>

<script>

    function redrect(url) {
        window.location.href = url;
    }

</script>
