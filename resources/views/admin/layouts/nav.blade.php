
    <ul class="sidebar-menu">
        <li ><a href="{{ url('/adminbannel') }}"><i class="fa fa-home"></i><span>التحكم فى الرئيسية
                </span></a></li>
        <li ><a href="{{ url('/adminbannel/sitesettings') }}"><i class="fa fa-gears"></i> <span>إعدادات رئيسية</span></a></li>

        <li class="treeview">
          <a href="" >
            <i class="fa fa-users"></i> <span>التحكم فى الأعضاء</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/adminbannel/users/create') }}"><i class="fa fa-circle-o"></i>أضف عضو</a></li>
            <li><a href="{{ url('/adminbannel/users') }}"><i class="fa fa-circle-o"></i> كل الأعضاء</a></li>
          </ul>
        </li>


        {{-- Bu--}}
        <li class="treeview">
            <a href="" >
                <i class="fa fa-edit"></i> <span>التحكم فى العقارات</span>
                <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ url('/adminbannel/bu/create') }}"><i class="fa fa-circle-o"></i><span>
                         أضف عقار  </span>                     </a></li>
                </span><li><a href="{{ url('/adminbannel/bu') }}"><i class="fa fa-circle-o"></i><span>
                        كل العقارات
                    </span></a></li>
            </ul>
        </li>
         {{--messages--}}
        <li><a href="{{ url('/adminbannel/contact') }}"><i class="fa  fa-envelope-o"></i><span>
                الرسائل
                </span></a></li>

        <li ><a href="{{ url('/adminbannel/buyear/status') }}"><i class="fa fa-bar-chart"></i>
                <span>إحصائيات إضافة العقارات
                </span> </a></li>


  </ul>