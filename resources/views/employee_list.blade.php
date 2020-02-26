@extends('layouts.main')
@section('content')
    <style>
        .dd {
            width: 100% !important;
        }
    </style>
    <link href="{{ asset('js/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <section class="hbox stretch">
        <aside>
            <section class="vbox">
                <header class="header bg-white b-b clearfix">
                    <div class="row m-t-sm" style="font-size: 3em; text-align: center">

                        Employee List

                        <!--/form-group-->
                    </div>
                </header>
                <section class="scrollable wrapper w-f" style="padding-top:50px;">
                    <section class="panel panel-default">


                        <div class="table-responsive">
                            <table class="table table-striped m-b-none">
                                <thead>
                                <tr align="center">

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <form action="{{ url('transactions/registers/cash-receipt') }}" method="post"
                                      id="post-register">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <tbody id="entries">

                                    @foreach($employees as $employee)


                                        <tr data-value="{{$employee->client_id}}">
                                            <td>
                                                <?php if ($employee->personalInfo): ?>
                                                {{ $employee->personalInfo->last_name}}   {{ $employee->personalInfo->first_name}}
                                                <?php else: ?>
                                                {{ $employee->client->email}}
                                                <?php endif; ?>
                                            </td>
                                            <td>{{ $employee->client->email}}</td>

                                            <td>
                                                <a class="btn btn-default edit"
                                                   href="{{url("/")}}/access-control/assign/{{ $employee->client_id }}"><i
                                                            class="fa fa-edit"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </form>
                            </table>
                        </div>
                    </section>
                </section>
            </section>

        </aside>
    </section>


@stop









@section('scripts')
    <script src="{{ asset('js/scripts/acl.js') }}" type="text/javascript"></script>
    <!--  <script src="{{ asset('js/jquery-nestable/jquery.nestable.js') }}" type="text/javascript"></script>-->
    <script type="text/javascript">
        $(function () {
            var baseurl = $('#baseurl').val();


            $('#nested_accounts').nestable().nestable('collapseAll');
            ;
            $(".dd-nodrag").on("mousedown", function (event) { // mousedown prevent nestable click
                event.preventDefault();
                return false;
            });

        });
        $(document).on('change', '.user_id', function () {

        });
    </script>
@stop