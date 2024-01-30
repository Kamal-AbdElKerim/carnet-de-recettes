
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
@if ($errors->any())
    <script>
            

                window.onload = function() {
                notif({
                    msg: "Something Wrong",
		            type: "error",
                });
            }
    </script>
@endif

    @if (session()->has('register_success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Register Success",
		            type: "success",
                });
            }

        </script>
    @endif

    @if (session()->has('delete_post'))
        <script>
            window.onload = function() {
                notif({
                    msg: "delete Success",
		            type: "success",
                });
            }

        </script>
    @endif
    @if (session()->has('update_success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "update Success",
		            type: "success",
                });
            }

        </script>
    @endif

    @if (session()->has('logout_success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "logout success",
		            type: "success",
                });
            }

        </script>
    @endif
    @if (session()->has('login_success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Welcome  {{ Auth()->user()->name }}",
		            type: "success",
                });
            }

        </script>
    @endif
    @if (session()->has('post_success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "add",
		            type: "success",
                });
            }

        </script>
    @endif

    @if (session()->has('field'))
        <script>
            window.onload = function() {
                notif({
                    msg: "<b>Success:</b> Well done Details Submitted Successfully",
		            type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('add'))
        <script>
            window.onload = function() {
                notif({
                    msg: "<b>Success:</b> Well done Details Submitted Successfully",
		            type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ trans('Dashboard/messages.edit') }}",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ trans('Dashboard/messages.delete') }}",
                    type: "success"
                });
            }

        </script>
    @endif
