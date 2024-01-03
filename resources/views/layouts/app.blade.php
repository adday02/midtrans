<!doctype html>
<html lang="en">
    @include('layouts.head')
    <body data-sidebar="dark" data-layout-mode="light">

        <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('layouts.header')

            @include('layouts.aside')
          
           @include('layouts.main')
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        @include('layouts.script')

    </body>

</html>
