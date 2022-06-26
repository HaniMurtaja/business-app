<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    
    
    <div class="aside-logo1 flex-column-auto" id="kt_aside_logo" style="text-align:center !important;">
        <a href="{{url('/admin/home')}}">
            <center>
                <img src="{{$setting->logo}}" style="max-width:90px; text-align:center !important;" />
            </center>
        </a>
       
    </div>
  
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
             data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                 id="#kt_aside_menu" data-kt-menu="true">
                
                <div class="menu-item">
                    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/home*') ? 'active' : '' }}" href="{{ route('admin.admin.home') }}">
						<span class="menu-icon"> <i class="fas fa-home"></i> </span>
                        <span class="menu-title">{{__('cp.home')}}</span>
                    </a>
                </div>

                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                            <span class="menu-icon"> <i class="fas fa-user"></i> </span>
                            <span class="menu-title">{{ __('cp.users') }}</span>
                        </a>
                    </div>
                @endif

                
                
                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/companies*') ? 'active' : '' }}" href="{{ route('admin.companies.index') }}">
                            <span class="menu-icon"> <i class="fas fa-building"></i> </span>
                            <span class="menu-title">{{ __('cp.companies') }}</span>
                        </a>
                    </div>
                @endif


                @if(auth()->guard('admin')->user()->type == 'admin' || auth()->guard('admin')->user()->type == 'department_manager')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/employees*') ? 'active' : '' }}" href="{{ route('admin.employees.index') }}">
                            <span class="menu-icon"> <i class="fas fa-user"></i> </span>
                            <span class="menu-title">{{ __('cp.employees') }}</span>
                        </a>
                    </div>
                @endif



                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/orders*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                            <span class="menu-icon"> <i class="fab fa-first-order-alt"></i> </span>
                            <span class="menu-title">{{ __('cp.orders') }}</span>
                              @isset($orders_count)
                                @if($orders_count > 0)
                                    <span style="margin-top:0px;" class="badge badge-primary"> {{ @$orders_count }} </span>
                                @endif
                            @endisset
                        </a>
                    </div>
                    
                    
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/chat*') ? 'active' : '' }}" href="{{url(getLocal().'/admin/chat')}}">
                            <span class="menu-icon"> <i class="fas fa-sms"></i> </span>
                            <span class="menu-title">{{ __('cp.chat') }} </span>
                        </a>
                    </div>

                
                
                @if(auth()->guard('admin')->user()->type == 'department_manager')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/staff_chat*') ? 'active' : '' }}" href="{{url(getLocal().'/admin/staff_chat')}}">
                            <span class="menu-icon"> <i class="fas fa-sms"></i> </span>
                            <span class="menu-title">{{ __('cp.staff_chat') }} </span>
                        </a>
                    </div>
                @endif
                
                
                @if(auth()->guard('admin')->user()->type == 'department_employee')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/department_new_message*') ? 'active' : '' }}" href="{{url(getLocal().'/admin/department_new_message')}}">
                            <span class="menu-icon"> <i class="fas fa-sms"></i> </span>
                            <span class="menu-title">{{ __('cp.department_chat') }} </span>
                        </a>
                    </div>
                @endif
                
                


                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/contact-us*') ? 'active' : '' }}" href="{{ route('admin.contact.index') }}">
                                            <span class="menu-icon">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
													<path opacity="0.3"
                                                          d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z"
                                                          fill="black"></path>
													<rect x="6" y="12" width="7" height="2" rx="1" fill="black"></rect>
													<rect x="6" y="7" width="12" height="2" rx="1" fill="black"></rect>
												</svg>
                                                </span>
                                            </span>
                            <span class="menu-title">{{ __('cp.contact') }}</span>
                            @isset($contact)
                                @if($contact > 0)
                                    <span style="margin-top:0px;" class="badge badge-primary"> {{ @$contact }} </span>
                                @endif
                            @endisset
                        </a>
                    </div>
                @endif
                


                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/ads*') ? 'active' : '' }}" href="{{ route('admin.ads.index') }}">
                            <span class="menu-icon"> <i class="fas fa-image"></i> </span>
                            <span class="menu-title">{{ __('cp.ads') }}</span>
                        </a>
                    </div>
                @endif
                
                
                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                          <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"fill="black"/>
										<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"/>
									</svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ __('cp.categories') }}</span>
                        </a>
                    </div>
                @endif                
                

                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/services*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"fill="black"/>
										<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"/>
									</svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ __('cp.services') }}</span>
                        </a>
                    </div>
                @endif  
                
           
                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/packages*') ? 'active' : '' }}" href="{{ route('admin.packages.index') }}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"fill="black"/>
										<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"/>
									</svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ __('cp.packages') }}</span>
                        </a>
                    </div>
                @endif     
                
                
                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/packages_properties*') ? 'active' : '' }}" href="{{ route('admin.packages_properties.index') }}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"fill="black"/>
										<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"/>
									</svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ __('cp.packages_properties') }}</span>
                        </a>
                    </div>
                @endif     
           
                
                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/coupons*') ? 'active' : '' }}" href="{{ route('admin.coupons.index') }}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"fill="black"/>
										<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"/>
										<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"/>
									</svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ __('cp.coupons') }}</span>
                        </a>
                    </div>
                @endif  

             
                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/notifications*') ? 'active' : '' }}" href="{{ route('admin.notifications.index') }}">
                                            <span class="menu-icon">
                                                <span class="svg-icon svg-icon-2">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black"/>
                                                        <path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black"/>
                                                    </svg>
                                                </span>
                                            </span>
                            <span class="menu-title">{{ __('cp.notifications') }}</span>
                        </a>
                    </div>
                @endif

                
                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/payments_methods*') ? 'active' : '' }}" href="{{ route('admin.payments_methods.index') }}">
                                            <span class="menu-icon">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M6 22H4V3C4 2.4 4.4 2 5 2C5.6 2 6 2.4 6 3V22Z" fill="black"/>
                                                        <path d="M18 14H4V4H18C18.8 4 19.2 4.9 18.7 5.5L16 9L18.8 12.5C19.3 13.1 18.8 14 18 14Z" fill="black"/>
                                                    </svg>
                                                </span>
                                            </span>
                            <span class="menu-title">{{ __('cp.payments_methods') }}</span>
                        </a>
                    </div>
                @endif
                

                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/pages*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">
                            <span class="menu-icon">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
													<path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                                                          fill="black"></path>
													<path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                                                          fill="black"></path>
													<path opacity="0.3"
                                                          d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                                                          fill="black"></path>
												</svg>
                                                </span>
                            </span>
                            <span class="menu-title">{{ __('cp.pages') }}</span>
                        </a>
                    </div>
                @endif


                @if(auth()->guard('admin')->user()->type == 'admin')
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/settings*') ? 'active' : '' }}" href="{{ route('admin.settings.all') }}">
                                            <span class="menu-icon">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
													<path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                          fill="black"></path>
													<path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                          fill="black"></path>
													<path opacity="0.3"
                                                          d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                          fill="black"></path>
													<path opacity="0.3"
                                                          d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                          fill="black"></path>
												</svg>
                                                </span>
                                            </span>
                            <span class="menu-title">{{ __('cp.setting') }}</span>
                        </a>
                    </div>
                @endif


            </div>
        </div>
    </div>


</div>
