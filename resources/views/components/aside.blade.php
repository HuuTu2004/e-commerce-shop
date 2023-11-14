<?php 
$menus = config('menu');
?>
<!-- Sidebar user panel -->
<div class="user-panel">
                    <div class="pull-left image">
                        <img src="assetadmin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{auth()->user()->name}}</p>
              
                        <a href="{{route('admin.logout')}}"><i class="fa fa-circle text-success"></i> Logout</a>
                    </div>
                </div>


                <ul class="sidebar-menu">
                    
                    @foreach($menus as $mn)

                    @if(!empty($mn['item']))
                    <li class="treeview">
                        <a href="#">
                            <i class="fa {{$mn['icon']}}"></i> <span>{{$mn['label']}}</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            @foreach($mn['item'] as $m)
                            <li><a href="{{route($m['name'])}}"><i class="fa {{$m['icon']}}"></i> {{$m['label']}}</a></li>
                            
                            @endforeach
                        </ul>
                    </li>
                    @else

                    <li class="treeview">
                        <a href="{{route($mn['name'])}}">
                            <i class="fa {{$mn['icon']}}"></i> <span>{{$mn['label']}}</span>
                        </a>
                    </li>
                    @endif

                    @endforeach
                    
                    
                </ul>