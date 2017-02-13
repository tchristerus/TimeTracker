
@section('css')
    <link rel="stylesheet" href="/css/font-awesome.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" type="text/css" href="/css/ripples.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Main custom CSS -->
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('scripts')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/js/ripples.min.js"></script>
    <script src="/js/material.min.js"></script>

    <!-- Initializing material design -->
    <script>
        $.material.init();

        // are you sure to remove project ... dialog
        $('#remove-project-dialog').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            $('#project-name').html('<strong>' + $(e.relatedTarget).data('title') + '</strong>');
            $(this).find('#btn_yes').attr('href',$(e.relatedTarget).data('href'));
        });
    </script>
@endsection

@section('scripts_custom_teams')
    <script>
        $('div[data-teamId]').click(function(){
            var element = $(this);
            $( "#member-results" ).html('<div class="text-center">LOADING...</div>');


            // Ressetting all icons
            $('div[data-teamId] div i').each(function(){
                $(this).html('people');
            })


            //loading icon while fetching data
            element.find('div i').html('swap_vert');

            $.post("/dashboard/team/members", {'id': $(this).attr('data-teamId'),'_token': '{{ csrf_token() }}'}, function( data ) {
                $( "#member-results" ).html( data );
                element.find('div i').html('arrow_forward')

                if(element.attr('data-owned') == "true") {
                    $('#btn-add-person').attr('data-teamId', element.attr('data-teamId'));
                    $('#btn-add-person').removeClass('hidden');
                }else{
                    if(!$('#btn-add-person').hasClass('hidden')){
                        $('#btn-add-person').addClass('hidden');
                    }
                }
            });
        });

        @if(!$errors->isEmpty())
            $('#create-team-dialog').modal('show');
        @endif

        // are you sure to remove project ... dialog
        $('#invite-user-dialog').on('show.bs.modal', function(e) {
            console.log($(e.relatedTarget).attr('data-teamId'));
            $(this).find('#teamIdValue').attr('value', $(e.relatedTarget).attr('data-teamId'));
        });
    </script>
@endsection

