@if(Session::has('flash_message'))

    <script type="text/javascript">

            swal({
                title: "{{ Session::get('flash_message') }}",
                text: "شكرا لك",
                timer: 2000,
                showConfirmButton: false
            });


    </script>
@endif